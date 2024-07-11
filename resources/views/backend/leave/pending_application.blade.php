@extends('layouts.app')
@section('title', 'Pending Application')

@section('content')  

<div class="content-wrapper">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <div class="container-xxl flex-grow-1 container-p-y">
        @if (Illuminate\Support\Facades\Auth::user()->user_type=='admin')
        <div class="card">
            <div class="card-datatable table-responsive">
                <table class="table" width="100%" cellspacing="0"  id="user_table">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">#</th>
                            <th width="10%">Employee Name</th>
                            <th width="10%">Login Date</th>
                            <th width="10%">Status</th>
                            <th width="10%">Actions</th>
                         
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($pendingLeaveApplications as $pendingLeaveApplication)
                              <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$pendingLeaveApplication->name}}</td>
                              <td>{{$pendingLeaveApplication->login_date}}</td> 
                              <td>{{$pendingLeaveApplication->login_status}}</td>
                              <td>
                                <a href=""><button type="button" class="btn btn-primary btn-sm">Apply Now</button></a>
                              </td>
                                
                          </tr>
                        @endforeach
                        {{-- @include('layouts.table-footer', ['linkData' => $pendingApplcations]) --}}
                    </tbody>
                </table>
            </div>
        </div>
        @endif   
        


    </div>
</div>
</div>

@endsection