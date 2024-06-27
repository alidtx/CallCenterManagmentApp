@extends('layouts.app')
@section('title', 'Lead')

@section('content')  

<div class="content-wrapper">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
        
                <table class="table" width="100%" cellspacing="0"  id="user_table">
                    <tbody>
                        <tr>
                            <td><strong>Sold By</strong></td>
                            <td>
                                @foreach ($lead->employees as $employee)
                                    {{ $employee->name }}@if (!$loop->last), @endif
                                @endforeach
                             </td>
                        </tr>
                       
                        <tr>
                            <td><strong>Business Owner Name</strong></td>
                            <td>{{ $lead->first_name }} {{ $lead->last_name }}</td>
                        </tr> 

                        <tr>
                            <td><strong>Email</strong></td>
                            <td>{{ $lead->email }}</td>
                        </tr> 

                        <tr>
                            <td><strong>Business Name</strong></td>
                            <td>{{ $lead->business_name }}</td>
                        </tr>


                        <tr>
                            <td><strong>Looking Amount</strong></td>
                            <td>{{ $lead->looking_amount }}</td>
                        </tr>

                        <tr>
                            <td><strong>Credit score</strong></td>
                            <td>{{ $lead->credit_score }}</td>
                        </tr>

                        <tr>
                            <td><strong>Phone</strong></td>
                            <td>{{ $lead->phone }}</td>
                        </tr>

                        <tr>
                            <td><strong>Campaign</strong></td>
                            <td>
                                @foreach ($lead->campaigns as $campaign)
                                    {{ $campaign->name }}@if (!$loop->last), @endif
                                @endforeach
                             </td>
                        </tr>
                    </tbody>
                </table>
          
        </div>
    </div>
</div>
</div>

@endsection