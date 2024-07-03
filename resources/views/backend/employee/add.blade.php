@extends('layouts.app')
@section('title', 'Employee')

@section('content')  

<div class="content-wrapper">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6"> 
                       
                        <h5 class="card-title mb-3">Add Employee</h5>
                    </div>
                 
                </div>
                @include('backend.employee.form')
            </div>
        </div>
  
    </div>
</div>
</div>

@endsection