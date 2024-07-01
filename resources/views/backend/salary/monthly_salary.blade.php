@extends('layouts.app')
@section('title', 'Employee Salary')

@section('content')  

<div class="content-wrapper">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <div class="container-xxl flex-grow-1 container-p-y">
      
        <div class="card">
            <div class="card-header border-bottom">
                <div class="float-start">
                        <form action="">
                                <input type="text" id="searchInput" name='search' class="form-control" placeholder="Search with Employee ID">
                        </form>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table class="table" width="100%" cellspacing="0"  id="myTable">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Employee Uid</th>
                            <th>Name</th>
                            <th>Basic Salary</th>
                            <th >Total Withdrawable </th>
                            <th width="17%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($employee_salaries as $employee_salary)
                         <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$employee_salary->employee_uid }}</td>
                            <td>{{$employee_salary->employee_name }}</td>
                            <td>{{$employee_salary->employee_salary }} TK</td>
                           
                              <td>
                                {{
                                  $employee_salary->employee_salary
                                  +$employee_salary->employee_transport
                                  +$employee_salary->employee_food
                                  +$employee_salary->residance 
                                  +($employee_salary->lead_count * $perLeadRate->amount)
                                }} 
                            Tk </td>
                           <td>   
                            <a href="{{route('salary.view_payable_salary',$employee_salary->id)}}"><Button class="btn btn-primary btn-sm">View</Button></a>
                          </td> 
                         </tr> 
                         @endforeach  
                          
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tbody tr").filter(function() {
                $(this).toggle($(this).find('td:first').text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>


@endsection