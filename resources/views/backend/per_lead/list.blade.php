@extends('layouts.app')
@section('title', 'Per Lead Price')

@section('content')  

<div class="content-wrapper">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <div class="container-xxl flex-grow-1 container-p-y">
      
        <div class="card">
            <div class="card-header border-bottom">    
                 @if (count($perleads)==0)
                 <div class="float-end">
                    <a class="btn btn-primary" href="{{ route('per_lead.add') }}"><i class="fa fa-plus"></i>Add
                      Per Lead Price</a>
                    </div>
                  @else
                  <div class="float-end"> 
                  </div>
                 @endif
                
            </div>
            <div class="card-datatable table-responsive">
                <table class="table" width="100%" cellspacing="0"  id="user_table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th width="90%">Amount</th>
                            <th width="10%">Actions</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($perleads as $perlead)
                              <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$perlead->amount}}</td>
                              
                              <td>
                                <a href="{{route('per_lead.add')}}/{{ $perlead->id }}"><Button class="btn btn-primary btn-sm">Edit</Button></a>
                              </td> 
                            
                          </tr>
                        @endforeach
                        @include('layouts.table-footer', ['linkData' => $perleads])
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>
</div>

@endsection