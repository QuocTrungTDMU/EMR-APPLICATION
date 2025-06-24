<?php

namespace App\Http\Controllers;

use App\Exports\PatientArrayExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class PatientManagementController extends Controller
{
    public function index()
{
    $filteredPatients = [
        [
            'id' => 118,
            'name' => 'Nguyễn Văn A',
            'birth_year' => 1990,
            'gender' => 'Nam',
            'customer_group' => 'Khách vãng lai',
            'customer_name' => 'Nguyễn Thị B',
            'phone' => '0123456789',
            'email' => 'a.nguyen@example.com',
            'occupation' => 'Kỹ sư',
            'address' => '123 Đường ABC, Quận 1, TP.HCM',
            'medical_history' => 'Không có',
            'reason_for_visit' => 'Khám tổng quát',
            'notes' => 'Khách quen',
            'created_at' => '2025-06-19',
        ],
        [
            'id' => 119,
            'name' => 'Trần Thị C',
            'birth_year' => 1985,
            'gender' => 'Nữ',
            'customer_group' => 'Khách VIP',
            'customer_name' => 'Trần Văn D',
            'phone' => '0987654321',
            'email' => 'c.tran@example.com',
            'occupation' => 'Giáo viên',
            'address' => '456 Đường XYZ, Quận 3, TP.HCM',
            'medical_history' => 'Huyết áp cao',
            'reason_for_visit' => 'Tái khám',
            'notes' => 'Mang theo hồ sơ cũ',
            'created_at' => '2025-06-20',
        ],
        [
            'id' => 120,
            'name' => 'Lê Văn E',
            'birth_year' => 2000,
            'gender' => 'Nam',
            'customer_group' => 'Bảo hiểm',
            'customer_name' => 'Lê Thị F',
            'phone' => '0912345678',
            'email' => 'e.le@example.com',
            'occupation' => 'Sinh viên',
            'address' => '789 Đường DEF, Quận Bình Thạnh, TP.HCM',
            'medical_history' => 'Viêm mũi dị ứng',
            'reason_for_visit' => 'Khám tai mũi họng',
            'notes' => '',
            'created_at' => '2025-06-21',
        ],
    ];

    return view('admin.patient-management.index', compact('filteredPatients'));
}


    // public function index()
    // {

    //     // Gọi API để lấy danh sách người dùng (bệnh nhân)
    //     $response = Http::get('https://account.nks.vn/api/nks/users/login'); // Thay bằng endpoint đúng

    //     if ($response->successful()) {
    //         $patients = $response->json(); // Giả định API trả về mảng người dùng

    //         // Lọc các trường cần thiết dựa trên giao diện
    //         $filteredPatients = array_map(function ($patient) {
    //             return [
    //                 'id' => $patient['user']['id'] ?? $patient['id'], // Sử dụng 'id' từ 'user' nếu có
    //                 'name' => $patient['user']['name'] ?? $patient['name'],
    //                 'phone' => $patient['user']['phone'] ?? $patient['phone'],
    //                 'address' => $patient['user']['address'][0]['add_street'] ?? $patient['address'] ?? '',
    //                 'status' => '', // Có thể thêm logic từ API nếu có
    //                 'created_at' => $patient['user']['created_at'] ?? $patient['created_at'],
    //             ];
    //         }, $patients);

    //         return view('admin.patient-management.index', compact('filteredPatients'));
    //     } else {
    //         return redirect()->back()->with('error', 'Không thể tải dữ liệu từ API.');
    //     }
    // }

    public function exportExcel()
{
    $patients = [
        [
            'id' => 118,
            'name' => 'Nguyễn Văn A',
            'birth_year' => 1990,
            'gender' => 'Nam',
            'customer_group' => 'Khách vãng lai',
            'customer_name' => 'Nguyễn Thị B',
            'phone' => '0123456789',
            'email' => 'a.nguyen@example.com',
            'occupation' => 'Kỹ sư',
            'address' => '123 Đường ABC, Quận 1, TP.HCM',
            'medical_history' => 'Không có',
            'reason_for_visit' => 'Khám tổng quát',
            'notes' => 'Khách quen',
            'created_at' => '2025-06-19',
        ],
        
    ];

    return Excel::download(new PatientArrayExport($patients), 'benh_nhan.xlsx');
}

    public function edit($id)
    {
        $response = Http::get("https://account.nks.vn/api/nks/users/{$id}"); // Giả định endpoint chi tiết

        if ($response->successful()) {
            $patient = $response->json();
            $patientData = [
                'id' => $patient['user']['id'] ?? $patient['id'],
                'name' => $patient['user']['name'] ?? $patient['name'],
                'phone' => $patient['user']['phone'] ?? $patient['phone'],
                'address' => $patient['user']['address'][0]['add_street'] ?? $patient['address'] ?? '',
                'status' => '',
                'created_at' => $patient['user']['created_at'] ?? $patient['created_at'],
            ];
            return view('patient-management.patient-edit', compact('patientData'));
        } else {
            return redirect()->back()->with('error', 'Không thể tải thông tin bệnh nhân.');
        }
    }

    public function update(Request $request, $id)
    {
        // Gửi yêu cầu PUT/PATCH đến API để cập nhật (chưa có endpoint, cần xác nhận)
        $response = Http::put("https://account.nks.vn/api/nks/users/{$id}", $request->all());

        if ($response->successful()) {
            return redirect()->route('admin.patients.index')->with('success', 'Cập nhật thành công!');
        } else {
            return redirect()->back()->with('error', 'Cập nhật thất bại.');
        }
    }

    public function destroy($id)
    {
        // Gửi yêu cầu DELETE đến API (chưa có endpoint, cần xác nhận)
        $response = Http::delete("https://account.nks.vn/api/nks/users/{$id}");

        if ($response->successful()) {
            return redirect()->route('admin.patients.index')->with('success', 'Xóa thành công!');
        } else {
            return redirect()->back()->with('error', 'Xóa thất bại.');
        }
    }
}
