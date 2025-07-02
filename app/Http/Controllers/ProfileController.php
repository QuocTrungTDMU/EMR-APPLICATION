<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Hiển thị thông tin cá nhân (có thể lấy từ API nếu có token)
     */
    public function view(Request $request): View
    {
        $user = $request->attributes->get('nks_user');
        $rawJson = null;
        $accessToken = $user['access_token'] ?? '';

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
                if (isset($data['data'])) {
                    $userData = $data['data'];
                    $userData['first_name'] = $userData['firstname'] ?? '';
                    $userData['last_name'] = $userData['lastname'] ?? '';
                    $user = (object) $userData;
                }
            } catch (\Exception $e) {
                Log::error('Lỗi lấy dữ liệu từ API NKS: ' . $e->getMessage());
            }
        }
        return view('profile.index', compact('user', 'rawJson', 'accessToken'));
    }
    /**
     * Hiển thị form chỉnh sửa thông tin cá nhân
     */
    public function edit(Request $request): View
    {
        $user = $request->attributes->get('nks_user');
        $accessToken = $user['access_token'] ?? '';

        if ($accessToken) {
            try {
                $client = new \GuzzleHttp\Client();
                $response = $client->post('https://account.nks.vn/api/nks/user', [
                    'multipart' => [
                        ['name' => 'access_token', 'contents' => $accessToken],
                    ],
                    'timeout' => 10,
                ]);
                $body = $response->getBody()->getContents();
                $data = json_decode($body, true);
                if (isset($data['data'])) {
                    $userData = $data['data'];
                    $userData['first_name'] = $userData['firstname'] ?? '';
                    $userData['last_name'] = $userData['lastname'] ?? '';
                    $user = (object) $userData;
                }
            } catch (\Exception $e) {
                \Log::error('Lỗi lấy dữ liệu từ API NKS: ' . $e->getMessage());
            }
        }
        return view('profile.partials.edit-info.update-profile-information-form', compact('user', 'accessToken'));
    }


    public function uploadCccd(Request $request)
    {
        try {
            // Validate file upload
            $validator = Validator::make($request->all(), [
                'cccd_image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $validator->errors()->first(),
                ], 422);
            }

            $user = $request->attributes->get('nks_user');
            $imagePath = $request->file('cccd_image')->store('cccd', 'public');
            $fullImagePath = storage_path('app/public/' . $imagePath);

            if (!file_exists($fullImagePath)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Không thể lưu file hình ảnh.',
                ], 500);
            }

            // Xử lý ảnh
            try {
                $image = Image::make($fullImagePath)
                    ->greyscale()
                    ->contrast(20)
                    ->brightness(10)
                    ->sharpen(15)
                    ->resize(1200, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->save($fullImagePath);
            } catch (\Exception $e) {
                Log::error('Lỗi xử lý hình ảnh: ' . $e->getMessage());
                return response()->json([
                    'status' => 'error',
                    'message' => 'Không thể xử lý hình ảnh: ' . $e->getMessage(),
                ], 500);
            }

            // OCR với Tesseract
            try {
                $ocr = new TesseractOCR($fullImagePath);
                $ocr->executable('C:\Program Files\Tesseract-OCR\tesseract.exe');
                $ocr->lang('vie');
                $ocr->tessdataDir('C:\Program Files\Tesseract-OCR\tessdata');
                $text = $ocr->run();

                // Vệ sinh chuỗi
                if (!mb_check_encoding($text, 'UTF-8')) {
                    $text = mb_convert_encoding($text, 'UTF-8', 'Windows-1258');
                }
                if (!mb_check_encoding($text, 'UTF-8')) {
                    $text = mb_convert_encoding($text, 'UTF-8', 'auto');
                }
                $text = preg_replace('/[\x00-\x1F\x7F-\xFF]/u', '', $text);
                $text = preg_replace('/[^\p{L}\p{N}\s\/:]/u', '', $text);

                if (!mb_check_encoding($text, 'UTF-8')) {
                    Log::error('Chuỗi OCR không hợp lệ UTF-8', ['raw_text' => bin2hex($text)]);
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Dữ liệu từ hình ảnh không hợp lệ định dạng UTF-8.',
                    ], 500);
                }
            } catch (\Exception $e) {
                Log::error('Lỗi OCR: ' . $e->getMessage());
                return response()->json([
                    'status' => 'error',
                    'message' => 'Không thể trích xuất dữ liệu từ hình ảnh: ' . $e->getMessage(),
                ], 500);
            }

            // Trích xuất dữ liệu
            $data = $this->parseCccdData($text);

            // Chuẩn hóa dữ liệu
            $data = array_map(function ($val) {
                return is_string($val) ? mb_convert_encoding(trim($val), 'UTF-8', 'UTF-8') : $val;
            }, $data);

            // Lưu thông tin
            try {
                $user->update([
                    'name' => $data['name'] ?: ($user->name ?? ''),
                    'cccd_number' => $data['cccd_number'] ?: ($user->cccd_number ?? ''),
                    'cccd_issue_date' => $data['cccd_issue_date'] ?: ($user->cccd_issue_date ?? ''),
                    'cccd_issue_place' => $data['cccd_issue_place'] ?: ($user->cccd_issue_place ?? ''),
                    'cccd_image' => $imagePath,
                ]);
            } catch (\Exception $e) {
                Log::error('Lỗi lưu database: ' . $e->getMessage(), ['data' => $data]);
                return response()->json([
                    'status' => 'error',
                    'message' => 'Lỗi lưu thông tin: ' . $e->getMessage(),
                ], 500);
            }

            // Chuẩn hóa đầu ra
            $cleanData = array_map(function ($val) {
                return is_string($val) ? mb_convert_encoding($val, 'UTF-8', 'UTF-8') : $val;
            }, [
                'name' => $data['name'] ?: ($user->name ?? ''),
                'cccd_number' => $data['cccd_number'] ?: ($user->cccd_number ?? ''),
                'cccd_issue_date' => $data['cccd_issue_date'] ?: ($user->cccd_issue_date ?? ''),
                'cccd_issue_place' => $data['cccd_issue_place'] ?: ($user->cccd_issue_place ?? ''),
            ]);

            return response()->json([
                'status' => 'success',
                'data' => $cleanData,
                'cccd_image' => Storage::url($imagePath),
            ], 200, [], JSON_UNESCAPED_UNICODE);
        } catch (\Exception $e) {
            Log::error('Lỗi xử lý CCCD: ' . $e->getMessage(), ['stack' => $e->getTraceAsString()]);
            return response()->json([
                'status' => 'error',
                'message' => 'Lỗi xử lý CCCD: ' . $e->getMessage(),
            ], 500);
        }
    }

    private function parseCccdData($text)
    {
        $data = [
            'name' => '',
            'cccd_number' => '',
            'cccd_issue_date' => '',
            'cccd_issue_place' => '',
        ];

        try {
            // Số CCCD
            if (preg_match('/\d{12}/', $text, $matches)) {
                $data['cccd_number'] = $matches[0];
            }

            // Họ tên
            if (preg_match('/Họ và tên\s*:\s*(.+)/iu', $text, $matches)) {
                $data['name'] = trim($matches[1]);
            } elseif (preg_match('/[A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ\s]+/iu', $text, $matches)) {
                $data['name'] = trim($matches[0]);
            }

            // Ngày cấp
            if (preg_match('/\d{2}\/\d{2}\/\d{4}/', $text, $matches)) {
                $data['cccd_issue_date'] = $matches[0];
            }

            // Nơi cấp
            if (preg_match('/Nơi cấp\s*:\s*(.+)/iu', $text, $matches)) {
                $data['cccd_issue_place'] = trim($matches[1]);
            } elseif (preg_match('/Cục Cảnh sát.*|Công an.*/iu', $text, $matches)) {
                $data['cccd_issue_place'] = trim($matches[0]);
            }
        } catch (\Exception $e) {
            Log::error('Lỗi parseCccdData: ' . $e->getMessage(), ['text' => bin2hex($text)]);
        }

        return $data;
    }
    /**
     * Cập nhật thông tin cá nhân (ưu tiên qua NKS API nếu có token)
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->attributes->get('nks_user');
        $validated = $request->validated();

        // Log request data
        Log::info('Request data từ form:', [
            'all_data' => $request->all(),
            'validated_data' => $validated
        ]);

        // Ghép họ và tên để gửi qua API và đồng bộ vào DB
        $validated['name'] = trim(($validated['first_name'] ?? '') . ' ' . ($validated['last_name'] ?? ''));

        // Cập nhật DB local
        $user->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        // Kiểm tra nks_access_token
        if (!isset($user['access_token']) || !$user['access_token']) {
            Log::warning('Không có nks_access_token cho user', ['user_id' => $user['id'] ?? null]);
            return Redirect::route('profile.view')->with('error', 'Không thể cập nhật vì thiếu thông tin xác thực.');
        }

        try {
            $client = new Client();

            // Chỉ lấy các trường API NKS yêu cầu (bỏ các trường căn cước công dân)
            $apiFields = [
                'firstname', 'lastname', 'intro', 'phone', 'gender', 'website', 'dob', 'pob',
                // 'id_number', 'id_date', 'id_place',
                'province'
            ];
            $apiData = [
                'access_token' => $user['access_token'],
                'firstname' => $validated['first_name'] ?? '',
                'lastname' => $validated['last_name'] ?? '',
            ];
            foreach ($apiFields as $field) {
                if (isset($validated[$field])) {
                    $value = $validated[$field];
                    // Xử lý gender về 0|1
                    if ($field === 'gender') {
                        if ($value === 'male') $value = 0;
                        elseif ($value === 'female') $value = 1;
                        else $value = '';
                    }
                    // Đảm bảo ngày đúng định dạng yyyy-mm-dd
                    if (in_array($field, ['dob']) && $value) {
                        $value = date('Y-m-d', strtotime($value));
                    }
                    $apiData[$field] = $value;
                }
            }

            Log::info('Dữ liệu gửi lên API NKS:', $apiData);

            // Gửi 1 lần duy nhất toàn bộ dữ liệu hợp lệ lên API NKS
            $response = $client->post('https://account.nks.vn/api/nks/user/updateInfo', [
                'form_params' => $apiData,
                'timeout' => 10,
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ]
            ]);

            $body = $response->getBody()->getContents();
            $data = json_decode($body, true);

            Log::info('NKS API updateInfo response', ['status_code' => $response->getStatusCode(), 'response' => $data]);

            if (!($data['success'] ?? false)) {
                return Redirect::route('profile.view')->with('error', $data['message'] ?? 'Không thể cập nhật thông tin trên NKS.');
            }

        } catch (\Exception $e) {
            Log::error('Exception khi gọi API NKS:', [
                'message' => $e->getMessage(),
                'class' => get_class($e),
                'trace' => $e->getTraceAsString()
            ]);
            
            return Redirect::route('profile.view')
                ->with('error', 'Lỗi khi cập nhật qua API NKS: ' . $e->getMessage());
        }

        // Luôn redirect về trang profile sau khi cập nhật thành công
        return Redirect::route('profile.view')->with('status', 'Cập nhật thành công!');
    }
    /**
     * Hiển thị form chỉnh sửa mật khẩu
     */
    public function editPassword(Request $request): View
    {
        $user = $request->attributes->get('nks_user');
        return view('profile.partials.edit-info.update-password-form', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        Log::info('Request data', [
            'all' => $request->all(),
            'input' => $request->input(),
            'post' => $request->post(),
            'user' => $request->attributes->get('nks_user')['id'] ?? 'Guest',
            'is_ajax' => $request->ajax()
        ]);

        $user = $request->attributes->get('nks_user');
        if (!$user) {
            Log::warning('Yêu cầu không được xác thực');
            return response()->json(['success' => false, 'errors' => ['general' => 'Vui lòng đăng nhập để tiếp tục.']], 401);
        }

        // Validate dữ liệu
        try {
            $validated = $request->validate([
                'old_password' => ['required', 'string'],
                'password' => ['required', 'string', 'confirmed', 'min:8'],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed', ['errors' => $e->errors()]);
            return response()->json(['success' => false, 'errors' => $e->errors()], 422);
        }

        $accessToken = $user['access_token'] ?? null;
        if (!$accessToken) {
            Log::error('Không tìm thấy access_token cho người dùng', ['user_id' => $user['id'] ?? null]);
            return response()->json(['success' => false, 'errors' => ['general' => 'Không thể cập nhật mật khẩu. Vui lòng liên hệ hỗ trợ.']]
            , 400, [], JSON_UNESCAPED_UNICODE);
        }

        try {
            $client = new Client();
            $response = $client->post('https://account.nks.vn/api/nks/user/updatePass', [
                'multipart' => [
                    ['name' => 'access_token', 'contents' => $accessToken],
                    ['name' => 'old_password', 'contents' => $validated['old_password']],
                    ['name' => 'password', 'contents' => $validated['password']],
                ],
                'timeout' => 10,
            ]);

            $body = $response->getBody()->getContents();
            $data = json_decode($body, true);

            Log::info('NKS API response for password update', ['response' => $body]);

            if (isset($data['success']) && $data['success']) {
                return response()->json(['success' => true, 'message' => 'Mật khẩu đã được cập nhật thành công!']);
            } else {
                Log::error('API NKS cập nhật mật khẩu thất bại', ['response' => $body]);
                return response()->json(['success' => false, 'errors' => ['old_password' => $data['message'] ?? 'Mật khẩu hiện tại không đúng hoặc lỗi API.']], 400);
            }
        } catch (\Exception $e) {
            Log::error('Lỗi gọi API NKS để cập nhật mật khẩu: ');
            return response()->json([
                 ['Mật khẩu hiện tại không đúng']
            ], 500, [], JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * Xoá tài khoản người dùng
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = $request->attributes->get('nks_user');
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user->delete();

        return Redirect::to('/');
    }


  
}
