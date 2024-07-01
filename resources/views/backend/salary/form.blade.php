
<form action="{{ route('salary.store') }}" method="post">
    @csrf
   <div class="row">
    <div class="form-group col-sm-4 md-3">
        <label>Basic Salary<small style="color: brown">*</small></label>
        <input type="text" class="form-control " name="amount" id="amount" placeholder="Salary Amount" value="{{ $amount }}"> 
        <span class="msg_errors  msg_amount"></span>
    </div>

    <div class="form-group col-sm-4 md-3">
        <label>Transportation<small style="color: brown">*</small></label>
        <input type="text" class="form-control " name="transportation" id="transportation" placeholder="Transportation" value="{{ $transportation }}"> 
        <span class="msg_errors  msg_transportation"></span>
    </div>

    <div class="form-group col-sm-4 md-3">
        <label>Food<small style="color: brown">*</small></label>
        <input type="text" class="form-control " name="food" id="food" placeholder="Food" value="{{ $food }}"> 
        <span class="msg_errors  msg_food"></span>
    </div>
    <div class="form-group col-sm-4 md-3">
        <label>Residance<small style="color: brown">*</small></label>
        <input type="text" class="form-control " name="residance" id="residance" placeholder="residance" value="{{ $residance }}"> 
        <span class="msg_errors  msg_residance"></span>
    </div>

    <div class="form-group col-sm-4 md-3">
        <label>Employee<small style="color: brown">*</small></label>
        <select name="employee_id" id="employee_id" class="form-control">
            <option value="">---Select Employee---</option>
            @foreach ($employees as $employee)
            <option value="{{ $employee->id }}" {{$employee_id==$employee->id? "selected" : ""  }}>{{ $employee->name }}</option>
            @endforeach

        </select>
        
        <span class="msg_errors  msg_amount"></span>
    </div>

    <div class="form-group col-sm-4 md-3">
        <label>Designation<small style="color: brown">*</small></label>
        <select name="designation_id" id="designation_id" class="form-control">
            <option value="">---Select Designation---</option>
    
            @foreach ($designations as $designation)
            <option value="{{ $designation->id }}" {{$designation_id==$designation->id? "selected": "" }}>{{ $designation->name }}</option>
            @endforeach
        </select>
        <span class="msg_errors  msg_amount"></span>
    </div>

    <div class="form-group col-sm-4 md-3">
        <label>Department<small style="color: brown">*</small></label>
        <select name="department_id" id="department_id" class="form-control">
            <option value="">---Select Department---</option>
            @foreach ($departments as $department)
            <option value="{{ $department->id }}" {{ $department_id==$department->id ? "Selected":"" }}>{{ $department->name }}</option>
            @endforeach
        </select>
        <span class="msg_errors  msg_amount"></span>
    </div>
</div>
     <br>
    <button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> &nbsp; Add Salary</button>
    <input type="text" name="id" value="{{ $id }}" hidden>
</form>



