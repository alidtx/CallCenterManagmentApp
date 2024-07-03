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
            <div class="card-header border-bottom">
                <div class="float-start">
                    <p>Employee's Deduction Summery.......</p>
                    <input type="text" id="searchInput" name='search' class="form-control" placeholder="Search Month/Year">
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table class="table" width="100%" cellspacing="0"  id="user_table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Month/Year</th> 
                            <th>Name</th>
                            <th>Late Days</th>
                            <th>Deduction Amount</th>
                            <th>Late Count</th>
                        </tr>
                    </thead>
                    <tbody>  
                           @if (isset($deductionSummeries))
                           @foreach ($deductionSummeries as $deductionSummery)
                                    <tr>
                                    <td>{{$loop->iteration  }}</td>
                                    <td>{{\Carbon\Carbon::parse($deductionSummery->created_at)->format('F Y') }}</td>
                                    <td>{{$deductionSummery->name }}</td>
                                    <td>{{$deductionSummery->late_days }} Days</td>
                                    <td>
                                      @php
                                          $dailySalary=$deductionSummery->emp_basic_salary/22;
                                          $deductionPeriods = intdiv($deductionSummery->late_days, 3);
                                          $deductedSalary = $dailySalary * $deductionPeriods; 
                                      @endphp
                                          {{floor($deductedSalary)}} Tk
                                    </td>
                                    <td>
                                        @php  
                                        $dailySalary = $deductionSummery->emp_basic_salary / 22;
                                        $deductionPeriods = intdiv($deductionSummery->late_days, 3);
                                      @endphp
                                      {{$deductionPeriods}} Days
                                    </td> 
                                </tr>  
                           @endforeach
                           @endif
                           @include('layouts.table-footer', ['linkData' => $deductionSummeries])
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tbody tr").filter(function() {
                $(this).toggle($(this).find('td:nth-child(2)').text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>

@endsection