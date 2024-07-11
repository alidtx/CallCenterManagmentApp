<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalaryRequest;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\PerLead;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class SalaryController extends Controller
{

    public function index()
    {
    
     $data['salaries']=DB::table('salaries as s')
     ->join('employees as e', 's.employee_id', '=', 'e.id')
     ->join('designations as d', 's.designation_id', '=', 'd.id')
     ->join('departments as dpt', 's.department_id', '=', 'dpt.id')
     ->select('s.status','s.id','e.name as employee_name', 'd.name as designation_name', 'dpt.name as department_name', 's.amount', 's.transportation', 's.food', 's.residance')
     ->get();
     return view('backend.salary.list', $data);
    }

    public function view($id) {
        $lead = Salary::with('user_name')->find($id);
        return view('backend.salary.add', compact('lead'));
    }
     
    public function MonthlySalary() 
    {
     
     $data['perLeadRate']=DB::table('per_leads')
     ->select('amount')
     ->first();
     $data['leadOffer']=DB::table('lead_offers')
      ->select('type', 'amount','status')
      ->where('status', '1')
      ->first(); 
      //  dd($data['leadOffer']->status);
     $data['employee_salaries'] = DB::table('salaries as s')
     ->whereMonth('l.created_at', Carbon::now()->month)
     ->select(
         's.id as salary_id',
         's.amount as salary_amount',
         's.transportation as salary_transport',
         's.food as salary_food',
         's.residance as salary_residence', 
         's.employee_id as employee_id',
         'e.name as emp_name',
         'e.employeeUniqueId as employeeUniqueId',
         'l.first_name as first_name',
         'l.employee_id as lemployee_id',
         'd.name as designation_name',
         'dpmt.name as department_name',
         DB::raw('count(l.id) as lead_count'),
         'attn.employee_id',
         DB::raw("SUM(CASE WHEN attn.login_status = 'late' THEN 1 ELSE 0 END) AS late_days"),
         DB::raw("SUM(CASE WHEN attn.login_status = 'normal' THEN 1 ELSE 0 END) AS normal_days")
     )
     ->join('employees as e', 'e.id', '=', 's.employee_id')
     ->join('leads as l', 'l.employee_id', '=', 'e.id')
     ->join('designations as d', 'd.id', '=', 's.designation_id')
     ->join('departments as dpmt', 'dpmt.id', '=', 's.department_id')
     ->join('attendances as attn', 'e.id', '=', 'attn.employee_id')
     ->groupBy('s.employee_id', 'attn.employee_id')
     ->get(); 
    //  dd($data['employee_salaries']);
     return view('backend.salary.monthly_salary',  $data);
    }


   public function viewPayableSalary($id) 
   {
    $data['perLeadRate']=DB::table('per_leads')
    ->select('amount')
    ->first(); 
    $data['leadOffer']=DB::table('lead_offers')
     ->where('status', 1)
     ->select('type','amount', 'status')
     ->first();
     $data['employee_salaries'] = DB::table('salaries as s')
     ->whereMonth('l.created_at', Carbon::now()->month)
     ->where('s.id', $id)
     ->select(
         's.id as salary_id',
         's.amount as salary_amount',
         's.transportation as salary_transport',
         's.food as salary_food',
         's.residance as salary_residence', 
         's.employee_id as employee_id',
         'e.name as emp_name',
         'e.employeeUniqueId as employeeUniqueId',
         'l.first_name as first_name',
         'l.employee_id as lemployee_id',
         'd.name as designation_name',
         'dpmt.name as department_name',
         DB::raw('count(l.id) as lead_count'),
         'attn.employee_id',
         DB::raw("SUM(CASE WHEN attn.login_status = 'late' THEN 1 ELSE 0 END) AS late_days"),
         DB::raw("SUM(CASE WHEN attn.login_status = 'normal' THEN 1 ELSE 0 END) AS normal_days")
     )
     ->join('employees as e', 'e.id', '=', 's.employee_id')
     ->join('leads as l', 'l.employee_id', '=', 'e.id')
     ->join('designations as d', 'd.id', '=', 's.designation_id')
     ->join('departments as dpmt', 'dpmt.id', '=', 's.department_id')
     ->join('attendances as attn', 'e.id', '=', 'attn.employee_id')
     ->groupBy('s.employee_id', 'attn.employee_id')
     ->first();
    // dd( $data['employee_salaries']);
    return view('backend.salary.total_paybale_salary', $data);
   }


    public function create($id='') 
    {      
      $result['employees']=Employee::get();  
      $result['designations']=Designation::get();  
      $result['departments']=Department::get();  
        
      if ($id>0)  {
        $salaryArr=Salary::where('id', $id)->get(); 
        $result['amount']=$salaryArr[0]->amount;
        $result['transportation']=$salaryArr[0]->transportation; 
        $result['food']=$salaryArr[0]->food; 
        $result['residance']=$salaryArr[0]->residance; 
        $result['employee_id']=$salaryArr[0]->employee_id;
        $result['designation_id']=$salaryArr[0]->designation_id;
        $result['department_id']=$salaryArr[0]->department_id;
        $result['id']=$id;
      } else{
        $result['amount']='';
        $result['transportation']=''; 
        $result['food']=''; 
        $result['residance']=''; 
        $result['employee_id']='';
        $result['designation_id']='';
        $result['department_id']='';
        $result['id']='';
      }
    return view('backend.salary.add', $result);
    }
 
    public function store(SalaryRequest $request)
    {     

     if($request->id>0) {
          $model=Salary::find($request->id);
          Toastr::success('Salary edited successfully', 'edited');
    }else{
        $model=New Salary();
        Toastr::success('Salary edited successfully', 'Created');
    }

    $model->amount=$request->amount;
    $model->transportation=$request->transportation; 
    $model->food=$request->food; 
    $model->residance=$request->residance; 
    $model->employee_id=$request->employee_id;
    $model->designation_id=$request->designation_id;
    $model->department_id=$request->department_id;
    $model->save();
    return redirect()->route('salary.list');
 }

  public function status($status, $id) {
     $model=Salary::find($id);
     $model->status=$status;
     $model->save();
     return redirect()->route('salary.list');
     Toastr::success('salary status has changed successfully', 'Status');
  }

  
}
