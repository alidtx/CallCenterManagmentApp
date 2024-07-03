<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadOfferRequest;
use App\Http\Requests\LeadRequest;
use App\Models\LeadOffer;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
class LeadOfferController extends Controller
{
    
    public function index()
    {
     $data['leadOffers']=LeadOffer::orderby('id','DESC')->paginate(10);  
     return view('backend.offer.list', $data);
    }

  
    public function create($id='')
    {
         if($id>0){
             $arr=LeadOffer::where('id', $id)->get(); 
             $result['amount']=$arr[0]->amount;    
             $result['type']=$arr[0]->type;    
             $result['id']=$arr[0]->id;
         }
         else {
            $result['amount']='';
            $result['type']='';    
            $result['id']='';
         }
      return view('backend.offer.add', $result);
    }   

   
    public function store(LeadOfferRequest $request)
    {     
         if($request->id>0){                          
         $model=LeadOffer::find($request->id);
         Toastr::success('campaign edited successfully', 'edited');
         }else{
         $model=New LeadOffer();   

         Toastr::success('campaign created successfully', 'Created');
         }
         $model->amount=$request->amount;
         $model->type=$request->type;
         $model->save();
         return redirect()->route('lead_offer.list');
    }



  public function status($status, $id) {
     $model=LeadOffer::find($id);
     $model->status=$status;
     $model->save();
     return redirect()->route('lead_offer.list');
     Toastr::success('campaign status has changed successfully', 'Status');
  }

}
