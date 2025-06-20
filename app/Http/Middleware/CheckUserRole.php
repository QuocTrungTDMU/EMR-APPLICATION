class CheckUserRole
{
public function handle(Request $request, Closure $next, $requiredRoleId)
{
if (!Auth::check()) {
return redirect('/login');
}

$user = Auth::user();
$nksUser = session('nks_user');

if (!$nksUser || ($nksUser['role_id'] ?? null) != $requiredRoleId) {
abort(403, 'Không có quyền truy cập');
}

return $next($request);
}
}