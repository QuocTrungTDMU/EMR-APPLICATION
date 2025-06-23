<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Services\NksAttendanceService;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    protected $nksAttendanceService;

    public function __construct(NksAttendanceService $nksAttendanceService)
    {
        $this->nksAttendanceService = $nksAttendanceService;
    }

    /**
     * Hiển thị trang điểm danh
     */
    public function index()
    {
        $userData = $this->getUserData();
        $attendanceStatus = $this->getAttendanceStatus();
        $todayAttendances = $this->getTodayAttendances();

        return view('admin.attendance.index', compact(
            'userData',
            'attendanceStatus',
            'todayAttendances'
        ));
    }

    /**
     * Thực hiện check in
     */
    public function checkin(Request $request)
    {
        try {
            // Validate dữ liệu
            $request->validate([
                'checkin_img' => 'required|string', // Base64 image
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
            ]);

            $userData = $this->getUserData();
            $currentTime = Carbon::now('Asia/Ho_Chi_Minh');

            // Kiểm tra thời gian cho phép check in (8:30 - 9:00)
            if (!$this->canCheckin($currentTime)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Không trong thời gian cho phép check in (8:30 - 9:00)'
                ]);
            }

            // Kiểm tra đã check in hôm nay chưa
            if ($this->hasCheckedInToday($userData['nks_user_id'])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Bạn đã check in hôm nay rồi'
                ]);
            }

            // Chuẩn bị data cho API
            $checkinData = [
                'user_id' => $userData['nks_user_id'],
                'checkin_ip' => $request->ip(),
                'checkin_location' => $request->latitude . ',' . $request->longitude,
                'checkin_img' => $request->checkin_img,
                'late' => $currentTime->hour >= 9 ? 1 : 0, // Sau 9h là muộn
                'half' => $currentTime->hour >= 10 ? 1 : 0, // Sau 10h là nửa ngày
            ];

            // Gọi API NKS
            $response = $this->nksAttendanceService->checkin($checkinData);

            if ($response['success']) {
                Log::info('Checkin successful', [
                    'user_id' => $userData['nks_user_id'],
                    'time' => $currentTime->toDateTimeString()
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Check in thành công!',
                    'data' => $response['data']
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => $response['message'] ?? 'Lỗi khi check in'
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Checkin error', [
                'error' => $e->getMessage(),
                'user_id' => Auth::id()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi check in'
            ]);
        }
    }

    /**
     * Thực hiện check out
     */
    public function checkout(Request $request)
    {
        try {
            $request->validate([
                'checkout_img' => 'required|string',
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
            ]);

            $userData = $this->getUserData();
            $currentTime = Carbon::now('Asia/Ho_Chi_Minh');

            // Kiểm tra thời gian cho phép check out (16:00 - 16:30)
            if (!$this->canCheckout($currentTime)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Không trong thời gian cho phép check out (16:00 - 16:30)'
                ]);
            }

            // Kiểm tra đã check out hôm nay chưa
            if ($this->hasCheckedOutToday($userData['nks_user_id'])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Bạn đã check out hôm nay rồi'
                ]);
            }

            $checkoutData = [
                'user_id' => $userData['nks_user_id'],
                'checkout_ip' => $request->ip(),
                'checkout_location' => $request->latitude . ',' . $request->longitude,
                'checkout_img' => $request->checkout_img,
            ];

            $response = $this->nksAttendanceService->checkout($checkoutData);

            if ($response['success']) {
                Log::info('Checkout successful', [
                    'user_id' => $userData['nks_user_id'],
                    'time' => $currentTime->toDateTimeString()
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Check out thành công!',
                    'data' => $response['data']
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => $response['message'] ?? 'Lỗi khi check out'
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Checkout error', [
                'error' => $e->getMessage(),
                'user_id' => Auth::id()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi check out'
            ]);
        }
    }

    /**
     * Lấy lịch sử điểm danh
     */
    public function attendances()
    {
        $userData = $this->getUserData();

        $response = $this->nksAttendanceService->getAttendances([
            'user_id' => $userData['nks_user_id']
        ]);

        if ($response['success']) {
            return response()->json([
                'success' => true,
                'data' => $response['data']
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Không thể lấy lịch sử điểm danh'
        ]);
    }

    /**
     * Kiểm tra có thể check in không
     */
    private function canCheckin(Carbon $time): bool
    {
        $hour = $time->hour;
        $minute = $time->minute;

        // Cho phép check in từ 8:30 đến 9:00
        return ($hour == 8 && $minute >= 30) || ($hour == 9 && $minute == 0);
    }

    /**
     * Kiểm tra có thể check out không
     */
    private function canCheckout(Carbon $time): bool
    {
        $hour = $time->hour;
        $minute = $time->minute;

        // Cho phép check out từ 16:00 đến 16:30
        return ($hour == 16 && $minute <= 30);
    }

    /**
     * Lấy thông tin user
     */
    private function getUserData()
    {
        $localUser = Auth::user();
        $nksUser = session('nks_user', []);

        return [
            'id' => $localUser->id,
            'nks_user_id' => $nksUser['id'] ?? null,
            'name' => $nksUser['name'] ?? $localUser->name,
            'email' => $nksUser['email'] ?? $localUser->email,
        ];
    }

    /**
     * Lấy trạng thái điểm danh hôm nay
     */
    private function getAttendanceStatus()
    {
        $userData = $this->getUserData();
        $response = $this->nksAttendanceService->getAttendances([
            'user_id' => $userData['nks_user_id']
        ]);

        if ($response['success'] && !empty($response['data'])) {
            $today = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $todayAttendance = collect($response['data'])->firstWhere('date', $today);

            return [
                'has_checkin' => $todayAttendance ? !empty($todayAttendance['checkin_time']) : false,
                'has_checkout' => $todayAttendance ? !empty($todayAttendance['checkout_time']) : false,
                'checkin_time' => $todayAttendance ? $todayAttendance['checkin_time'] : null,
                'checkout_time' => $todayAttendance ? $todayAttendance['checkout_time'] : null,
            ];
        }

        return [
            'has_checkin' => false,
            'has_checkout' => false,
            'checkin_time' => null,
            'checkout_time' => null,
        ];
    }

    /**
     * Kiểm tra đã check in hôm nay chưa
     */
    private function hasCheckedInToday($userId): bool
    {
        $status = $this->getAttendanceStatus();
        return $status['has_checkin'];
    }

    /**
     * Kiểm tra đã check out hôm nay chưa
     */
    private function hasCheckedOutToday($userId): bool
    {
        $status = $this->getAttendanceStatus();
        return $status['has_checkout'];
    }

    /**
     * Lấy danh sách điểm danh hôm nay
     */
    private function getTodayAttendances()
    {
        $userData = $this->getUserData();
        $response = $this->nksAttendanceService->getAttendances([
            'user_id' => $userData['nks_user_id']
        ]);

        if ($response['success'] && !empty($response['data'])) {
            $today = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            return collect($response['data'])->where('date', $today)->first();
        }

        return null;
    }
}
