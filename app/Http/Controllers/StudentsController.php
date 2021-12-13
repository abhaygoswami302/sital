<?php

namespace App\Http\Controllers;

use App\Mail\OTP;
use App\Models\OTP as ModelsOTP;
use App\Models\Student;
use App\Models\Temporary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use SebastianBergmann\Template\Template;

class StudentsController extends Controller
{
    public function create()
    {
        return view('manager.student.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required',
            'email' => 'required|email',
            'phone_no' => 'required|numeric|digits:10',
            'visa_category' => 'required',
        ]);

        $username = $request->username;
        $student = Student::where('username', '=', $username)->first();

        $email = $request->email;
        $studentemail = Student::where('email', '=', $email)->first();
   
        if($student){
            return redirect()->route('student.create')->with('error',  "User Already Exists");
        }elseif($studentemail){
            return redirect()->route('student.create')->with('error',  "Email Already Exists");
        }
        else{

            $student = Temporary::create($request->all());

            $digits = 4;
            $random= rand(pow(10, $digits-1), pow(10, $digits)-1);
    
            Mail::to($student)->send(new OTP($random));

            $otps = ModelsOTP::where('email', '=', $student->email)->first();
            
            if($otps == null){
                $otp = new ModelsOTP();
                $otp->otp = $random;
                $otp->name = $request->name;
                $otp->username = $request->username;
                $otp->email = $request->email;
                $otp->save();
            }else{
                $otp123 = ModelsOTP::where('email', '=', $student->email)->first();
                $otp123->otp = $random;
                $otp123->name = $request->name;
                $otp123->username = $request->username;
                $otp123->email = $request->email;
                $otp123->save();
            }


            return redirect()->route('verify.email')->with('student_created', 'New Student Created Successfully, Please Verify Email With OTP');
        }

    }
}
