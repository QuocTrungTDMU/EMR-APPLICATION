<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AccountActivationController extends Controller
{
    /**
     * Kích hoạt tài khoản user với activation token
     */
    public function activate(Request $request, $token)
    {
        try {
            // Tìm user với activation_code tương ứng
            $user = User::where('activation_code', $token)
                ->where('status', 'pending')
                ->first();

            if (!$user) {
                return view('auth.activation-result', [
                    'success' => false,
                    'title' => 'Kích hoạt thất bại',
                    'message' => 'Mã kích hoạt không hợp lệ hoặc đã được sử dụng.',
                    'user' => null,
                    'show_login_button' => false
                ]);
            }

            // Gọi API NKS để kích hoạt tài khoản
            $response = Http::timeout(30)
                ->get("https://account.nks.vn/api/nks/user/activation/{$token}");

            Log::info('Account Activation API Response', [
                'token' => $token,
                'user_id' => $user->id,
                'status' => $response->status(),
                'body' => $response->body()
            ]);

            if ($response->successful()) {
                $apiData = $response->json();

                if (isset($apiData['success']) && $apiData['success'] === true) {
                    // Cập nhật trạng thái user local
                    $user->update([
                        'status' => 'active',
                        'email_verified_at' => now(),
                        'activation_code' => null, // Xóa activation code đã sử dụng
                    ]);

                    // Log successful activation
                    Log::info('User activated successfully', [
                        'user_id' => $user->id,
                        'email' => $user->email
                    ]);

                    // Tự động đăng nhập user sau khi kích hoạt
                    Auth::login($user);

                    // Clear session data từ registration nếu có
                    session()->forget([
                        'pending_verification_user_id',
                        'pending_verification_email',
                        'pending_verification_name',
                        'activation_token_sent',
                        'registration_completed'
                    ]);

                    return view('auth.activation-result', [
                        'success' => true,
                        'title' => 'Kích hoạt thành công!',
                        'message' => 'Tài khoản của bạn đã được kích hoạt thành công và bạn đã được đăng nhập vào hệ thống.',
                        'user' => $user,
                        'show_login_button' => false // Đã auto login rồi nên không cần button
                    ]);
                } else {
                    return view('auth.activation-result', [
                        'success' => false,
                        'title' => 'Kích hoạt thất bại',
                        'message' => $apiData['message'] ?? 'Không thể kích hoạt tài khoản từ server.',
                        'user' => $user,
                        'show_login_button' => true
                    ]);
                }
            } else {
                // Log API error
                Log::warning('API activation failed', [
                    'token' => $token,
                    'user_id' => $user->id,
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);

                return view('auth.activation-result', [
                    'success' => false,
                    'title' => 'Lỗi kết nối',
                    'message' => 'Lỗi kết nối đến server kích hoạt. Vui lòng thử lại sau.',
                    'user' => $user,
                    'show_login_button' => true
                ]);
            }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            // Network connection error
            Log::error('Network error during activation', [
                'token' => $token,
                'error' => $e->getMessage()
            ]);

            return view('auth.activation-result', [
                'success' => false,
                'title' => 'Lỗi kết nối mạng',
                'message' => 'Không thể kết nối đến server. Vui lòng kiểm tra kết nối internet và thử lại.',
                'user' => $user ?? null,
                'show_login_button' => true
            ]);
        } catch (\Exception $e) {
            // General error
            Log::error('Account Activation Error', [
                'token' => $token,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return view('auth.activation-result', [
                'success' => false,
                'title' => 'Có lỗi xảy ra',
                'message' => 'Có lỗi trong quá trình kích hoạt tài khoản. Vui lòng thử lại sau hoặc liên hệ hỗ trợ.',
                'user' => $user ?? null,
                'show_login_button' => true
            ]);
        }
    }
}
