<?php

namespace App\Http\Controllers;

use App\Mail\OTP;
use App\Models\OTP as ModelsOTP;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StudentDetailsOtpController extends Controller
{
    public function otp()
    {
        $students = Student::orderBy('name')->get();
        return view('manager.studentDetails.otp.otp', compact('students'));
    }

    public function otpPost(Request $request)
    {
        $student =  Student::where('username','=', $request->username)->first();
        $digits = 4;
        $random= rand(pow(10, $digits-1), pow(10, $digits)-1);

        Mail::to($student)->send(new OTP($random));

        $otps = ModelsOTP::where('email', '=', $student->email)->first();
        
        if($otps == null){
            $otp = new ModelsOTP();
            $otp->otp = $random;
            $otp->name = $student->name;
            $otp->username = $student->username;
            $otp->email = $student->email;
            $otp->save();
        }else{
            $otp123 = ModelsOTP::where('email', '=', $student->email)->first();
            $otp123->otp = $random;
            $otp123->name = $student->name;
            $otp123->username = $student->username;
            $otp123->email = $student->email;
            $otp123->save();
        }

        $student_id = $student->id;
        return redirect()->route('student.details.verify.email', $student_id)->with('message', 'OTP Sent Successfully, Please Verify Email');
    }

    public function verifyEmail($id)
    {
        $student = Student::where('id', '=', $id)->first();
        return view('manager.studentDetails.otp.verify', compact('student'));
    }

    public function verifyEmailPost(Request $request)
    {
        $student = Student::where('username', '=', $request->username)->first();
        $otps = ModelsOTP::where('username', '=', $student->username)->where('otp', '=', $request->otp)->first();
        
        if($otps == null){
            return redirect()->back()->with('error', 'Wrong OTP');
        }else{
            $otps->delete();
            $student_id = $student->id;
            
            $checksum = Str::random(100);

            $student->checksum2 = $checksum;
            $student->save();
            return redirect()->route('student.details.show',[$checksum , $student_id])->with('message', 'OTP Verification successful, View Student Details');
        }
    }
}
