@extends('master')
@section('content')
      <style>
  h1{
    text-align: center;
  }

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

 <h1>Products Details</h1>               <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add New
</button><br><br>
 <div class="table-responsive">
                    <table id="order" class="table table-striped table-bordered">
                      <thead>
                       <tr>
                        <th>Serial</th>
                        <th>Category_Name</th>
                        <th>Product_Name</th>
                        <th>Product_Type</th>
                        <th>Product_image</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>

                      </thead>
                      <tbody>
                       @foreach($all_products as $key=>$data)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$data->category->name}}</td>
                          <td>{{$data->product_name}}</td>
                          <td>{{$data->type}}</td>
                          <td><img src="{{url('/product_image/'.$data->product_image)}}" style="height: 80px;width: 80px;"></td>

                          <td>{{$data->price}}</td>
                          <td>
                            @if(($data->status)=='active')
                            <button type="button" class="btn btn-success">Active</button>
                            @else<button type="button" class="btn btn-warning">Inactive</button>
                            @endif
                          </td>
                          <td>
                            <a href="{{route('edit.product',$data->id)}}" class="btn btn-info">Edit</a>
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
        <h5 class="modal-title" id="exampleModalLabel"> Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('productform')}}" method="post" role="form" enctype="multipart/form-data">
         @csrf
        <div class="form-group">
           <label for="name">Product_Name:</label>
          <input class="form-control" id="name" type="text" name="product_name" required />
        </div>
        <div class="form-group">
           <label for="name">Product_Type:</label>
           <select class="form-control" id="category"  name="type" required >
                <option value="regular">Regular</option>
                <option value="customize">Customize</option>
            </select>
        </div>
        <div class="form-group">
           <label for="name">Product_Image:</label>
          <input class="form-control" id="name" type="file" name="product_image" required />
        </div>
         <div class="form-group">
           <label for="name">Flavour:</label>
          <input class="form-control" id="name" type="text" name="flavour" />
        </div>
         <div class="form-group">
           <label for="name">Product_Weight:</label>
          <input class="form-control" id="name" type="text" name="weight" required />
        </div>
       <div class="form-group">
          <label for="price">Price:</label>
          <input class="form-control" id="price" type="decimal" name="price" required />
        </div>
        <div class="form-group">
           <label for="category">Select Category:</label>
            <select class="form-control" id="category"  name="category_id" required >

              @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                 @endforeach
            </select>
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
    $('#order').DataTable();
} );
</script>
@endsection

