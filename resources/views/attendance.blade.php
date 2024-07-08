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
                  <a class="btn btn-primary" href="{{ route("home.store") }}"><i class="fa fa-plus"></i>Add
                    Today's  Attendance</a>
              </div>
              <div class="float-start">
                   {{-- @if (isset($todayAttendance)) --}}
                   <p class="updateSummery">
                       Hello!!   {{Illuminate\Support\Facades\Auth::user()->name}}
                      <br>Today's Date & Time: {{$todayAttendance->login_date}} : {{$todayAttendance->login_time}}
                      <br> Login Status: <span>{{Illuminate\Support\Str::ucfirst($todayAttendance->login_status)}}</span> 
                     </p>
                   {{-- @endif --}}
              </div>
          </div>
      </div>
  </div>
</div>
</div>