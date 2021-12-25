@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
           <div class="col-sm-8 offset-2">
            <div class="card">
                <div class="card-header">Add Fee Details</div>
                <div class="card-body">
                     @include('manager.partials.alert')
                     @if (Session::get('student_created'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-success">
                                    {{ Session::get('student_created') }} <a href="{{ route('verify.email') }}">Verify Email</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    <form action="{{ route('fee.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 p-1">
                                <input type="hidden" value="{{ $student->username }}" required name="username">
                                <select name="fee_type" id="fee_type" class="form-control" required>
                                    <option value="" selected>Select Fee Type</option>
                                    <option value="Procesing Fees">Procesing Fees</option>
                                    <option value="Application Fees">Application Fees</option>
                                    <option value="College Fees">College Fees</option>
                                    <option value="University Fees">University Fees</option>
                                    <option value="School Fees">School Fees</option>
                                    <option value="Embassy Fees">Embassy Fees</option>
                                </select>
                            </div>
                            <div class="col-sm-6 p-1">
                                <input type="text" name="amount" id="amount" class="form-control" required placeholder="Enter Amount">
                            </div>
                            <div class="col-sm-12 p-1">
                                <textarea name="note" id="note" cols="30" rows="3" required placeholder="Enter Note" class="form-control"></textarea>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="alert alert-secondary btn-block" style="color:black;padding:7px 25px;margin-right:10px;border:none;font-weight:600;background:#b79359">Add Fee</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
           </div>
        </div>
    </div>
@endsection