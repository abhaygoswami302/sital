@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow mb-4 my-card">
                <div class="card-header">
                        <a href="">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Add Student Fee Details
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

        
                        <form action="{{ route('admin.add.student.fee.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                
                                <div class="col-sm-12">
                                    <livewire:admin-student-fee :student="$student" />
                                </div>
                                <div class="col-sm-12">
                                    <textarea name="note" id="note" cols="30" rows="2" required class="form-control" placeholder="Enter Note"></textarea>
                                </div>
                            
                                <div class="col-sm-12 py-1">
                                    <button type="submit" class="btn btn-primary btn-block">Add Fee Details</button>
                                </div>
                            
                                <div class="col-sm-12">
                                    <hr>
                                </div>
                            
                                <div class="col-sm-12 table-responsive">
                                    <table class="table table-hover table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <td>Fees Type</td>
                                                <td>Username</td>
                                                <td>Email</td>
                                                <td>Amount</td>
                                                <td>Total</td>
                                                <td>Counsellor</td>
                                                <td>Note</td>
                                                <td>Created At</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($fees as $fee_type => $fee)
                                                @foreach ($fee as $student123)
                                                <tr>
                                                    @if($loop->first)
                                                    <td style="background:rgb(204, 204, 204);color:black"><b>{{ $student123->fee_type }}</b></td>
                                                    @else
                                                    <td>{{ $student123->fee_type }}</td>
                                                    @endif
                                                    <td>{{ $student123->username }}</td>
                                                    <td>{{ $student123->email }}</td>
                                                    <td>{{ $student123->amount }}</td>
                                                    @if($loop->first)
                                                    <td style="background:rgb(204, 204, 204);color:black"><b>{{ $student123->total }}</b></td>
                                                    @else
                                                    <td>{{ $student123->total }}</td>
                                                    @endif
                                                    <td>{{ $student123->counsellor }}</td>
                                                    <td style="width:100px!important;">{{ $student123->note }}</td>                    
                                                    <td>{{ $student123->created_at->diffForHumans() }}</td>                    
                                                </tr>
                                                @endforeach
                                            @endforeach
                                            <tr  style="background:rgb(172, 171, 171);color:black">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><b>{{ $total }}</b></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection