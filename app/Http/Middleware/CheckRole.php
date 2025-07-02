<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$roles
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // ✅ Kiểm tra authentication từ session
        if (!$request->session()->get('is_authenticated', false)) {
            return $this->unauthorizedResponse($request, 'Vui lòng đăng nhập để tiếp tục');
        }

        // ✅ Lấy thông tin user từ session
        $nksUserData = $request->session()->get('nks_user_data', []);
        $userRole = $nksUserData['role']['name'] ?? 'user';

        // ✅ Kiểm tra nếu user có role trong danh sách được phép
        if ($this->hasAnyRole($userRole, $roles)) {
            return $next($request);
        }

        // ✅ User không có quyền truy cập
        return $this->forbiddenResponse($request, $userRole, $roles);
    }

    /**
     * ✅ Kiểm tra user có role nào đó trong danh sách
     */
    private function hasAnyRole(string $userRole, array $allowedRoles): bool
    {
        // Chuyển về lowercase để so sánh
        $userRole = strtolower($userRole);
        $allowedRoles = array_map('strtolower', $allowedRoles);

        // Admin có thể truy cập tất cả (nếu muốn)
        if ($userRole === 'admin') {
            return true;
        }

        // Kiểm tra role cụ thể
        return in_array($userRole, $allowedRoles);
    }

    /**
     * ✅ Response khi chưa đăng nhập
     */
    private function unauthorizedResponse(Request $request, string $message = 'Unauthorized'): Response
    {
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => $message,
                'error_code' => 'UNAUTHORIZED'
            ], 401);
        }

        return redirect()->route('login')
            ->with('error', $message);
    }

    /**
     * ✅ Response khi không có quyền
     */
    private function forbiddenResponse(Request $request, string $userRole, array $requiredRoles): Response
    {
        $message = "Quyền truy cập bị từ chối. Vai trò hiện tại: {$userRole}. Cần vai trò: " . implode(', ', $requiredRoles);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => $message,
                'error_code' => 'INSUFFICIENT_PERMISSIONS',
                'user_role' => $userRole,
                'required_roles' => $requiredRoles
            ], 403);
        }

        return redirect()->back()
            ->with('error', 'Bạn không có quyền truy cập trang này.');
    }
}
