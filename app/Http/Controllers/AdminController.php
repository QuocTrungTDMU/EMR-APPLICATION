<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    /**
     * Dashboard cho bác sĩ
     */
    public function index(Request $request)
    {
        $user = $request->attributes->get('nks_user');
        $userData = $this->getUserData($user);
        \Log::info('Admin dashboard accessed', [
            'user_id' => $userData['id'],
            'role_id' => $userData['role_id'],
            'email' => $userData['email']
        ]);
        return view('admin.dashboard', compact('userData'));
    }

    /**
     * Hiển thị danh sách bệnh nhân
     */
    public function patients()
    {
        $userData = $this->getUserData();

        return view('admin.patients', compact('userData'));
    }

    /**
     * Quản lý lịch khám
     */
    public function appointments()
    {
        $userData = $this->getUserData();

        return view('admin.appointments', compact('userData'));
    }

    /**
     * Lấy thông tin user kết hợp từ Auth và NKS API
     */
    private function getUserData($user = null)
    {
        // Lấy user từ middleware nếu chưa truyền vào
        if (!$user) {
            $user = request()->attributes->get('nks_user');
        }
        $nksUser = session('nks_user', []);
        // Kiểm tra quyền truy cập admin (role_id = 6)
        if (($nksUser['role_id'] ?? null) !== 6) {
            abort(403, 'Không có quyền truy cập admin');
        }
        // Kết hợp dữ liệu
        $userData = [
            'id' => $user['id'] ?? null,
            'nks_user_id' => $nksUser['id'] ?? null,
            'name' => $nksUser['name'] ?? $user['name'] ?? '',
            'email' => $nksUser['email'] ?? $user['email'] ?? '',
            'avatar' => $nksUser['avatar'] ?? null,
            'role_id' => $nksUser['role_id'] ?? null,
            'role_name' => $this->getRoleName($nksUser['role_id'] ?? null),
            'phone' => $nksUser['phone'] ?? null,
            'department' => $nksUser['department'] ?? null,
            'specialization' => $nksUser['specialization'] ?? null,
        ];
        return $userData;
    }

    /**
     * Lấy tên role dựa trên role_id
     */
    private function getRoleName($roleId)
    {
        $roleNames = [
            5 => 'Bệnh nhân',
            6 => 'Bác sĩ',
            7 => 'Y tá',
            8 => 'Lễ tân',
            9 => 'Quản trị viên',
            10 => 'Dược sĩ'
        ];

        return $roleNames[$roleId] ?? 'Người dùng';
    }

    /**
     * Cập nhật thông tin profile
     */
    public function updateProfile(Request $request)
    {
        $userData = $this->getUserData();

        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Xử lý cập nhật profile
        // (Code xử lý upload avatar và cập nhật thông tin)

        return redirect()->back()->with('success', 'Cập nhật thông tin thành công');
    }

    /**
     * Hiển thị thống kê dashboard
     */
    public function getDashboardStats()
    {
        $userData = $this->getUserData();

        // Lấy thống kê từ API hoặc database
        $stats = [
            'total_patients' => 0,
            'today_appointments' => 0,
            'pending_appointments' => 0,
            'completed_appointments' => 0,
        ];

        return response()->json([
            'success' => true,
            'data' => $stats,
            'user' => $userData
        ]);
    }
}
