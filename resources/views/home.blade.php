@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="container-fluid mb-5">
                <div class="text-center mt-5">
                    <h1>Immigration Manager</h1>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="Blad_Stu">
                            <a href="{{ route('student.create') }}">
                                <div class="box">
                                    <div class="our-services database">
                                        <div class="icon"> <img src="{{ asset('images/newstudent.png') }}"> </div>
                                        <h4>Add New Student</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
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
                                        <h4>Add Fee Details</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
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
                                        <h4>View Student Details</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur </p>
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
