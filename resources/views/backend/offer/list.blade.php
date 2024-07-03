@extends('layouts.app')
@section('title', 'Lead Offer')

@section('content')  

<div class="content-wrapper">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <div class="container-xxl flex-grow-1 container-p-y">
      
        <div class="card">
            <div class="card-header border-bottom">    

            <div class="float-end">
                <a class="btn btn-primary" href="{{ route('lead_offer.add') }}"><i class="fa fa-plus"></i>Add
                Lead Offer</a>
            </div>
        
            </div>
            <div class="card-datatable table-responsive">
                <table class="table" width="100%" cellspacing="0"  id="user_table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th width="40%">Offer Type</th>
                            <th width="40%">Amount</th>
                            <th width="20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($leadOffers as $leadOffer)
                              <tr>
                              <td>{{$loop->iteration}}</td>
                                @if ($leadOffer->type==1)
                                <td>Basic</td>
                                @elseif ($leadOffer->type==2)
                                <td>Combo</td>
                                @elseif ($leadOffer->type==3)
                                <td>Premium</td>
                                @endif
                            
                              <td>{{$leadOffer->amount}}</td>
                              <td>
                                <a href="{{route('lead_offer.add')}}/{{ $leadOffer->id }}"><Button class="btn btn-primary btn-sm">Edit</Button></a>
                                @if ($leadOffer->status==1)
                                <a href="{{url('lead_offer/status/0')}}/{{ $leadOffer->id }}"><Button class="btn btn-primary btn-sm">Active</Button></a>
                                 @elseif ($leadOffer->status==0)
                              <a href="{{url('lead_offer/status/1')}}/{{ $leadOffer->id }}"><Button class="btn btn-danger btn-sm">Deactive</Button></a>
                              @endif 
                              </td> 
                            
                          </tr>
                        @endforeach
                        @include('layouts.table-footer', ['linkData' => $leadOffers])
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>
</div>

@endsection