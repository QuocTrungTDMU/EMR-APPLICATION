<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use GuzzleHttp\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

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
                \Log::error('NKS API Exception: ' . $e->getMessage());
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
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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
