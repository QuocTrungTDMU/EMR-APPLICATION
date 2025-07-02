<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $locations = [
            [
                'name' => 'Bệnh viện Chợ Rẫy',
                'address' => '201B Nguyễn Chí Thanh, Quận 5, TP.HCM',
                'lat' => 10.754666,
                'lng' => 106.662954,
                'type' => 'hospital',
            ],
            [
                'name' => 'Nhà thuốc Long Châu',
                'address' => '45 Lê Văn Việt, Quận 9, TP.HCM',
                'lat' => 10.852024,
                'lng' => 106.784729,
                'type' => 'pharmacy',
            ],
            [
                'name' => 'Bệnh viện Từ Dũ',
                'address' => '284 Cống Quỳnh, Quận 1, TP.HCM',
                'lat' => 10.767282,
                'lng' => 106.688095,
                'type' => 'hospital',
            ],
            [
                'name' => 'Nhà thuốc Pharmacity',
                'address' => '123 Nguyễn Thị Minh Khai, Quận 1, TP.HCM',
                'lat' => 10.770348,
                'lng' => 106.693024,
                'type' => 'pharmacy',
            ],
        ];
        return view('map.index', compact('locations'));
    }
} 