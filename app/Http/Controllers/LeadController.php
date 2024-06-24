<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\LeadRequest;
use App\Models\Campaign;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Facades\Validator;
class LeadController extends Controller
{
    
    public function index()
    {
     $data['leads']=lead::get();  
     return view('backend.lead.list', $data);
    }


    public function view($id) {
        $lead = Lead::with('user_name')->find($id);
        return view('backend.lead.view', compact('lead'));
    }
    

    public function download () {

        $data = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@example.com',
            'business_name' => 'Doe Enterprises',
            'looking_amount' => '$10,000',
            'credit_score' => '750',
            'phone' => '123-456-7890',
            'campaign' => 'Summer Campaign',
            'username' => 'johndoe123',
        ];
        $pdf = PDF::loadView('backend.lead.view', $data);
        return $pdf->download('form.pdf');
    } 


    public function leadSubmissionForm() 
    {      
        $data['campaigns']=Campaign::get();
    return view('backend.lead.submission_form', $data);
    }
 

    
    public function store(Request $request)
    {      
         $rules=[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'business_name' => 'required',
            'looking_amount' => 'required|numeric',
            'credit_score' => 'required|numeric',
            'phone' => 'required|numeric',
            'campaign_id' => 'required',
            'isDnc' => 'required',
         ];

         $message=[
           'first_name.required'=>'Please enter first name',
            'last_name.required'=>'Please enter last name',
            'email.required'=>'Please enter email',
            'business_name.required'=>'Please enter business name',
            'looking_amount.required'=>'Please enter looking amount',
            'looking_amount.numeric'=>'Looking amount must be a numeric!!',
            'credit_score.required'=>'Please enter credit score',
            'credit_score.numeric'=>'Credit Score must be a numeric!!',
            'phone.required'=>'Please enter phone number',
            'phone.numeric'=>'Phone must be a numeric!!',
            'campaign_id.required'=>'Please select campaign name',
            'isDnc.required'=>'Please tab yes or no',
         ];

        $validator = Validator::make($request->all(), $rules,  $message);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{
            $model=New lead();   
            $model->first_name=$request->first_name;
            $model->last_name=$request->last_name;
            $model->business_name=$request->business_name;
            $model->email=$request->email;
            $model->looking_amount=$request->looking_amount;
            $model->credit_score=$request->credit_score;
            $model->phone=$request->phone;
            $model->campaign_id=$request->campaign_id;
            $model->user_id=auth::user()->id;
            $model->is_dnc=$request->isDnc;
            $model->save();
        }
    }

  public function status($status, $id) {
     $model=lead::find($id);
     $model->status=$status;
     $model->save();
     return redirect()->route('lead.list');
     Toastr::success('Department status has changed successfully', 'Status');
  }

}
