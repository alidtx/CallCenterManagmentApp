@extends('layouts.app')
@section('title', 'Lead')

@section('content')  

<div class="content-wrapper">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="float-start">
                <button class="btn btn-primary" onclick="downloadTableAsImage()">Download</button>
            </div>
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

<script> 
    function downloadTableAsImage() {  
    html2canvas(document.getElementById("user_table"), {
        onrendered: function(canvas) {
            var img = canvas.toDataURL("image/jpeg");
            var link = document.createElement('a');
            link.href = img;
            link.download ='lead.jpg';
            link.click();
        }
    });
}

</script>


@endsection