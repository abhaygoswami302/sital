@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
           <div class="col-sm-8 offset-2">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">Send Student Details OTP</div>
                    </div>
                </div>
                <div class="card-body">
                     @include('manager.partials.alert')
             
                     <form action="#" method="POST" enctype="multipart/form-data">
                         @csrf
                         <div class="row">
                             <div class="col-sm-6 py-1">
                                <select name="username" id="username" autofocus required class="form-control">
                                    <option value="" selected>Select Student Username</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->username }}">{{ $student->username }}</option>                                        
                                    @endforeach
                                </select>
                            </div>
                             <div class="col-sm-6 py-1">
                                 <button type="submit" class="btn btn-primary btn-block">Send OTP</button>
                             </div>
                         </div>
                     </form>
                </div>
            </div>
           </div>
        </div>
    </div>
@endsection