@extends('layouts.app')
@section('title', 'Employee Salary')

@section('content')  

<div class="content-wrapper"> 
    
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

    <div class="container-xxl flex-grow-1 container-p-y">
        
        <div class="card">
            <div class="float-start">
                <button class="btn btn-primary" onclick="downloadTableAsImage('<?php echo $employee_salaries->emp_name;?>','<?php echo $employee_salaries->employeeUniqueId;?>')">Download</button>
            </div>
                
                <table class="table" width="100%" cellspacing="0"  id="salary_table">
                    <tbody>
                        <tr>
                            <td><strong>Employee Name</strong></td>
                            <td>
                                    {{ $employee_salaries->emp_name }}
                          
                             </td>
                        </tr>
                        <tr>
                            <td><strong>Employee Basic Salary</strong></td>
                            <td>
                                    {{ $employee_salaries->salary_amount }} TK
                          
                             </td>
                        </tr>
                       
                        <tr>
                            <td><strong>Monthly Transportation Bill</strong></td>
                            <td>{{ $employee_salaries->salary_transport }} TK </td>
                        </tr> 

                        <tr>
                            <td><strong>Monthly Employee Food Bills</strong></td>
                            <td>{{ $employee_salaries->salary_food }} TK</td>
                        </tr> 

                        <tr>
                            <td><strong>Monthly Residence Bills</strong></td>
                            <td>{{ $employee_salaries->salary_residence }} TK</td>
                        </tr>
                        <tr>
                            <td><strong>This Monthly Leads</strong></td>
                            <td>{{ $employee_salaries->lead_count  }} Lead Sold</td>
                        </tr>
                        <tr>
                            <td><strong>Per Lead</strong></td>
                            <td>{{$perLeadRate->amount  }} TK</td>
                        </tr>

                        <tr>
                            <td><strong>Late Count</strong></td>
                              @php  
                                    $dailySalary = $employee_salaries->salary_amount / 22;
                                    $deductionPeriods = intdiv($employee_salaries->late_days, 3);
                                    $deductedAmount = $dailySalary * $deductionPeriods; 
                              @endphp
                            <td>{{ $deductionPeriods  }} Days</td>
                        </tr>

                        <tr>
                            <td><strong>Late Deducted Amount</strong></td>
                            <td>{{ floor($deductedAmount) }} Tk</td>
                        </tr>

                        <tr>
                            <td><strong>Total Payable for lead for this Month</strong></td>
                            <td>{{$employee_salaries->lead_count *  $perLeadRate->amount}} TK</td>
                        </tr>

                        <tr>
                            <td><strong>Total Payable Bills</strong></td>
                                  <td>
                                    {{
                                        $employee_salaries->salary_amount
                                        +$employee_salaries->salary_transport
                                        +$employee_salaries->salary_food
                                        +$employee_salaries->salary_residence 
                                        +($employee_salaries->lead_count * $perLeadRate->amount)
                                      }} 
                                Tk </td>
                           </tr>  
                    </tbody>
                </table>
          
        </div>
    </div>
</div>
</div>

<script> 
    function downloadTableAsImage(name, empId) {  
    html2canvas(document.getElementById("salary_table"), {
        onrendered: function(canvas) {
            var img = canvas.toDataURL("image/jpeg");
            var link = document.createElement('a');
            link.href = img;
            link.download = name+"("+empId+")"+'.jpg';
            link.click();
        }
    });
}

</script>



@endsection