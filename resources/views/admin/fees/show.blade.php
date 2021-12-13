@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @include('admin.partials.alert')
                <div class="card shadow mb-4 my-card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <b>{{ ucfirst($student->name) }}</b> Fee Details
                            </div>
                            <!--div class="col-sm-2 text-right">
                                <a href="{{ route('admin_fee.create') }}">
                                    <button class="btn btn-primary btn-sm" >Add Fee Details</button>
                                </a>
                            </div-->
                            <div class="col-sm-2 text-right">
                                <a href="{{ route('admin.add.student.fee', $student->username) }}">
                                    <button class="btn btn-primary btn-sm" >Add Fee Details</button>
                                </a>
                            </div>
                            <div class="col-sm-2 text-right" >
                                <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#updateStatus">Update Status</button>
                            </div>
                            <div class="col-sm-2 text-right">
                                <a href="{{ route('admin_student.index') }}">
                                    <button class="btn btn-primary btn-sm">Go Back</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-body table-hover table-striped table-bordered">
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

                    <!-- update status modal -->
                    <!-- Modal -->
                    <div class="modal fade" id="updateStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('status.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Status</label>                                                
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="status2" 
                                                    @if ($student->status == 'Processing')
                                                    checked                                    
                                                    @endif
                                                    value="Processing">
                                                    <label class="form-check-label" for="status2">
                                                    Processing
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="status2"
                                                    @if ($student->status == 'Approved')
                                                    checked                                    
                                                    @endif
                                                    value="Approved">
                                                    <label class="form-check-label" for="status2">
                                                    Approved
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="status2" 
                                                    @if ($student->status == 'Rejected')
                                                    checked                                    
                                                    @endif
                                                    value="Rejected">
                                                    <label class="form-check-label" for="status2">
                                                    Rejected
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 py-2">
                                       <div class="row py-4">
                                           <div class="col-sm-5">
                                            <label for="document">Supporting Document</label>
                                           </div>
                                           <div class="col-sm-7">
                                            <input type="file" name="document" id="document" required>
                                           </div>
                                           <div class="col-sm-12">
                                               @if ($student->document <> NULL)
                                                 <a href="{{ $student->document }}" target="_blank">
                                                View Document
                                                </a>
                                               @endif
                                           </div>
                                       </div>
                    
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="">Add Note</label>
                                        <textarea name="admin_note" id="admin_note" cols="30" rows="4" placeholder="Add Note" class="form-control">
                                            {{ $student->admin_note ? $student->admin_note : 'Funds Note' }}
                                        </textarea>
                                    </div>
                                </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Status</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
    
    
                </div>

            </div>
        </div>
    </div>
@endsection