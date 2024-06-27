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
                            <th>Sold By</th>
                            <th>Business owner</th>
                            <th>Looking Amount</th>
                            <th>Phone</th>
                            <th width="7%">Credit</th>
                            <th>Submmision Date</th>
                            <th width="5%">Actions</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($leads as $lead)
                              <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>
                                @foreach ($lead->employees as $employee)
                                    {{ $employee->name }}@if (!$loop->last), @endif
                                @endforeach
                             </td>
                              <td>{{$lead->first_name}} {{$lead->last_name}} </td>
                              <td>{{$lead->looking_amount}}</td>
                              <td>{{$lead->phone}}</td>
                              <td>{{$lead->credit_score}}</td>
                              <td>{{$lead->created_at}}</td>
                              <td>
                                <a href="{{route('lead.view',$lead->id)}}"><Button class="btn btn-primary btn-sm">View</Button></a>
                              </td>
                          </tr>
                        @endforeach
                        @include('layouts.table-footer', ['linkData' => $leads])
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

@endsection