@include('frontend.partial.header')
 @include('frontend.partial.head_top')
@include('frontend.partial.main_nav')

<!DOCTYPE html>
<html>
<head>

    <title>Login Form</title>

     <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
</head>
<body>
<form action="{{route('user.login')}}" method="POST" role="form">
    @csrf()

        <div class="container pd_top">
    <div class="row row-centered">
      <div class="col-md-6 col-centered">
         @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <h1>Login Form</h1>
    <p>Please fill in this form.</p>
    
    <div class="reg_frm">
    <label for="email"><b>Role</b></label>
    <input type="text" id="email" placeholder="Enter Role" name="role" required/>
    </div>
    <div class="reg_frm">
    <label for="email"><b>Email</b></label>
    <input type="email" id="email" placeholder="Enter Email" name="email" required/>
    </div>
    <div class="reg_frm">
    <label for="psw"><b>Password</b></label>
    <input type="password" id="psw" placeholder="Enter Password" name="password" required/></div>

    <button type="submit" class="btn btn-primary">Login</button>
    
  <!-- <div class="container signin"> -->

    </div>
  </div>
</form>
</body>


    