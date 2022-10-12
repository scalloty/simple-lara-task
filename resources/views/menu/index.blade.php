@extends('layout')

@section('content')
<div class="row">
    <div class="col">
        <h4>Menu: </h4>
    </div>
    <div class="col">
        <a href="/admin/menu/create"><button type="button" class="btn btn-success float-end btn-sm"><i class="fa-solid fa-plus"></i> Add Menu</button></a>
    </div>
</div>

@unless(count($menulist) == 0)
<table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Parent</th>
        <th scope="col">Order</th>
        <th scope="col">Route</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($menus as $menu)
            <tr>
                <th scope="row">{{$menu->id}}</th>
                <td>{{$menu->title}}</td>
                <td>{{$menu->getParentTitle()}} (#{{$menu->parent_id}})</td>
                <td>{{$menu->order}}</td>
                <td>{{$menu->route}}</td>
                <td class="text-center">
                    <div class="row">
                        <div class="col">
                            <a href="/admin/menu/{{$menu->id}}/edit"><button type="button" class="btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i></button></a>
                        </div>
                        <div class="col">
                            <form method="POST" action="/admin/menu/{{$menu->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i></button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div>{{$menus->links()}}</div>

@else
<p>Menu list is empty</p>

@endunless

@endsection