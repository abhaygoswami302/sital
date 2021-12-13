<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentDetailsController extends Controller
{
    public function show($checksum, $id)
    {
        $student = Student::where('id', '=', $id)->first();

        if($checksum == $student->checksum2){
            $student->checksum2 = null;
            $student->save();
            return view('manager.studentDetails.show', compact('student'));
        }else{
            return redirect()->route('student.details.otp');
        }
    }

}
