<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeaveRequest;
use App\Models\Attendance;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
class LeaveController extends Controller
{

    public function index()
    {  
         if(auth::user()->user_type=='admin'){
            $data['leaves'] = Leave::with('employee')
            ->orderby('id','DESC')
            ->paginate(10);
         }else{
            $data['leaves'] = Leave::where('user_id', auth::user()->id)->with('employee')
            ->orderby('id','DESC')
            ->paginate(10);
           } 
        
        return view('backend.leave.list', $data);
    }

    public function pendingApplication() 
    {
        $data['pendingApplcations'] = Attendance::where('login_status', 'late')->with('employee')
        ->orderby('id','DESC')
        ->get();
      
        return view('backend.leave.pending_application', $data);
    }
    
    public function create($id='')
    {   
        $result['employees']=Employee::get();
        $result['designations']=Designation::get();
        $result['departments']=Department::get(); 
        return view('backend.leave.add', $result);
    }   

   
    public function store(LeaveRequest $request)
    {   
        // dd($request->all());
        $model=new Leave();
        $model->user_id=auth::user()->id;
        $model->employee_id=$request->employee_id;
        $model->designation_id=$request->designation_id;
        $model->department_id=$request->department_id;
        $model->date_of_leave=$request->date_of_leave;
        $model->until=$request->until;
        $model->total_working_day=$request->total_working_day;
        $model->next_join_date=$request->next_join_day;
        $model->leave_category=$request->leave_category;
        $model->reason_of_leave=$request->reason;
        $model->phone=$request->phone;
        $model->save(); 
        Toastr::success('you have successfully taken leave, wait for approval', 'success');
        return redirect()->route('leave.list');
    }  

    public function destroy(Request $request)
    {
        //
    }


  public function status($status, $id) {
     $model=Leave::find($id);
     $model->status=$status;
     $model->save();
     return redirect()->route('leave.list');
     Toastr::success('Employee status has changed successfully', 'Status');
  }


}
