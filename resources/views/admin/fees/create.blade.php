@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow mb-4 my-card">
                <div class="card-header">
                        <a href="">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Add Fee Details
                        </h6>
                    </a>
                </div>
                <div class="collapse show">
                    <div class="card-body">
                    
                        @include('admin.partials.alert')
                        @if (Session::get('feeadded'))
<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-success">
            {{ Session::get('feeadded') }} <a href="{{ route('admin_fee.edit', Session::get('fee')) }}">View Details</a>
        </div>
    </div>
</div>
@endif 
@if (Session::get('amountnull'))
<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-danger">
            {{ Session::get('amountnull') }}
        </div>
    </div>
</div>
@endif 

        
                        <form action="{{ route('admin_fee.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                           <livewire:add-fee :students="$students"/>
                        </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection