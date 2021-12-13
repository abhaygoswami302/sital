@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow mb-4 my-card">
                <div class="card-header">
                    <a href="" >
                        <h6 class="m-0 font-weight-bold text-primary">
                            View/Edit All Students
                        </h6>
                    </a>
                </div>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="">
                    <div class="table-responsive">
                        <table class="table card-body table-hover table-bordered table-striped" id="" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Visa Category</th>
                                    <th>Phone No</th>
                                    <th>Status</th>
                                    <th>Joined At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->username }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->visa_category }}</td>
                                        <td>{{ $student->phone_no }}</td>
                                        @if ($student->status == 'Approved')
                                        <td style="background: lightgreen">
                                            {{ $student->status }}
                                            <a href="{{ $student->document }}"><i class="fas fa-download"></i></a>
                                        </td>
                                        @elseif ($student->status == 'Rejected')
                                        <td style="background: rgb(229, 182, 182)">
                                            {{ $student->status }}
                                            <a href="{{ $student->document }}"><i class="fas fa-download"></i></a>
                                        </td>
                                        @else
                                        <td style="background: rgb(246, 246, 215)">{{ $student->status }}</td>

                                        @endif
                                        <td>{{ $student->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('admin_fee.show', $student->username) }}">
                                                <button class="btn btn-outline-primary btn-sm">View Fee / Update Status</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection