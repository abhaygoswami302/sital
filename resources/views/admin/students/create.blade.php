@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow mb-4 my-card">
                <div class="card-header">
                        <a href="">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Add New Student
                        </h6>
                    </a>
                </div>
                <div class="collapse show">
                    <div class="card-body">
                    
                        @include('admin.partials.alert')
        
                        <form action="{{ route('admin_student.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <livewire:admin-student-username />
                        </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection