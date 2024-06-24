@extends('layouts.app')
@section('title', 'Users')

@section('content')  

<div class="content-wrapper">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <div class="container-xxl flex-grow-1 container-p-y">
      
        <div class="card">
            <div class="card-header border-bottom">
                <div class="float-end">
                    <a class="btn btn-primary" href="{{ route('designation.add') }}"><i class="fa fa-plus"></i>Add
                        Designation</a>
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
                        @foreach ($designations as $designation)
                              <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$designation->name}}</td>
                              <td>
                                <a href="{{route('designation.add')}}/{{ $designation->id }}"><Button class="btn btn-primary btn-sm">Edit</Button></a>
                                @if ($designation->status==1)
                                <a href="{{url('designation/status/0')}}/{{ $designation->id }}"><Button class="btn btn-primary btn-sm">Active</Button></a>
                                 @elseif ($designation->status==0)
                              <a href="{{url('designation/status/1')}}/{{ $designation->id }}"><Button class="btn btn-danger btn-sm">Deactive</Button></a>
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