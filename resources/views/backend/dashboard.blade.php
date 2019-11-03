@extends('master')
@section('content')


            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Welcome Admin({{auth()->user()->name}})</h1>
                 <div>
                   <a href="{{route('user')}}" class="btn btn-primary">Visit Main site</a>
                </div>

            </div>
    @endsection




