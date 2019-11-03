@extends('master')
@section('content')
<style>
h1{
  text-align: center;
};

</style>

<h1>Orders Info </h1>
<div class="table-responsive">
  <table id="orderTable" class="table table-striped display table-bordered">
    <thead>
     <tr>
      <th>Serial</th>
      <th>Customer Name</th>
      <th>Total_Price</th>
      <th>Date</th>
      <th>Time</th>
      <th>Payment</th>
      <th>Delivery</th>
      <th>Status</th>
      <th>Actiont</th>
    </tr>

  </thead>
  <tbody>

    @foreach($all_orders as $key=>$data)
    <tr>
      <td>{{$key+1}}</td>
      <td>{{$data->user->name}}</td>
      <td>{{$data->total}}</td>
      <td>{{$data->date}}</td>
      <td>{{$data->time}}</td>
      <td>
         <a href="{{route('payments',$data->id)}}" class="btn btn-primary">{{$data->payment}}</a>
      </td>
      <td>{{$data->delivery}}</td>
      <td>
        @if($data->is_completed)
        <button type="button" class="btn btn-success">completed</button>
        @else
        <button type="button" class="btn btn-warning">pending</button>
        @endif
        @if($data->paid)
        <button type="button" class="btn btn-success">paid</button>
        @else<button type="button" class="btn btn-warning">unpaid</button>
        @endif
      </td>

      <td>
        <a href="{{route('delete.order',$data->id)}}" class="btn btn-danger">Delete</a>
        <a href="{{route('detail',$data->id)}}" class="btn btn-primary">view</a>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
</div>


@endsection

@section('script')

<script>
 $(document).ready(function() {
    $('#orderTable').DataTable();
} );
</script>
@endsection

