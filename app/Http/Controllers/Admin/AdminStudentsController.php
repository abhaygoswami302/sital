<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest()->get();
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.students.create');
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
            return redirect()->route('admin_student.create')->with('error',  "User Already Exists");
        }elseif($studentemail){
            return redirect()->route('admin_student.create')->with('error',  "Email Already Exists");
        }
        else{

            $now = now();
            $student = Student::create(array_merge($request->all(), ['email_verified_at' => $now]));

            /*$fee = new Fee();
            $fee->name = $student->name;
            $fee->username = $student->username;
            $fee->email = $student->email;
            $fee->student_id = $student->id;
            $fee->funds = 'No';
            $fee->save();*/
            return redirect()->route('admin_student.create')->with('message', 'New Student Created Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
