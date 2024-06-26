@extends('layouts.app')
@section('title', 'Attendance')

@section('content')  
<style>
    .updateSummery span{
         color: red;
    }
</style>

<div class="content-wrapper">
@include('backend.attentance.model')
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
           
            <div class="card-header">
                <div class="float-start">
                    <p>Late Attendance Summery.......</p>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table class="table" width="100%" cellspacing="0"  id="user_table">
                    <thead class="table-light">
                        <tr>
                            <th >Date</th>
                            <th>LogIn Time</th>
                            <th>Reason</th>
                            <th width="20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>  
                            @foreach ($lateAttends as $lateAttend )
                                  <tr>
                                 <td>{{$lateAttend->login_date }}</td>
                                 <td>{{$lateAttend->login_time  }}</td>
                                  @if ($lateAttend->reason_late_in!=null)
                                     <td>{{ $lateAttend->reason_late_in }}</td>
                                     @else
                                      <td>N/A</td> 
                                  @endif
                                 
                                 <td>
                                    <button type="button" data-id="{{ $lateAttend->id }}" class="btn btn-primary btn-sm reason-btn" data-toggle="modal" data-target="#exampleModal">
                                       Add Fiction
                                    </button>
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
<script>
     

    $(document).ready(function() {

        $(".reason-btn").click(function() {
        let attendanceId = $(this).attr('data-id');
          $("#attendanceId").val(attendanceId);
      });

      $("#formData").submit(function(event){
        event.preventDefault();
        let formData = $(this).serialize();
        
        $.ajax({
          url: "{{ route('attendance.reason_late_in') }}",
          type: "POST",
          data: formData,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function (response) {
            if(response.status=='success'){
                window.location.href = "{{ route('attendance.late_attend') }}";
            }
          },
        
        });
      });
    });
    
  </script>

@endsection