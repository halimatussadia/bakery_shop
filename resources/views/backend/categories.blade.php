@extends('master')
@section('content') 
<style>
h1{
  text-align: center;
};

</style>

@if(session()->has('message'))
<div class="alert alert-success">
  {{ session()->get('message') }}
</div>
@endif


@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </ul>
</div>

@endif

<h1>Category Details</h1>               <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add New
</button></br></br>           
<div class="table-responsive">
  <table id="category" class="table table-striped table-bordered">
    <thead>  
     <tr>
      <th>Serial</th>
      <th>Name</th>
      <th>Description</th>
      <th>Image</th>
      <th>Status</th>
      <th>Actiont</th>
    </tr>                                                   
    
  </thead>
  <tbody>
    @foreach($all_categories as $key=>$data)
    <tr>
      <td>{{$key+1}}</td>
      <td>{{$data->name}}</td>
      <td>{{$data->description}}</td>
      <td><img src="{{url('/category_image/'.$data->image)}}" style="height: 80px;width: 80px;"></td>
      <td>
        @if(($data->status)=='active')
          <button type="button" class="btn btn-success">Active</button>
          @else<button type="button" class="btn btn-warning">Inactive</button>
          @endif
      </td>

      <td> 
        <a href="{{route('edit.category',$data->id)}}" class="btn btn-info">Edit</a>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('categoryform')}}" method="post" role="form" enctype="multipart/form-data">
          
          @csrf
          <div class="form-group">
           <label for="name">Name:</label>
           <input class="form-control" id="name" type="text" name="name" required />
         </div>
         <div class="form-group">
          <label for="description">Description:</label>
          <input class="form-control" id="description" type="text" name="description" required /></div>
          <div class="form-group">
            <label for="price">Image:</label>
            <input class="form-control" id="price" type="file" name="image" required />
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @stop

@section('script')

<script>
 $(document).ready(function() {
    $('#category').DataTable();
} );
</script>
@endsection
