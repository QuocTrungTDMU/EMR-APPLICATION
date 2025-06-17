<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Hiển thị thông tin cá nhân (có thể lấy từ API nếu có token)
     */
    public function view(): View
    {
        $user = auth()->user();
        $rawJson = null;
        $accessToken = $user->nks_access_token ?? ''; // Lấy token từ user

        if ($accessToken) {
            try {
                $client = new Client();
                $response = $client->post('https://account.nks.vn/api/nks/user', [
                    'multipart' => [
                        ['name' => 'access_token', 'contents' => $accessToken],
                    ],
                    'timeout' => 10,
                ]);

                $body = $response->getBody()->getContents();
                $rawJson = $body;
                $data = json_decode($body, true);

                if (isset($data['data']['firstname']) && isset($data['data']['lastname'])) {
                    $data['data']['name'] = trim($data['data']['firstname'] . ' ' . $data['data']['lastname']);
                }

                if (isset($data['data']['name'])) {
                    $user = (object) $data['data'];
                }
            } catch (\Exception $e) {
                Log::error('Lỗi lấy dữ liệu từ API NKS: ' . $e->getMessage());
            }
        }

        return view('profile.index', compact('user', 'rawJson', 'accessToken')); // Truyền accessToken
    }
    /**
     * Hiển thị form chỉnh sửa thông tin cá nhân
     */
    public function edit(): View
    {
        $user = auth()->user();
        return view('profile.partials.edit-info.update-profile-information-form', compact('user'));
    }

    /**
     * Cập nhật thông tin cá nhân (ưu tiên qua NKS API nếu có token)
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $validated = $request->validated();

        if ($user->nks_access_token) {
            try {
                $nameParts = explode(' ', $validated['name'], 2);
                $firstname = $nameParts[0];
                $lastname = $nameParts[1] ?? '';

                $client = new Client();
                $response = $client->post('https://account.nks.vn/api/nks/user/updateInfo', [
                    'multipart' => [
                        ['name' => 'access_token', 'contents' => $user->nks_access_token],
                        ['name' => 'firstname', 'contents' => $firstname],
                        ['name' => 'lastname', 'contents' => $lastname],
                    ],
                    'timeout' => 10,
                ]);

                $body = $response->getBody()->getContents();
                $data = json_decode($body, true);

                if (!($data['success'] ?? false)) {
                    Log::error('NKS API lỗi khi cập nhật', ['response' => $body]);
                    return Redirect::route('profile.view')->with('error', 'Không thể cập nhật thông tin trên hệ thống NKS.');
                }
            } catch (\Exception $e) {
                Log::error('Lỗi gọi API NKS: ' . $e->getMessage());
                return Redirect::route('profile.view')->with('error', 'Lỗi khi cập nhật qua API NKS.');
            }
        }

        // Update local
        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.view')->with('status', 'Cập nhật thành công!');
    }

    /**
     * Hiển thị form chỉnh sửa mật khẩu
     */
    public function editPassword(): View
    {
        $user = auth()->user();
        return view('profile.partials.edit-info.update-password-form', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        // Validate dữ liệu
        $validated = $request->validate([
            'old_password' => ['required', 'current_password'],
            'new_password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = $request->user();
        $accessToken = $user->nks_access_token; // Giả định token được lưu trong cột nks_access_token

        if (!$accessToken) {
            Log::error('Không tìm thấy access_token cho người dùng: ' . $user->id);
            return response()->json(['errors' => ['general' => 'Không thể cập nhật mật khẩu. Vui lòng liên hệ hỗ trợ.']], 400);
        }

        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->post('https://account.nks.vn/api/nks/user/updatePass', [
                'multipart' => [
                    ['name' => 'access_token', 'contents' => $accessToken],
                    ['name' => 'old_password', 'contents' => $request->old_password],
                    ['name' => 'new_password', 'contents' => $request->new_password],
                ],
                'timeout' => 10,
            ]);

            $body = $response->getBody()->getContents();
            $data = json_decode($body, true);

            if (isset($data['success']) && $data['success']) {
                // Cập nhật mật khẩu cục bộ (tùy chọn)
                $user->update([
                    'password' => Hash::make($request->new_password),
                ]);

                // Nếu là yêu cầu AJAX, trả về JSON
                if ($request->ajax()) {
                    return response()->json(['status' => 'success', 'message' => 'Mật khẩu đã được cập nhật thành công!']);
                }

                return Redirect::route('profile.view')->with('status', 'Mật khẩu đã được cập nhật thành công!');
            } else {
                Log::error('API NKS cập nhật mật khẩu thất bại', ['response' => $body]);
                if ($request->ajax()) {
                    return response()->json(['errors' => ['general' => 'Cập nhật mật khẩu thất bại. Vui lòng kiểm tra mật khẩu cũ hoặc liên hệ hỗ trợ.']], 400);
                }
                return Redirect::route('profile.view')->with('error', 'Cập nhật mật khẩu thất bại. Vui lòng kiểm tra mật khẩu cũ hoặc liên hệ hỗ trợ.');
            }
        } catch (\Exception $e) {
            Log::error('Lỗi gọi API NKS để cập nhật mật khẩu: ' . $e->getMessage());
            if ($request->ajax()) {
                return response()->json(['errors' => ['general' => 'Có lỗi khi cập nhật mật khẩu. Vui lòng thử lại sau.']], 500);
            }
            return Redirect::route('profile.view')->with('error', 'Có lỗi khi cập nhật mật khẩu. Vui lòng thử lại sau.');
        }
    }


    /**
     * Xoá tài khoản người dùng
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    // public function updateAvatar(Request $request)
    // {
    //     if ($request->hasFile('avatar')) {
    //         $file = $request->file('avatar');
    //         $user = auth()->user();

    //         // Crop ảnh về kích thước 240x240 (tùy chỉnh theo cần thiết)
    //         $image = Image::make($file)->fit(240, 240);

    //         // Lưu ảnh vào storage (ví dụ: public/avatars)
    //         $path = 'avatars/' . time() . '_' . $user->id . '.jpg';
    //         Storage::disk('public')->put($path, (string) $image->encode('jpg'));

    //         // Cập nhật URL avatar trong database
    //         $user->avatar_url = Storage::url($path);
    //         $user->save();

    //         // Trả về URL ảnh để cập nhật giao diện (có thể dùng redirect hoặc JSON)
    //         return redirect()->back()->with('success', 'Avatar đã được cập nhật.');
    //     }

    //     return redirect()->back()->with('error', 'Vui lòng chọn một hình ảnh.');
    // }
}
