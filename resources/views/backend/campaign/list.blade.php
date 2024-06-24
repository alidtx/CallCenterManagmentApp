@extends('layouts.app')
@section('title', 'Campaign')

@section('content')  

<div class="content-wrapper">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <div class="container-xxl flex-grow-1 container-p-y">
      
        <div class="card">
            <div class="card-header border-bottom">
                <div class="float-end">
                    <a class="btn btn-primary" href="{{ route('campaign.add') }}"><i class="fa fa-plus"></i>Add
                        Campaign</a>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table class="table" width="100%" cellspacing="0"  id="user_table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th width="80%">Name</th>
                            <th width="20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($campaigns as $campaign)
                              <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$campaign->name}}</td>
                              <td>
                                <a href="{{route('campaign.add')}}/{{ $campaign->id }}"><Button class="btn btn-primary btn-sm">Edit</Button></a>
                                @if ($campaign->status==1)
                                <a href="{{url('campaign/status/0')}}/{{ $campaign->id }}"><Button class="btn btn-primary btn-sm">Active</Button></a>
                                 @elseif ($campaign->status==0)
                              <a href="{{url('campaign/status/1')}}/{{ $campaign->id }}"><Button class="btn btn-danger btn-sm">Deactive</Button></a>
                              </td> 
                            @endif 
                          </tr>
                        @endforeach
                        @include('layouts.table-footer', ['linkData' => $campaigns])
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>
</div>

@endsection