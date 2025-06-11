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
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        if (!$user) {
            \Log::warning('User not authenticated');
            abort(401, 'Unauthorized: User not found');
        }

        $nksToken = $user->nks_access_token;

        if (!$nksToken) {
            \Log::warning('NKS token not found for user ID: ' . $user->id);
            abort(401, 'Unauthorized: NKS token not found. Please login again.');
        }

        $client = new Client();

        try {
            $response = $client->request('POST', 'https://account.nks.vn/api/nks/user ', [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $nksToken,
                ],
                'json' => ['access_token' => $nksToken],
                'timeout' => 10,
            ]);

            $body = $response->getBody()->getContents();
           // \Log::info('API Response: ' . $body); // Log toàn bộ phản hồi

            $data = json_decode($body, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                \Log::error('JSON decode error: ' . json_last_error_msg() . ' - Raw body: ' . $body);
                $apiUser = null;
            } elseif (isset($data['data']['user'])) {
                $apiUser = $data['data']['user'];
                \Log::info('API user data: ' . json_encode($apiUser));
            } else {
                \Log::warning('Unexpected API response structure: ' . $body);
                $apiUser = null;
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $errorBody = $response ? $response->getBody()->getContents() : $e->getMessage();
            \Log::error('API ClientException: ' . $e->getMessage() . ' - Status: ' . ($response ? $response->getStatusCode() : 'N/A') . ' - Response: ' . $errorBody);
            if ($e->getCode() == 401) {
                $user->update(['nks_access_token' => null]); // Xóa token hết hạn
                abort(401, 'Unauthorized: NKS token expired - ' . $errorBody);
            }
            $apiUser = null;
        } catch (\Exception $e) {
            \Log::error('API General Exception: ' . $e->getMessage() . ' - Trace: ' . $e->getTraceAsString());
            $apiUser = null;
        }

        // Sử dụng dữ liệu từ API nếu có, nếu không dùng dữ liệu local
        $displayUser = $apiUser ?: $user->makeHidden(['nks_access_token', 'password'])->toArray();

        return view('profile.edit', ['user' => $displayUser]);
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
