{{ Form::model($_REQUEST, ['route'=>'department.store'  ,'method' => 'post']) }}
<div class="row col-md-12">
   
    <div class="col-md-4 mb-3">
        <label class="form-label" for="basic-default-email">Department</label>
        
        {!! Form::text('name', $name ?? request('name'), [
            'placeholder' => 'Name',
            'id' => 'name',
            'class' => 'form-control',
        ]) !!}
    </div>
   <input type="text" name="id" value="{{ $id }}" hidden>  
</div>
<button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> &nbsp; Add Department</button>
{!! Form::close() !!}