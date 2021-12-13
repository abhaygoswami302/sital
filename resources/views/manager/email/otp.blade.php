@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
           <div class="col-sm-8 offset-2">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">Verify Email</div>
                        <!--div class="col-sm-6 text-right">
                            <a href="#">
                                <button>Send OTP </button>
                            </a>
                        </div-->
                    </div>
                </div>
                <div class="card-body">
                     @include('manager.partials.alert')
             
                     <form action="{{ route('verify.email.otp.store') }}" method="POST" enctype="multipart/form-data">
                         @csrf
                         <div class="row">
                             <div class="col-sm-6 py-1">
                                 <input type="hidden" required name="id" value="{{ $student->id }}">
                                 <input type="text" name="email" required value="{{ $student->email }}" readonly id="email" class="form-control" required placeholder="Enter Email" >
                             </div>
                             <div class="col-sm-6 py-1">
                                 <input type="text" name="otp" id="otp" required autofocus class="form-control" required placeholder="Enter OTP">
                             </div>
                             <div class="col-sm-6 py-1">
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