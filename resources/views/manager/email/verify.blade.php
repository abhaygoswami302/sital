@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
           <div class="col-sm-10 offset-1">
            @include('manager.partials.alert')
            @if (Session::get('student_created'))
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-success">
                        {{ Session::get('student_created') }} 
                    </div>
                </div>
            </div>
        @endif
            <div class="card">
                <div class="card-header">Students ( Email Not Verified )</div>
                <div class="">
             
                    @if (count($temporaries) > 0)
                    <table class="table card-body table-hover table-bordered table-striped" id="" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Visa Category</th>
                                <th>Phone No</th>
                                <th>Joined At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($temporaries as $student)
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->username }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->visa_category }}</td>
                                    <td>{{ $student->phone_no }}</td>
                                    <td>{{ $student->created_at->diffForHumans() }}</td>
                                    <td>
                                            <a href="{{ route('verify.email.otp', $student->id) }}">
                                                <button class="alert alert-secodary btn-sm" style="color:black;padding:7px 25px;margin-right:10px;border:none;font-weight:600;background:#b79359">
                                                    Verify Email
                                                </button>
                                            </a>
                                    </td>
                                </tr>
                                @empty
                                <h4 class="text-center p-3 alert alert-secondary">No Record Exists</h4>
                                @endforelse
                        </tbody>
                    </table>                  
                    @else
                    <h4 class="text-center p-3 alert alert-secondary">No Temporary Record Exists</h4>
                    @endif
                </div>
            </div>
           </div>
        </div>
    </div>
@endsection