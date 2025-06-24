<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PatientArrayExport implements FromArray, WithHeadings
{
    protected $patients;

    public function __construct(array $patients)
    {
        $this->patients = $patients;
    }

    public function array(): array
    {
        return array_map(function ($p) {
            return [
                $p['id'],
                $p['name'],
                $p['birth_year'],
                $p['gender'],
                $p['customer_group'],
                $p['customer_name'],
                $p['phone'],
                $p['email'],
                $p['occupation'],
                $p['address'],
                $p['medical_history'],
                $p['reason_for_visit'],
                $p['notes'],
                $p['created_at'],
            ];
        }, $this->patients);
    }

    public function headings(): array
    {
        return [
            'Mã hồ sơ', 'Họ tên', 'Năm sinh', 'Giới tính', 'Nhóm KH',
            'Nguồn KH', 'SĐT', 'Email', 'Nghề nghiệp', 'Địa chỉ',
            'Tiền sử bệnh', 'Lý do khám', 'Ghi chú', 'Ngày tạo'
        ];
    }
}
