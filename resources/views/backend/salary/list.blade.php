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
                        
                            <th>Employee Name</th>
                            <th>Designation</th>
                            <th>Department</th>
                            <th>Basic Salary</th>
                            <th width="20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @if (isset($salaries))
                        @foreach ($salaries as $salary)
                              <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$salary->employee->name}}</td>
                              <td>{{$salary->designation->name}}</td>
                              <td>{{$salary->department->name}}</td>
                              <td>{{$salary->amount}}</td>
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