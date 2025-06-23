namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FcmTokenController extends Controller
{
public function store(Request $request)
{
$request->validate([
'token' => 'required|string',
]);

$user = $request->user(); // Lấy user đang đăng nhập (middleware auth:api)
$user->fcm_token = $request->token;
$user->save();

return response()->json(['message' => 'FCM token saved successfully!']);
}
}