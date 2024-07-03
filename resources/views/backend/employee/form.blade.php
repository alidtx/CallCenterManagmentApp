  <form action="{{ route('employee.store') }}"  method="post">
  @csrf
     <div class="row">
        <div class="form-group  col-sm-4">
            <label>Name<small style="color: brown">*</small></label>
            <input type="text" class="form-control " name="name" id="name" placeholder="Name" value="{{ $name }}"> 
        </div>
    
        <div class="form-group  col-sm-4">
            <label>User Name<small style="color: brown">*</small></label>
              <select name="user_id" id="user_id" class="form-control">
                    <option value="">---Select user name---</option>
                     @foreach ($users as $user)
                     <option value="{{ $user->id }}" {{$user->id==$user_id? "selected" : ""  }}  >{{ $user->name }}</option>  
                     @endforeach
                    
              </select>
        </div>
        <div class="form-group  col-sm-4">
            <label>Designation<small style="color: brown">*</small></label>
              <select name="designation_id" id="designation_id" class="form-control">
                    <option value="">---Select user name---</option>
                     @foreach ($designations as $designation)
                     <option value="{{ $designation->id }}" {{$designation->id==$designation_id? "selected" : ""  }}  >{{ $designation->name }}</option>  
                     @endforeach
                    
              </select>
        </div>

        <div class="form-group  col-sm-4">
            <label>Department<small style="color: brown">*</small></label>
              <select name="department_id" id="department_id" class="form-control">
                    <option value="">---Select user name---</option>
                     @foreach ($departments as $department)
                     <option value="{{ $department->id }}" {{$department->id==$department_id? "selected" : ""  }}  >{{ $department->name }}</option>  
                     @endforeach
                    
              </select>
        </div>


        <div class="form-group  col-sm-4">
            <label><small style="color: brown"></small>Employee Unique Id</label>
            <input type="text" class="form-control " name="employeeUniqueId" id="employeeUniqueId" value="{{$employeeUniqueId}}" disabled > 
        </div>
        <input type="text" name="id" value="{{ $id }}" hidden>  
     </div>
      <br>
     <button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> &nbsp; Add Employee</button>
  </form>