@extends('layout')

@section('content')
<div class="row">
    <div class="col">
        <h4>Add Product: </h4>
    </div>
</div>

<form method="POST" action="/product/create">
    @csrf
    <div class="mb-3">
        <label for="productTitle" class="form-label">Title:</label>
        <input type="text" name="title" class="form-control" id="productTitle" value="{{old('title')}}">
        @error('title')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="productDescription" class="form-label">Description:</label>
        <textarea class="form-control" name="description" placeholder="Leave a product description here" id="productDescription">{{old('description')}}</textarea>
        @error('description')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="productColors" class="form-label">Colors:</label>
        <input type="text" class="form-control tags" id="productColors" name="colors" value="{{old('colors')}}"/>
        @error('colors')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection