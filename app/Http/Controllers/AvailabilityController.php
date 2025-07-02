<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    public function index()
    {
        $daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $timetable = [
            '9 AM - 3 PM' => [
                'Sunday' => ['name' => '', 'specialty' => ''],
                'Monday' => ['name' => 'Dr. Crystal', 'specialty' => 'Endocrinologist'],
                'Tuesday' => ['name' => 'Dr. Helen', 'specialty' => 'Oncologist'],
                'Wednesday' => ['name' => 'Dr. Donald', 'specialty' => 'General Surgeon'],
                'Thursday' => ['name' => '', 'specialty' => ''],
                'Friday' => ['name' => '', 'specialty' => ''],
                'Saturday' => ['name' => 'Dr. Charles', 'specialty' => 'Neuro Surgeon'],
            ],
            '2 PM - 6 PM' => [
                'Sunday' => ['name' => 'Dr. Verma', 'specialty' => 'Cosmetic Surgery'],
                'Monday' => ['name' => 'Dr. Gail', 'specialty' => 'Neurologist'],
                'Tuesday' => ['name' => 'Dr. Markus', 'specialty' => 'Pediatrics'],
                'Wednesday' => ['name' => 'Dr. Russell', 'specialty' => 'Immunologist'],
                'Thursday' => ['name' => 'Dr. Brianna', 'specialty' => 'Psychiatrist'],
                'Friday' => ['name' => 'Dr. Hildreth', 'specialty' => 'Nephrologist'],
                'Saturday' => ['name' => '', 'specialty' => ''],
            ],
        ];
        // Đảm bảo đủ 7 ngày cho mỗi ca
        foreach ($timetable as $time => $days) {
            foreach ($daysOfWeek as $day) {
                if (!isset($timetable[$time][$day])) {
                    $timetable[$time][$day] = ['name' => '', 'specialty' => ''];
                }
            }
            // Sắp xếp lại thứ tự các ngày
            $timetable[$time] = collect($timetable[$time])->only($daysOfWeek)->toArray();
        }
        $departments = ['All Department', 'Cardiologist', 'Neurologist', 'Endocrinologist', 'Oncologist', 'General Surgeon', 'Neuro Surgeon', 'Cosmetic Surgery', 'Pediatrics', 'Immunologist', 'Psychiatrist', 'Nephrologist'];
        return view('partials.Page+.availability-checker', compact('timetable', 'departments'));
    }

    public function book($doctorId)
    {
        return view('partials.Page+.doctor-detail', ['doctorId' => $doctorId]);
    }
}
