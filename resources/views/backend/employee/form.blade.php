{{ Form::model($_REQUEST, ['route'=>'employee.store'  ,'method' => 'post']) }}
<div class="row col-md-12">
   
    <div class="col-md-4 mb-3">
        <label class="form-label" for="basic-default-email">Name</label>
        {!! Form::text('name', $name ?? request('name'), [
            'placeholder' => 'Name',
            'id' => 'name',
            'class' => 'form-control',
        ]) !!}
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label" for="basic-default-email">Employee Unique Identifier</label>
        {!! Form::text('Employee Unique Identifier', $employeeUniqueId ?? request('Employee Unique Identifier'), [
            'placeholder' => 'Employee Unique Identifier',
            'id' => 'name',
            'class' => 'form-control',
            'disabled' => 'disabled'
        ]) !!}
    </div>

   <input type="text" name="id" value="{{ $id }}" hidden>  
</div>
<button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> &nbsp; Add Employee</button>
{!! Form::close() !!}