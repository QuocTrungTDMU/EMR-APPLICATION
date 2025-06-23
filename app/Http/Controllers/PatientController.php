<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Dashboard cho bệnh nhân
     */
    public function dashboard()
    {
        return view('/');
    }

    /**
     * Lịch sử khám bệnh
     */
    public function medicalHistory()
    {
        return view('patient.medical-history');
    }

    /**
     * Đặt lịch khám
     */
    public function bookAppointment()
    {
        return view('patient.book-appointment');
    }
}
