<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use GuzzleHttp\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form, ưu tiên dữ liệu từ NKS API.
     */
    public function edit(Request $request): View
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        if (!$user) {
            abort(401, 'Unauthorized: User not found');
        }

        $nksToken = $user->nks_access_token;
        $apiUser = null;
        $rawJson = null;

        if ($nksToken) {
            $client = new \GuzzleHttp\Client();
            try {
                $response = $client->post('https://account.nks.vn/api/nks/user', [
                    'multipart' => [
                        [
                            'name'     => 'access_token',
                            'contents' => $nksToken,
                        ]
                    ],
                    'timeout' => 10,
                ]);

                $body = $response->getBody()->getContents();
                $rawJson = $body;
                $data = json_decode($body, true);

                // Ưu tiên lấy họ tên từ API (ghép firstname và lastname nếu có)
                if (isset($data['data']['firstname']) && isset($data['data']['lastname'])) {
                    $data['data']['name'] = trim($data['data']['firstname'] . ' ' . $data['data']['lastname']);
                }

                if (isset($data['data']['name'])) {
                    $apiUser = $data['data'];
                }
            } catch (\Exception $e) {
                //Log::error('NKS API Exception: ' . $e->getMessage());
            }
        }

        // Ưu tiên dữ liệu từ API, fallback về local
        $displayUser = $apiUser ?: $user->makeHidden(['nks_access_token', 'password'])->toArray();

        return view('profile.edit', [
            'user' => $displayUser,
            'rawJson' => $rawJson,
            'from_api' => $apiUser ? true : false,
        ]);
    }



    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $validated = $request->validated(); // Dữ liệu đã validate (name, email)

        // Kiểm tra nếu người dùng có nks_access_token
        if ($user->nks_access_token) {
            $client = new Client();
            try {
                // Tách name thành firstname và lastname
                $nameParts = explode(' ', $validated['name'], 2);
                $firstname = $nameParts[0];
                $lastname = isset($nameParts[1]) ? $nameParts[1] : '';

                // Gửi yêu cầu cập nhật tới API NKS
                $response = $client->post('https://account.nks.vn/api/nks/user/updateInfo', [
                    'multipart' => [
                        [
                            'name'     => 'access_token',
                            'contents' => $user->nks_access_token,
                        ],
                        [
                            'name'     => 'firstname',
                            'contents' => $firstname,
                        ],
                        [
                            'name'     => 'lastname',
                            'contents' => $lastname,
                        ],
                    ],
                    'timeout' => 10,
                ]);

                $body = $response->getBody()->getContents();
                $data = json_decode($body, true);

                // Kiểm tra xem API có trả về thành công không
                // Điều chỉnh logic này nếu API có cấu trúc phản hồi khác
                if (isset($data['success']) && $data['success'] === true) {
                    Log::info('NKS API: Cập nhật thông tin người dùng thành công', ['user_id' => $user->id]);
                } else {
                    Log::error('NKS API: Lỗi khi cập nhật thông tin', ['response' => $body]);
                    return Redirect::route('profile.edit')->with('error', 'Không thể cập nhật thông tin trên NKS API. Vui lòng thử lại.');
                }
            } catch (\Exception $e) {
                Log::error('Lỗi gọi NKS API: ' . $e->getMessage());
                return Redirect::route('profile.edit')->with('error', 'Lỗi khi gọi API NKS: ' . $e->getMessage());
            }
        }

        // Cập nhật database local
        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'Cập nhật thông tin thành công!');
    }


    /**
     * Delete the user's account.
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
}
