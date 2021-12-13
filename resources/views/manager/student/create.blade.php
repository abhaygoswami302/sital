@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
           <div class="col-sm-8 offset-2">
            <div class="card">
                <div class="card-header">Add New Student</div>
                <div class="card-body">
                     @include('manager.partials.alert')
             
                     <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                         @csrf
                         <livewire:student-username />
                     </form>
                </div>
            </div>
           </div>
        </div>
    </div>
@endsection