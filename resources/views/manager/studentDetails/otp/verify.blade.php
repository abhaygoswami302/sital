@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
           <div class="col-sm-8 offset-2">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">Verify Student Detail OTP</div>
                    </div>
                </div>
                <div class="card-body">
                     @include('manager.partials.alert')
             
                     <form action="{{ route('student.details.verify.store') }}" method="POST" enctype="multipart/form-data">
                         @csrf
                         <div class="row">
                             <div class="col-sm-6 py-1">
                                <input type="text" name="username" id="username" required class="form-control" value="{{ $student->username }}" readonly>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="otp" id="otp" autofocus required class="form-control" placeholder="Enter OTP">
                            </div>
                             <div class="col-sm-12 py-1">
                                 <button type="submit" class="btn btn-primary btn-block">Verify OTP</button>
                             </div>
                         </div>
                     </form>
                </div>
            </div>
           </div>
        </div>
    </div>
@endsection