@extends('layout')

@section('content')
<div class="col-lg-4 col-md-4 col-sm-4 container justify-content-center">
    <h5 class="mb-4">Login</h5>
    <form method="POST" action="/user/authenticate">
        @csrf
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
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
@endsection