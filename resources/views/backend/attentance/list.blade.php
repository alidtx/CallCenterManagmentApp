@extends('layouts.app')
@section('title', 'Attendance')

@section('content')  
<style>
    .updateSummery span{
         color: red;
    }
</style>
<div class="content-wrapper">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    
    <div class="container-xxl flex-grow-1 container-p-y">
         @if(session()->has('error'))
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        {{session('error')}}  
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
       </div> 
         @endif 
        <div class="card mb-2">
            <div class="card-header border-bottom">
                <div class="float-end">
                    <a class="btn btn-primary" href="{{ route("attendance.store") }}"><i class="fa fa-plus"></i>Add
                      Today's  Attendance</a>
                </div>
                <div class="float-start">
                     @if (isset($todayAttendance))
                     <p class="updateSummery">
                         Hello!!   {{Illuminate\Support\Facades\Auth::user()->name}}
                        <br>Today's Date & Time: {{$todayAttendance->login_date}} : {{$todayAttendance->login_time}}
                        <br> Login Status: <span>{{Illuminate\Support\Str::ucfirst($todayAttendance->login_status)}}</span> 
                       </p>
                     @endif
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    <p>Employee's Attendance Summery.......</p>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table class="table" width="100%" cellspacing="0"  id="user_table">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>LogIn Date</th>
                            <th>LogIn Time</th>
                            <th>LogOut Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>  
                         @if (isset($attendance))
                         <tr>
                         <td>{{ $attendance->user->name }}</td>
                         <td>{{ $attendance->login_date }}</td>
                         <td>{{ $attendance->login_time }}</td>
                         <td>{{ $attendance->logout_time }}</td>
                         <td>{{ $attendance->login_status }}</td>
                        </tr>
                         @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

@endsection