@extends('layouts.app')
@section('title', 'Department')

@section('content')  

<div class="content-wrapper">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <div class="container-xxl flex-grow-1 container-p-y">
      
        <div class="card">
            <div class="card-header border-bottom">
                <div class="float-end">
                    <a class="btn btn-primary" href="{{ route('salary.add') }}"><i class="fa fa-plus"></i>Add
                        Salary</a>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table class="table" width="100%" cellspacing="0"  id="user_table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                        
                            <th >Name</th>
                            <th>Designation</th>
                            <th >Department</th>
                            <th>Salary</th>
                            <th >Transporation</th>
                            <th>Food</th>
                            <th >Residance</th>
                            <th width="30%">Actions</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @if (isset($salaries))
                        @foreach ($salaries as $salary)
                              <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$salary->employee_name}}</td>
                              <td>{{$salary->designation_name}}</td>
                              <td>{{$salary->department_name}}</td>
                              <td>{{$salary->amount}}</td>
                              <td>{{$salary->transportation}}</td>
                              <td>{{$salary->food}}</td>
                              <td>{{$salary->residance}}</td>
                              <td>
                                <a href="{{route('salary.add')}}/{{ $salary->id }}"><Button class="btn btn-primary btn-sm">Edit</Button></a>
                                @if ($salary->status==1)
                                <a href="{{url('salary/status/0')}}/{{ $salary->id }}"><Button class="btn btn-primary btn-sm">Active</Button></a>
                                 @elseif ($salary->status==0)
                              <a href="{{url('salary/status/1')}}/{{ $salary->id }}"><Button class="btn btn-danger btn-sm">Deactive</Button></a>
                              </td> 
                            @endif 
                          </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

@endsection