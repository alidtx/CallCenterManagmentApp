@extends('layouts.app')
@section('title', 'Users')

@section('content')  

<div class="content-wrapper">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <div class="container-xxl flex-grow-1 container-p-y">
      
        <div class="card">
            <div class="card-header border-bottom">
                <div class="float-end">
                    <a class="btn btn-primary" href="{{ route('employee.add') }}"><i class="fa fa-plus"></i>Add
                        New</a>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table class="table" width="100%" cellspacing="0"  id="user_table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th width="20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($employees as $employee)
                              <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$employee->name}}</td>
                              <td>
                                <a href="{{route('employee.add')}}/{{ $employee->id }}"><Button class="btn btn-primary btn-sm">Edit</Button></a>
                                @if ($employee->status==1)
                                <a href="{{url('employee/status/0')}}/{{ $employee->id }}"><Button class="btn btn-primary btn-sm">Active</Button></a>
                                 @elseif ($employee->status==0)
                              <a href="{{url('employee/status/1')}}/{{ $employee->id }}"><Button class="btn btn-danger btn-sm">Deactive</Button></a>
                              </td> 
                            @endif 
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

@endsection