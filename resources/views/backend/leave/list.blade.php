@extends('layouts.app')
@section('title', 'Leave')

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
                            <th width="10%">Date of Leave</th>
                            <th width="10%">Until</th>
                            <th width="8%">Total Days</th>
                            <th width="10%">Next Join Date</th>
                            <th width="10%">Phone</th>
                            <th width="5%">Actions</th>
                         
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($leaves as $leave)
                              <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$leave->employee->name}}</td>
                              <td>{{$leave->date_of_leave}}</td> 
                              <td>{{$leave->until}}</td> 
                              <td>{{$leave->total_working_day}}</td> 
                              <td>{{$leave->next_join_date}}</td> 
                              <td>{{$leave->phone}}</td> 
                              <td>
                                @if($leave->status==0)
                              <a href="{{url('leave/status/1')}}/{{ $leave->id }}"><button type="button" class="btn btn-warning btn-sm">Approve</button></a>
                              @elseif($leave->status==1)
                              <a href="{{url('leave/status/0')}}/{{ $leave->id }}"><button type="button" class="btn btn-primary btn-sm">Unapprove</button></a>
                              @endif
                              </td>
                          </tr>
                        @endforeach
                        @include('layouts.table-footer', ['linkData' => $leaves])
                    </tbody>
                </table>
            </div>
        </div>
         @else
         <div class="card">
            <div class="card-datatable table-responsive">
                <table class="table" width="100%" cellspacing="0"  id="user_table">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">#</th>
                            <th width="10%">Employee Name</th>
                            <th width="10%">Date of Leave</th>
                            <th width="10%">Until</th>
                            <th width="8%">Total Days</th>
                            <th width="10%">Next Join Date</th>
                            <th width="10%">Phone</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($leaves as $leave)
                              <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$leave->employee->name}}</td>
                              <td>{{$leave->date_of_leave}}</td> 
                              <td>{{$leave->until}}</td> 
                              <td>{{$leave->total_working_day}}</td> 
                              <td>{{$leave->next_join_date}}</td> 
                              <td>{{$leave->phone}}</td> 
                          </tr>
                        @endforeach
                        @include('layouts.table-footer', ['linkData' => $leaves])
                    </tbody>
                </table>
            </div>
        </div>
        @endif   
        


    </div>
</div>
</div>

@endsection