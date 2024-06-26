@extends('layouts.app')
@section('title', 'Leave')

@section('content')  

<div class="content-wrapper">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card shadow mb-4">
            <div class="card-body">
                @include('backend.leave.form')
            </div>
        </div>
  
    </div>
</div>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#date_of_leave, #until').change(function() {
            var dateOfLeave = new Date($('#date_of_leave').val());
            var until = new Date($('#until').val());
            if (dateOfLeave && until && dateOfLeave <= until) {
                var totalWorkingDays = 0;
                var currentDate = new Date(dateOfLeave);
                while (currentDate <= until) {
                    var dayOfWeek = currentDate.getDay();
                    if (dayOfWeek !== 0 && dayOfWeek !== 6) { 
                        totalWorkingDays++;
                    }
                    currentDate.setDate(currentDate.getDate() + 1);
                }
                $('#total_working_day').val(totalWorkingDays);
                var nextJoiningDate = new Date(until);
                nextJoiningDate.setDate(nextJoiningDate.getDate() + 1);

                while (nextJoiningDate.getDay() === 0 || nextJoiningDate.getDay() === 6) { 
                    nextJoiningDate.setDate(nextJoiningDate.getDate() + 1);
                }
                var nextJoiningDayFormatted = nextJoiningDate.getFullYear() + '-' + ('0' + (nextJoiningDate.getMonth() + 1)).slice(-2) + '-' + ('0' + nextJoiningDate.getDate()).slice(-2);
                $('#next_join_day').val(nextJoiningDayFormatted);
            }
        });

    });
    </script>








@endsection