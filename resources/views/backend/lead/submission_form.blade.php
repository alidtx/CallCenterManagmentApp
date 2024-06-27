<!DOCTYPE html>
<html>
<head>
  <title>Credit Check</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>

<style>
    *{
margin: 0;
padding: 0;
}

body{
     margin: 0;
     padding: 0;
   
}
.main{
    max-width: 900px;
    margin: 0 auto;
    padding: 20px;

}
.header{
 
    background: burlywood;
    padding: 25px 25px;
    color: black;
    line-height: 1.5;
    border-bottom: 3px solid black;
    margin-bottom: 10px;
}
.title{
    text-align: center;
    font-size: 25px;
    font-weight: bold;    
}

.personDescription {
    background-color: #eeeeee;
    padding: 6px;
    border-radius: 6px;
    margin-top: -4px;
}
 
.tooltipBox {
    background-color: #666666;
    color: white;
    border-radius: 4px;
    padding: 4px;
}
 .msg_errors{
   color: red;
   font-size: 15px;

 }
</style>


<body>
   <section class="main">
    <div class="container">
            <div class="header">
                 <p class="title">This is a title to be palced</p>
            </div>
        <div class="formsection">
          
                <form action="{{ route('lead.store')}}" method="post" id="formSubmission" >
                   @csrf
                   <div class="row">
                    <div class="form-group col-sm-6">
                        <label>First Name<small style="color: brown">*</small></label>
                        <input type="text" class="form-control " name="first_name" id="first_name" placeholder="First Name"> 
                        <span class="msg_errors  msg_first_name"></span>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Last Name<small style="color: brown">*</small></label>
                        <input type="text" class="form-control " name="last_name" id="last_name" placeholder="Last Name">
                        <span class="msg_errors msg_last_name"></span>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Business Name<small style="color: brown">*</small></label>
                        <input type="text" class="form-control " name="business_name" id="business_name" placeholder="Business Name"> 
                        <span class="msg_errors msg_business_name"></span>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Email Address<small style="color: brown">*</small></label>
                        <input type="email" class="form-control " name="email" id="email" placeholder="Email Address"> 
                        <span class="msg_errors  msg_email"></span>
                    </div>

                    <div class="form-group  col-sm-6">
                        <label>Looking Amount<small style="color: brown">*</small></label>
                        <input type="text" class="form-control " name="looking_amount" id="looking_amount" placeholder="Looking Amount"> 
                        <span class="msg_errors msg_looking_amount"></span>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Credit Score<small style="color: brown">*</small></label>
                        <input type="text" class="form-control " name="credit_score" id="credit_score" placeholder="Credit Score"> 
                        <span class="msg_errors msg_credit_score"></span>
                    </div>
                    <div class=" col-sm-7">
                    <div class="form-group">
                        <label>Phone<small style="color: brown">*</small></label>
                        <input type="text" class="form-control " name="phone" id="phone" placeholder="Phone Number"> 
                        <span class="msg_errors msg_phone"></span>
                    </div>
                    <div class="form-group">
                        <label>Campaign<small style="color: brown">*</small></label>
                         <select name="campaign_id" id="campaign" class="form-control"> 
                              <option value="">----Select Campaign----</option>
                               @foreach ($campaigns as $campaign )
                               <option value="{{ $campaign->id }}">{{ $campaign->name }}</option>
                               @endforeach  
                         </select>
                         <span class="msg_errors msg_campaign_id"></span>
                    </div>

                    <div class="form-group">
                        <label>Your Name<small style="color: brown">*</small></label>
                         <select name="employee_id" id="employee_id" class="form-control"> 
                              <option value="">----Select Your Name----</option>
                               @foreach ($employees as $employees )
                               <option value="{{ $employees->id }}">{{ $employees->name."($employees->employeeUniqueId)" }}</option>
                               @endforeach  
                         </select>
                         <span class="msg_errors msg_employee_id"></span>
                    </div>
                    <div class="form-group">
                        <label>Is Dnc?<small style="color: brown">*</small></label>

                        <label>
                            <input type="radio" name="isDnc" value="1"> Yes
                        </label>
                        <label>
                            <input type="radio" name="isDnc" value="0"> No
                        </label>
                        <span class="msg_errors msg_isDnc"></span>
                    </div>

                    </div>
                
                   </div>
                   <button type="submit"  class="btn btn-primary">Submit Now</button> 
                </form>
                 </div>
                 
             
               
        </div>    
    </div> 
   </section>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 
<script> 
     $("#formSubmission").submit(function(event){
           event.preventDefault();
           
           let formData = $(this).serialize();
           let token = $('meta[name="csrf-token"]').attr('content')
            
           $.ajax({
                     url: "{{ route('lead.store') }}",
                     type: "POST",
                     data: formData,
                     headers: {
                     'X-CSRF-TOKEN': token
                      }, 
                    success: function (response) {
                         
                        if(response.errors){
                           $.each(response.errors, function(key,val){
                              $(".msg_"+key).html(val);                
                           });
                        }else{
                             $("#formSubmission").empty();
                             $(".formsection").html("<p style='text-align:center; font-size:20px'>Lead Submitted Successfully.<br> Go for next one</p>")
                        }
                    }
           })
     }); 
</script>

</body>
</html>