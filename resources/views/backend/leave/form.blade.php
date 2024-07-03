<style>
.leave-form{
    max-width: 900px;
    margin: 0 auto;
    padding: 20px;
}
.form-group {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    width: 100%
}
.form-group label {
    margin-right: 10px;
    width: 20%;
}
</style>

<div class="leave-form">
   <form action="{{ route('leave.store') }}" method="post" id="frmData">
      @csrf 
      <div class="form-group">
          <label>Employee Name<small style="color: brown">*</small></label>
          @if(isset($employees))
              <select name="employee_id" id="employee_id" class="form-control">
                  <option value="">---Select your Employment Name---</option> 
                  @foreach($employees as $employee)
                      <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                  @endforeach
              </select>
          @else
               <input type="hidden" name="employee_id" id="employee_id" class="form-control" value="{{$employee->id}}">
              <input type="text" name="employee_id" id="employee_id" class="form-control" value="{{$employee->name}}" readonly>
          @endif
      </div>
      <div class="form-group">
          <label>Designation<small style="color: brown">*</small></label>
          @if(isset($designations))
              <select name="designation_id" id="designation_id" class="form-control">
                  <option value="">---Select Designation---</option>
                  @foreach($designations as $designation)
                      <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                  @endforeach
              </select>
          @else
              <input type="text" name="designation_id" id="designation_id" class="form-control" value="{{ @$designation->name }}" readonly>
          @endif
      </div>
      <div class="form-group">
          <label>Department<small style="color: brown">*</small></label>
          @if(isset($departments))
              <select name="department_id" id="department_id" class="form-control">
                  <option value="">---Select Department---</option>
                  @foreach($departments as $department)
                      <option value="{{ $department->id }}">{{ $department->name }}</option>
                  @endforeach
              </select>
          @else
              <input type="text" name="department_id" id="department_id" class="form-control" value="{{ @$department->name }}" readonly>
          @endif
      </div>
      <div class="form-group">
          <label>Date Of Leave<small style="color: brown">*</small></label>
          <input type="date" name="date_of_leave" id="date_of_leave" class="form-control" placeholder="Date of Leave"> 
      </div>
      <div class="form-group">
          <label>Until<small style="color: brown">*</small></label>
          <input type="date" name="until" id="until" class="form-control" placeholder="Until"> 
      </div>
      <div class="form-group">
          <label>Total Working Day<small style="color: brown">*</small></label>
          <input type="text" name="total_working_day" id="total_working_day" class="form-control" placeholder="Total Working Day">    
      </div>
      <div class="form-group">
          <label>Next Joining Day<small style="color: brown">*</small></label>
          <input type="text" name="next_join_day" id="next_join_day" class="form-control" placeholder="Next Joining Day">    
      </div>
      <div class="form-group">
          <label>Leave Category<small style="color: brown">*</small></label>
          <select name="leave_category" id="leave_category" class="form-control">
              <option value="">---Select leave Category---</option>
              <option value="half">Half Day</option>
              <option value="full">Full Day</option>
          </select>
      </div>
      <div class="form-group">
          <label>What Reason?<small style="color: brown">*</small></label>
          <textarea name="reason" id="reason" class="form-control" placeholder="Please Reasoning it...."></textarea>  
      </div>
      <div class="form-group">
          <label>Phone<small style="color: brown">*</small></label>
          <input type="text" name="phone" id="phone" class="form-control" placeholder="Please Your phone">    
      </div>
      <br>
      <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
      </div>
  </form>
  
   
</div>



