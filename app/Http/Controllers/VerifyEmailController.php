<?php

namespace App\Http\Controllers;

use App\Mail\OTP as MailOTP;
use App\Models\OTP;
use App\Models\Student;
use App\Models\Temporary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VerifyEmailController extends Controller
{
    public function index()
    {
        $temporaries = Temporary::latest()->get();
        return view('manager.email.verify', compact('temporaries'));
    }

    public function otp($id)
    {
        $student = Temporary::where('id', '=', $id)->first();
        return view('manager.email.otp', compact('student'));
    }

    public function otpPost(Request $request)
    {
        $otp = OTP::where('email', '=', $request->email)->where('otp', '=', $request->otp)->first();
        
        if($otp == null){
            return redirect()->back()->with('error', 'Wrong OTP');
        }elseif($otp->otp == $request->otp){
            $otp->delete();
            $temporary = Temporary::where('email', '=', $request->email)->first();
            $student = new Student();
            $student->name = $temporary->name;
            $student->username = $temporary->username;
            $student->email = $temporary->email;
            $student->phone_no = $temporary->phone_no;
            $student->visa_category = $temporary->visa_category;
            $student->status = 'Processing';
            $student->email_verified_at = now();
           
            $student->save();
            $temporary->delete();

            return redirect()->route('verify.email')->with('message', 'Congratulations!!! , Email Verified Successfully');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

  /*  public function sendOTP($id)
    {
       $student = Temporary::where('id', '=', $id)->first();
        $digits = 4;
        $random= rand(pow(10, $digits-1), pow(10, $digits)-1);

        Mail::to($student)->send(new MailOTP($random));

        $otps = OTP::where('email', '=', $student->email)->first();
        
        if($otps == null){
            $otp = new OTP();
            $otp->otp = $random;
            $otp->name = $student->name;
            $otp->username = $student->username;
            $otp->email = $student->email;
            $otp->save();
        }else{
            $otp123 = OTP::where('email', '=', $student->email)->first();
            $otp123->otp = $random;
            $otp123->name = $student->name;
            $otp123->username = $student->username;
            $otp123->email = $student->email;
            $otp123->save();
        }

        return redirect()->back();
    }*/
}
