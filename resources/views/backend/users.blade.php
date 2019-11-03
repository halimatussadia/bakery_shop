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


 <h1>Customer Details</h1>

                    <div class="table-responsive">
                    <table id="Table" class="table table-striped table-bordered" >
                      <thead>
                       <tr>
                        <th>Serial</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>District</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                        <th>Action</th>
                      </tr>

                      </thead>
                      <tbody>

                        @foreach($all_users as $key=>$data)

                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$data->name}}</td>
                          <td>{{$data->email}}</td>
                          <td>{{$data->district}}</td>
                          <td>{{$data->address}}</td>
                          <td>{{$data->number}}</td>
                          <td>
                            <a href="{{route('delete.user',$data->id)}}" class="btn btn-danger">Delete</a>

                            <a href="{{route('edit.user',$data->id)}}" class="btn btn-info">Edit</a>
                            </td>
                        </tr>

                    @endforeach
                      </tbody>
                    </table>
                  </div>
                  </div>
                </div>
              </div>
@stop
@section('script')
<script>
 $(document).ready(function() {
    $('#Table').DataTable();
} );
</script>
@endsection

