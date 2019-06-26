@include('frontend.partial.header')
 @include('frontend.partial.head_top')
@include('frontend.partial.main_nav')
<head>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<br><br>
<body>
<div class="container pd_top">
    <div class="row row-centered">
      <div class="col-md-6 col-centered color">
		    
        </div>
    </div>
    <div class="row row-centered">
        <div class="col-md-6 col-centered color_none u_info">
            <div><span>Name:</span><span class="in_name">{{$user_info->name}}</span></div>
            <div><span>Email:</span><span>{{$user_info->email}}</span></div>
            <div><span>District:</span><span class="in_add">{{$user_info->district}}</span></div>
            <div><span>Address:</span><span class="in_add">{{$user_info->address}}</span></div>
            <div><span>Contact Number:</span><span>{{$user_info->number}}</span></div>
            <a href="{{route('edit.profile',$user_info->id)}}" class="btn btn-info">Edit</a>
        </div>

</div>
</div>
</body>