@extends('master')
@section('content') 
@if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
<form action="{{route('update.product',$edit_product->id)}}" method="post" role="form" enctype="multipart/form-data">
  <h3>Product Update</h3>
         @csrf 
        <div class="form-group">    
           <label for="name">Product_Name:</label>
          <input class="form-control" id="name" type="text" name="product_name" value="{{$edit_product->product_name}}" required />
        </div>
        <div class="form-group">    
           <label for="name">Product_Type:</label>
           <select class="form-control" id="category"  name="type" required />
                <option value="regular">Regular</option>
                <option value="customize">Customize</option>
            </select>
        </div>
        <div class="form-group">    
           <label for="name">Product_Image:</label>
          <input class="form-control" id="name" type="file" name="product_image" value="{{$edit_product->product_image}}" required />
        </div>
         <div class="form-group">    
           <label for="name">Flavour:</label>
          <input class="form-control" id="name" type="text" name="flavour" value="{{$edit_product->flavour}}" required />
        </div>
         <div class="form-group">    
           <label for="name">Product_Weight:</label>
          <input class="form-control" id="name" type="text" name="weight" value="{{$edit_product->weight}}" required />
        </div>
       <div class="form-group">
          <label for="price">Price:</label>
          <input class="form-control" id="price" type="decimal" name="price" value="{{$edit_product->price}}" required />
        </div>
        <div class="form-group">
           <label for="category">Select Category:</label>
            <select class="form-control" id="category"  name="category_id" required />
              
              @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                 @endforeach
            </select>
          </div>
          <div class="form-group">
           <label for="category">Status:</label>
            <select class="form-control" id="category"  name="status" required />

                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
             
            </select>
          </div>
      <div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{route('product')}}" class="btn btn-Info">Back</a>
      </div>
    </form>
    </div>
  </div>
</div>
@stop