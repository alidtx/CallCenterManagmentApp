{{ Form::model($_REQUEST, ['route'=>'per_lead.store'  ,'method' => 'post']) }}

<div class="row col-md-12">
   
    <div class="col-md-4 mb-3">
        <label class="form-label" for="basic-default-email">Per Lead Price</label>
        
        {!! Form::text('amount', $amount ?? request('amount'), [
            'placeholder' => 'Amount',
            'id' => 'amount',
            'class' => 'form-control',
        ]) !!}
    </div>
   <input type="text" name="id" value="{{ $id }}" hidden>  
</div>
<button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> &nbsp; Add Per Lead Price</button>
{!! Form::close() !!}