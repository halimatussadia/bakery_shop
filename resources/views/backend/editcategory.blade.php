 @extends('master')
@section('content')

 @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
        <h3>Update Category:</h3>
        <form action="{{route('update.category',$edit->id)}}" method="post" role="form" enctype="multipart/form-data">
          @csrf
         <div class="form-group">
           <label for="name">Name:</label>
          <input class="form-control" id="name" type="text" name="name" value="{{$edit->name}}" required />
        </div>
        <div class="form-group">
          <label for="description">Description:</label>
         <input class="form-control" id="description" type="text" name="description" value="{{$edit->description}}" required /></div>
         <div class="form-group">
          <label for="description">Image:</label>
         <input class="form-control" id="description" type="file" name="image" required /></div>
          <div class="form-group">
           <label for="category">Status:</label>
            <select class="form-control" id="category"  name="status" required />

                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
             
            </select>
          </div> 
        <div>
        <button type="submit" class="btn btn-success">Update</button> 
        <a href="{{route('categories')}}" class="btn btn-primary">Back</a>
      </div>
    </form>
    </div>

@stop
