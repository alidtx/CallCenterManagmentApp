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
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    <p>Employee's Today's Attendance Summery.......</p>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table class="table" width="100%" cellspacing="0"  id="user_table">
                    <thead class="table-light">
                        <tr>
                            <th>Employee Name</th>
                            <th>Employee User Name</th>
                            <th>LogIn Date</th>
                            <th>LogIn Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>  
                         @if (isset($todayAttendances))
                          @foreach ($todayAttendances as $todayAttendance)
                          <tr>
                            <td>{{ $todayAttendance->user_name }}</td>
                            <td>{{ $todayAttendance->employee_name }}</td>
                            <td>{{ $todayAttendance->login_date }}</td>
                            <td>{{ $todayAttendance->login_time }}</td>
                            <td>{{ $todayAttendance->login_status }}</td>
                           </tr>
                          @endforeach
                         
                         @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

@endsection