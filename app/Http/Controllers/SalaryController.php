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
     $data['salaries']=Salary::with('employee', 'designation','department')->get();  
      // dd($data['salaries']);
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
     $data['employee_salaries'] = DB::table('salaries as s')
    ->where('s.status', 1)
    ->whereMonth('uewl.created_at', Carbon::now()->month)
    ->join('user_emp_wise_leads as uewl', 's.employee_id', '=', 'uewl.employee_id')
    ->join('employees as e', 'e.id', '=', 'uewl.employee_id')
    ->select(
        's.employee_id',
        's.id',
        's.status',
        's.amount as employee_salary',
        's.transportation as employee_transport',
        's.food as employee_food',
        's.residance as residance',
        'uewl.created_at as date',
        'e.name as employee_name',
        'e.employeeUniqueId as employee_uid',

        DB::raw('count(uewl.lead_id) as lead_count')
    )
    ->groupBy('s.employee_id', 's.amount', 's.transportation', 's.food', 's.residance', 'e.name', 'e.employeeUniqueId')
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
    $data['employee_salary'] = DB::table('salaries as s')
    ->where('s.status', 1)
    ->where('s.id', $id)
    ->whereMonth('uewl.created_at', Carbon::now()->month)
    ->join('user_emp_wise_leads as uewl', 's.employee_id', '=', 'uewl.employee_id')
    ->join('employees as e', 'e.id', '=', 'uewl.employee_id')
    ->select(
        's.employee_id',
        's.id',
        's.status',
        's.amount as employee_salary',
        's.transportation as employee_transport',
        's.food as employee_food',
        's.residance as residance',
        'uewl.created_at as date',
        'e.name as employee_name',
        'e.employeeUniqueId as employee_uid',
        DB::raw('count(uewl.lead_id) as lead_count')
    )
    ->groupBy('s.employee_id', 's.amount', 's.transportation', 's.food', 's.residance', 'e.name', 'e.employeeUniqueId')
    ->first();  
    // dd( $data['employee_salary']);
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
