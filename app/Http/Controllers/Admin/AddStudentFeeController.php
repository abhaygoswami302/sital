<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddStudentFeeController extends Controller
{
    public function show($username)
    {
        $student = Student::where('username', '=', $username)->first();
        $mystudent = Fee::where('username', '=', $username)->latest()->get();

        $fees = Fee::where('username', '=', $username)->orderBy('created_at', 'DESC')->get()->groupBy('fee_type');
        $total = 0;
        foreach ($fees as $fee_type => $fee){
            foreach ($fee as $student123){
                $total = $total + $student123->total;
            }
        }

        return view('admin.fees.student.fee', compact('student', 'mystudent', 'fees', 'total'));
    }

    public function store(Request $request)
    {
        $student = Student::where('username', '=', $request->username)->first();
        $fee = Fee::where('username', '=', $request->username)
                    ->where('fee_type', '=', $request->fee_type)
                    ->orderBy('updated_at','DESC')->first();
        if($fee == null){
            $fee123 = new Fee();
            $fee123->username = $student->username;
            $fee123->email = $student->email;
            $fee123->fee_type = $request->fee_type;
            $fee123->amount = $request->amount;
            $fee123->total = $request->amount;
            $fee123->note = $request->note;
            $fee123->counsellor = Auth::user()->name;
            $fee123->save();
        }else{
            $fee2 = new Fee();
            $fee2->username = $student->username;
            $fee2->email = $student->email;
            $fee2->fee_type = $request->fee_type;
            $fee2->amount = $request->amount;
            $total = $fee->total;
            $fee2->total = $request->amount + $total;
            $fee2->note = $request->note;
            $fee2->counsellor = Auth::user()->name;
            $fee2->save();
        }    

        return redirect()->route('admin_fee.show', $student->username)->with('message', 'Fees Added Successfully');
    }
}
