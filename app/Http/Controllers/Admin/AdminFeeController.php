<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::orderBy('name')->get();
        return view('admin.fees.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'note' => 'required',
        ]);
    

        if($request->amount == '0'){
            return redirect()->back()->with('amountnull' , 'Amount Cannot Be 0');
        }
        if($request->email == 'Enter Email' || $request->total == 'Total' || $request->total == 'Enter Total'){
            return redirect()->back();
        }
        Fee::create($request->all());
        $fee = Fee::where('username', '=', $request->username)->first();
        $fee = $fee->username;
        return redirect()->back()->with(['feeadded' => 'Fee Added Successfully', 'fee'=> $fee]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fees = Fee::where('username', '=', $id)->orderBy('created_at', 'DESC')->get()->groupBy('fee_type');
        $student = Student::where('username', '=', $id)->first();
       $total = 0;
        foreach ($fees as $fee_type => $fee){
            foreach ($fee as $student123){
                $total = $total + $student123->total;
            }
        }


        return view('admin.fees.show', compact('fees', 'student', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fees = Fee::where('username', '=', $id)->orderBy('created_at', 'DESC')->get()->groupBy('fee_type');
        $student = Student::where('username', '=', $id)->first();
        return view('admin.fees.edit', compact('fees', 'student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
