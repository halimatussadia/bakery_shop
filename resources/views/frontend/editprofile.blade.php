@include('frontend.partial.header')
 @include('frontend.partial.head_top')
@include('frontend.partial.main_nav')
<form action="{{route('update.profile',$edit_profile->id)}}" method="post" role="form">
@csrf
 
  <div class="container pd_top">
    <div class="row row-centered">
      <div class="col-md-6 col-centered">
    <h1>Update user Profile</h1>

    <div class="reg_frm">
    <label for="name"><b>Name</b></label>
    <input type="text" id="name" placeholder="Enter Name" name="name" value="{{$edit_profile->name}}" required/>
    </div>

    <div class="reg_frm">
    <label for="email"><b>Email</b></label>
    <input type="email" id="email" placeholder="Enter Email" name="email" value="{{$edit_profile->email}}" required/>
    </div>

    <div class="reg_frm">
    <label for="district"><b>District</b></label>
    <input type="text" id="district" placeholder="Enter District " name="district" value="{{$edit_profile->District}}" required/>
    </div>

    <div class="reg_frm">
    <label for="address"><b>Street Address</b></label>
    <input type="text" id="address" placeholder="Enter House/Road/Area" name="address" value="{{$edit_profile->address}}" required/>
    </div>

    <div class="reg_frm">
    <label for="contact"><b>Contact Number</b></label>
    <input type="number" id="contact" placeholder="Enter Number " name="number" value="{{$edit_profile->number}}" required/>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
     </div>
    </div>
  </div>
</form>