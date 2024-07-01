@extends('layouts.app')
@section('title', 'Employee Salary')

@section('content')  

<div class="content-wrapper">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
        
                <table class="table" width="100%" cellspacing="0"  id="user_table">
                    <tbody>
                        <tr>
                            <td><strong>Employee Name</strong></td>
                            <td>
                                    {{ $employee_salary->employee_name }}
                          
                             </td>
                        </tr>
                        <tr>
                            <td><strong>Employee Basic Salary</strong></td>
                            <td>
                                    {{ $employee_salary->employee_salary }} TK
                          
                             </td>
                        </tr>
                       
                        <tr>
                            <td><strong>Monthly Transportation Bill</strong></td>
                            <td>{{ $employee_salary->employee_transport }} TK </td>
                        </tr> 

                        <tr>
                            <td><strong>Monthly Employee Food Bills</strong></td>
                            <td>{{ $employee_salary->employee_food }} TK</td>
                        </tr> 

                        <tr>
                            <td><strong>Monthly Residence Bills</strong></td>
                            <td>{{ $employee_salary->residance }} TK</td>
                        </tr>
                        <tr>
                            <td><strong>This Monthly Leads</strong></td>
                            <td>{{ $employee_salary->lead_count  }} Lead Sold</td>
                        </tr>
                        <tr>
                            <td><strong>Per Lead</strong></td>
                            <td>{{$perLeadRate->amount  }} TK</td>
                        </tr>

                        <tr>
                            <td><strong>Total Payable for lead for this Month</strong></td>
                            <td>{{$employee_salary->lead_count *  $perLeadRate->amount}} TK</td>
                        </tr>

                        <tr>
                            <td><strong>Total Payable Bills</strong></td>
                                  <td>
                                    {{
                                      $employee_salary->employee_salary
                                      +$employee_salary->employee_transport
                                      +$employee_salary->employee_food
                                      +$employee_salary->residance 
                                      +($employee_salary->lead_count * $perLeadRate->amount)
                                    }} 
                                Tk </td>
                           </tr>  
                    </tbody>
                </table>
          
        </div>
    </div>
</div>
</div>




@endsection