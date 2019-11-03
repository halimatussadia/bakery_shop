@extends('master')
@section('content')
    <style>
        h1{
            text-align: center;
        }

    </style>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
    @endif


    <h1>payment Details</h1>

    <div class="table-responsive">
        <table id="Table" class="table table-striped table-bordered" >
            <thead>
            <tr>
                <th>Serial</th>
                <th>Transaction_Id</th>
                <th>Payment Type</th>
                <th>Pay Amount</th>
            </tr>

            </thead>
            <tbody>
            @foreach($payments as $key=>$payment)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$payment->transaction_id}}</td>
                    <td>{{$payment->payment}}</td>
                    <td>{{$payment->pay_amount}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@stop
@section('script')
    <script>
        $(document).ready(function() {
            $('#Table').DataTable();
        } );
    </script>
@endsection

