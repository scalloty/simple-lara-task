@extends('layout')

@section('content')
<div class="col-lg-4 col-md-4 col-sm-4 container justify-content-center">
    <h5 class="mb-4">Register</h5>
    <form method="POST" action="/user">
        @csrf
        <div class="mb-2">
            <label for="userName" class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" id="userName" value="{{old('name')}}">
            @error('name')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-2">
            <label for="userEmail" class="form-label">Email address:</label>
            <input type="email" name="email" class="form-control" id="userEmail" value="{{old('email')}}">
            @error('email')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-2">
            <label for="userPassword" class="form-label">Password:</label>
            <input type="password" name="password" class="form-control" id="userPassword">
            @error('password')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-2">
            <label for="userConfirmPassword" class="form-label">Confirm Password:</label>
            <input type="password" name="password_confirmation" class="form-control" id="userConfirmPassword">
            @error('confirm_password')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
        <div class="mt-5">
            <p>
                Already have an account?
                <a href="/login" class="text-laravel">Login</a>
            </p>
        </div>
    </form>
</div>

@endsection