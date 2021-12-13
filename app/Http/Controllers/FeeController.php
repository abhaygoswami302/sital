<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FeeController extends Controller
{
    public function create($checksum,$id)
    {
        $student = Student::where('id', '=', $id)->first();
        if($checksum == $student->checksum){
            $student->checksum = null;
            $student->save();
            return view('manager.fee.create', compact('student'));
        }else{
            return redirect()->route('fee.otp');
        }

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

        return redirect()->route('fee.otp')->with('message', 'Added Fee Details');
    }
}
