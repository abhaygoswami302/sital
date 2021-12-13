@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
           <div class="col-sm-8 offset-2">
            <div class="card">
                <div class="card-header">Student Status | <b> {{ $student->username }}</b></div>
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

                    @if ($student->status == 'Processing')
                        <img src="{{ asset('images/processing.gif') }}" />
                        @if ($student->document <> null)
                        <a href="{{ $student->document }}">
                            <button  class="btn btn-info ">
                                Download
                            </button>
                        </a>
                        @endif
                        @if ($student->admin_note <> null)
                        <p class="p-2">
                            <h4>Admin Note :</h4>
                           <h5 class=" alert alert-info">
                            {{ $student->admin_note }}
                           </h5>
                        </p>
                        @endif
                    @elseif ($student->status == 'Approved')
                        <img src="{{ asset('images/approved.gif') }}" />
                        @if ($student->document <> null)
                        <a href="{{ $student->document }}">
                            <button  class="btn btn-success ">
                                Download
                            </button>
                        </a>
                        @endif
                        @if ($student->admin_note <> null)
                        <p class="p-2">
                            <h4>Admin Note :</h4>
                           <h5 class=" alert alert-success">
                            {{ $student->admin_note }}
                           </h5>
                        </p>
                        @endif

                    @elseif ($student->status == 'Rejected')
                        <img src="{{ asset('images/rejected.gif') }}" />
                        @if ($student->document <> null)
                        <a href="{{ $student->document }}">
                            <button  class="btn btn-danger ">
                                Download
                            </button>
                        </a>
                        @endif
                        @if ($student->admin_note <> null)
                        <p class="p-2">
                            <h4>Admin Note :</h4>
                           <h5 class=" alert alert-danger">
                            {{ $student->admin_note }}
                           </h5>
                        </p>
                        @endif
                    @endif
                    
                </div>
            </div>
           </div>
        </div>
    </div>
@endsection