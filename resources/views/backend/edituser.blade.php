@extends('master')
@section('content') 
@if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
<form action="{{route('update.user',$edit->id)}}" method="post" role="form">
@csrf
 
    <h1>Update user Profile</h1>

    <div class="form-group>
    <label for="name"><b>Name</b></label>
    <input class="form-control" type="text" id="name" placeholder="Enter Name" name="name" value="{{$edit->name}}" required/>
    </div>

    <div class="form-group">
    <label for="email"><b>Email</b></label>
    <input class="form-control" type="email" id="email" placeholder="Enter Email" name="email" value="{{$edit->email}}" required/>
    </div>

    <div class="form-group">
    <label for="district"><b>District</b></label>
    <input class="form-control" type="text" id="district" placeholder="Enter District " name="district" value="{{$edit->District}}" required/>
    </div>

    <div class="form-group">
    <label for="address"><b>Street Address</b></label>
    <input class="form-control" type="text" id="address" placeholder="Enter House/Road/Area" name="address" value="{{$edit->address}}" required/>
    </div>

    <div class="form-group">
    <label for="contact"><b>Contact Number</b></label>
    <input class="form-control" type="number" id="contact" placeholder="Enter Number " name="number" value="{{$edit->number}}" required/>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{route('users')}}" class="btn btn-primary">Edit</a>
     </div>
    </div>
  </div>
</form>
@stop