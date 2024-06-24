@extends('layouts.app')
@section('title', 'Lead')

@section('content')  

<div class="content-wrapper">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <div class="container-xxl flex-grow-1 container-p-y">
      
        <div class="card">
            <div class="card-datatable table-responsive">
                <table class="table" width="100%" cellspacing="0"  id="user_table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>business Name</th>
                            <th>Credit Score</th>
                            <th width="10%">Actions</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($leads as $lead)
                              <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$lead->first_name}} {{$lead->last_name}} </td>
                              <td>{{$lead->email}}</td>
                              <td>{{$lead->business_name}}</td>
                              <td>{{$lead->credit_score}}</td>
                              <td>
                                <a href="{{route('lead.view',  $lead->id)}}"><Button class="btn btn-primary btn-sm">View</Button></a>
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

@endsection