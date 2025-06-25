<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PatientAccountController extends Controller
{
    public function index()
    {
        return view('partials.Page+.patient-account');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone_number' => 'required|string|max:20',
            'date_of_birth' => 'required|date',
            'address' => 'required|string|max:255',
            'marital_status' => 'required|in:Married,Unmarried',
            'health_care_number' => 'required|string|max:50',
            'sex' => 'required|in:Male,Female',
            'registration_date' => 'required|date',
            'under_18' => 'required|in:Yes,No',
            'emergency_first_name' => 'required|string|max:255',
            'emergency_last_name' => 'required|string|max:255',
            'emergency_relationship' => 'required|in:Parent,Brother,Sister,Uncle',
            'emergency_contact_number' => 'required|string|max:20',
            'reason_for_registration' => 'required|string',
            'additional_notes' => 'nullable|string',
            'taking_medications' => 'required|in:Yes,No',
            'insurance_company' => 'required|string|max:255',
            'insurance_id' => 'required|string|max:50',
            'policy_holder_name' => 'required|string|max:255',
            'policy_holder_dob' => 'required|date',
            'agree' => 'required',
        ]);

        
        Mail::raw("Đăng ký tài khoản bệnh nhân mới: {$request->first_name} {$request->last_name}", function ($message) use ($request) {
            $message->to('support@hinton.com')
                ->subject('Đăng ký Tài khoản Bệnh nhân Mới')
                ->from($request->email, "{$request->first_name} {$request->last_name}");
        });

        
        return redirect()->route('patient-account')->with('success', 'Đăng ký tài khoản bệnh nhân thành công!');
    }
}
