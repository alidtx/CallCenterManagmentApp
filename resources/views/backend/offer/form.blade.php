<form action="{{ route('lead_offer.store')}}" method="post"  >
    @csrf
    <div class="row">
     <div class="form-group col-sm-4">
         <label>Type<small style="color: brown">*</small></label>
         <select name="type" id="type" class="form-control">
               <option value="">---Select Offer Type---</option>
                 @if ($type=='')
                <option value="1">Basic</option>
                <option value="2">Combo</option>
                <option value="3">Premium</option>
                 @else
                 @if ($type==1)
                <option value="1" selected>Basic</option>  
                @elseif ($type==2) 
                <option value="2" selected>Combo</option>
                @elseif ($type=3)      
                <option value="3" selected>Premium</option>
                @else              
                @endif 
                @endif                                            
         </select>
         <span class="msg_errors  msg_first_name"></span>
       </div>

     <div class="form-group col-sm-4">
        <label>Amount<small style="color: brown">*</small></label>
        <input type="text" class="form-control " name="amount" id="amount" placeholder="Amount" value="{{ $amount }}"> 
        <span class="msg_errors  msg_first_name"></span>
    </div>
    </div>
     <br>
    <button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> &nbsp; Add Lead Offer</button>
</form>