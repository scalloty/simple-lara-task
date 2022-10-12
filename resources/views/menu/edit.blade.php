@extends('layout')

@section('content')
<div class="col-lg-6 col-md-6 col-sm-6 container justify-content-center">
    <div class="row">
        <div class="col">
            <h4>Edit Menu: </h4>
        </div>
    </div>
    <form method="POST" action="/admin/menu/{{$menu->id}}">
        @csrf
        @method('PUT')
        <div class="mb-2">
            <label for="title" class="form-label">Title:</label>
            <input type="text" name="title" class="form-control" id="title" value="{{$menu->title}}">
            @error('title')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        
        <div class="mb-2">
            <label for="route" class="form-label">Route:</label>
            <input type="text" name="route" class="form-control" id="route" value="{{$menu->route}}">
            @error('route')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-2">
            <label for="order" class="form-label">Order:</label>
            <input type="text" name="order" class="form-control" id="order" value="{{$menu->order}}">
            @error('order')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-2">
            <label for="parent" class="form-label">Parent:</label>
            <select class="form-select" aria-label="Default select example" id="parent" name="parent_id">
                <option value="0">No</option>
                @foreach ($menu_list as $m)
                    <option @if($m->id == $menu->parent_id) selected @endif value="{{$m->id}}">{{$m->title}}</option>
                @endforeach
            </select>
            @error('confirm_password')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit Menu</button>
    </form>
</div>
@endsection