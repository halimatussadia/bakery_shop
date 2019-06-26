@include('frontend.partial.header')
 @include('frontend.partial.head_top')
@include('frontend.partial.main_nav')

<!DOCTYPE html>
<html>
<head>

   <title>Registration Form</title>

   <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
</head>
<body>

<form action="{{route('registar')}}" method="post" role="form">
@csrf
 
  <div class="container pd_top">
    <div class="row row-centered">
      <div class="col-md-6 col-centered">
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
     
     <div class="reg_frm">
    <label for="name"><b>Type</b></label>
    <input type="text" id="name" placeholder="Enter Type" name="role" required/>
    </div>

    <div class="reg_frm">
    <label for="name"><b>Name</b></label>
    <input type="text" id="name" placeholder="Enter Name" name="name" required/>
    </div>

    <div class="reg_frm">
    <label for="email"><b>Email</b></label>
    <input type="email" id="email" placeholder="Enter Email" name="email" required/>
    </div>

    <div class="reg_frm">
    <label for="district"><b>District</b></label>
    <input type="text" id="district" placeholder="Enter District " name="district" required/>
    </div>

    <div class="reg_frm">
    <label for="address"><b>Street Address</b></label>
    <input type="text" id="address" placeholder="Enter House/Road/Area" name="address" required/>
    </div>

    <div class="reg_frm">
    <label for="contact"><b>Contact Number</b></label>
    <input type="number" id="contact" placeholder="Enter Number " name="number" required/>
    </div>

    <div class="reg_frm">
    <label for="psw"><b>Password</b></label>
    <input type="password" id="psw" placeholder="Enter Password" name="password" required/></div>

    <div class="reg_frm">
    <label for="psw-repeat"><b>Confirm Password</b></label>
    <input type="password" id="psw" placeholder="Confirm Password" name="confirm_password" required/></div>

    <button type="submit" class="btn btn-primary">Register</button>
  

  <!-- <div class="container signin"> -->
    <p>Already have an account? <a class="sign_btn" href="{{route('login')}}">Sign in</a>.</p>
     </div>
    </div>
  </div>
</form>
</body>
