@extends('layouts.app') 
@section('content')
<div class="jumborton text-center">
    <br><br>
    <h1>Welcome To RESTful Api Episodes</h1>

    @if (Auth::guest())
    <p><a class="btn btn-primary btn-md" href="/login" role="button">Login</a>
        <a class="btn btn-success btn-md" href="/register" role="button">Register</a></p>
    @else
    <img src="/storage/img/rest-api.jpg" class="img-fluid" alt="Responsive image"> @endif
</div>
@endsection