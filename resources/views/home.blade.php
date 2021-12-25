@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="container-fluid mb-5">
                <div class=" mt-5">
                    <h1  style="font-family:Playfair Display;font-weight:600" >
                        <div class="row">
                            <div class="col-sm-6 ">
                                <b style="float: right;color: #b79359">Immigration</b>
                            </div>
                            <div class="col-sm-6 text-right">
                                <b style="color: black">Manager</b>
                            </div>
                        </div>
                    </h1>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="Blad_Stu">
                            <a href="{{ route('student.create') }}">
                                <div class="box">
                                    <div class="our-services database">
                                        <div class="icon"> <img src="{{ asset('images/newstudent.png') }}"> </div>
                                        <h4  style="font-family:Playfair Display;font-weight:600" >Add New Student</h4>
                                        <p>add new student then verify their email to add their fee details and view their status</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="Blad_Stu">
                            <a href="{{ route('fee.otp') }}">
                                <div class="box">
                                    <div class="our-services settings">
                                        <div class="icon"> <img src="{{ asset('images/feedetail.png') }}"> </div>
                                        <h4  style="font-family:Playfair Display;font-weight:600" >Add Fee Details</h4>
                                        <p>add processing , application , school , university, college, embassy fee for the student</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="Blad_Stu">
                            <a href="{{ route('student.details.otp') }}">
                                <div class="box">
                                    <div class="our-services backups">
                                        <div class="icon"> <img src="{{ asset('images/oldstudent.png') }}"> </div>
                                        <h4 style="font-family:Playfair Display;font-weight:600" >View Student Details</h4>
                                        <p>view student visa status to see if its approved,  in process or rejected.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
