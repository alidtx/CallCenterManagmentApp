<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeaveRequest;
use App\Models\Attendance;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        
        $pendingLeaveApplications = DB::table('attendances as a')
        ->leftJoin('employees as e', 'e.id', '=', 'a.employee_id')
        ->select('a.login_date', 
                 'a.login_time', 
                 'a.login_status', 
                 'a.reason_late_in', 
                 'e.name', 
                 'a.user_id', 
                 'a.created_at',
                 DB::raw('DATE(a.login_date) as login_date')
        )
        ->where('a.user_id', auth::user()->id)
        ->whereMonth('a.login_date', Carbon::now()->month)
        ->get();

        $totalAttendance=[];

        foreach ( $pendingLeaveApplications as $val)  {
            $totalAttendance[]=$val->login_date;
        }
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();
        dd($endDate);
        return view('backend.leave.pending_application');

    }
    
    public function create($id = '')

    {   
    $userData = User::find(auth::user()->id);
    if ($userData->user_type == 'admin') {
        $employees = Employee::all();
        $designations = Designation::all();
        $departments = Department::all();
        $data = [
            'employees' => $employees,
            'designations' => $designations,
            'departments' => $departments,
        ];
    } else {
        $employee = Employee::where('user_id', Auth::user()->id)->first();
        $designation = Designation::where('id', $employee->designation_id)->first();
        $department = Department::where('id', $employee->department_id)->first();
        $data = [
            'employee' => $employee,
            'designation' => $designation,
            'department' => $department,
        ];
    }
    return view('backend.leave.add', $data);
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
        Toastr::success('you have successfully taken leave, wait for approval', 'Pending');
        return redirect()->route('leave.list');
    }  

    public function destroy(Request $request)
    {
        //
    }

  public function status($status, $id) 
   {
     $model=Leave::find($id);
     $model->status=$status;
     $model->save();
     return redirect()->route('leave.list');
     Toastr::success('Employee status has changed successfully', 'Status');
   }


}
