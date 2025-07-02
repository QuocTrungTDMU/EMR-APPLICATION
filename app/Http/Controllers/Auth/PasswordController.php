<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class PasswordController extends Controller
{
    /**
     * Bước 1: Nhận mật khẩu mới, lưu vào session, chuyển sang view xác nhận.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'old_password' => ['required', 'string'],
                'password' => ['required', 'string', 'confirmed', 'min:8'],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors(),
                'message' => 'Dữ liệu không hợp lệ.'
            ], 422);
        }
        session([
            'old_password' => $request->old_password,
            'new_password' => $request->password
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Vui lòng xác nhận mật khẩu mới.',
            'redirect' => route('password.confirm-view')
        ]);
    }

    /**
     * Bước 2: Hiển thị view xác nhận mật khẩu.
     */
    public function showConfirmation(Request $request)
    {
        if (!session('new_password')) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Phiên làm việc đã hết hạn. Vui lòng thử lại.'
                ], 422);
            }
            return redirect()->route('profile.edit-password')
                ->with('error', 'Vui lòng nhập mật khẩu mới trước.');
        }
        return view('profile.confirm-password');
    }

    /**
     * Bước 3: Gọi API NKS để đổi mật khẩu thật sự khi xác nhận.
     */
    public function update(Request $request): JsonResponse
    {
        $user = Auth::user();
        $accessToken = $user->nks_access_token;
        $oldPassword = session('old_password');
        $newPassword = session('new_password');
        if (!$accessToken || !$oldPassword || !$newPassword) {
            return response()->json([
                'success' => false,
                'message' => 'Phiên làm việc đã hết hạn hoặc thiếu thông tin. Vui lòng thử lại.'
            ], 422);
        }
        try {
            $response = Http::asForm()->post('https://account.nks.vn/api/nks/user/updatePass', [
                'access_token' => $accessToken,
                'old_password' => $oldPassword,
                'password' => $newPassword,
            ]);
            $data = $response->json();
            if (isset($data['success']) && $data['success']) {
                session()->forget(['old_password', 'new_password']);
                return response()->json([
                    'success' => true,
                    'message' => 'Mật khẩu đã được cập nhật thành công!'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => $data['message'] ?? 'Có lỗi xảy ra khi cập nhật mật khẩu.'
                ], 400);
            }
        } catch (\Exception $e) {
            Log::error('Lỗi đổi mật khẩu NKS: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Không thể kết nối đến hệ thống NKS.'
            ], 500);
        }
    }
}
