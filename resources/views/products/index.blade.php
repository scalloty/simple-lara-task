@extends('layout')

@section('content')

<div class="row">
    <div class="col">
        <h4>Product list: </h4>
    </div>
    <div class="col">
        <a href="/product/create"><button type="button" class="btn btn-success float-end btn-sm"><i class="fa-solid fa-plus"></i> Add Product</button></a>
    </div>
</div>

@unless(count($products) == 0)
<table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->title}}</td>
                <td class="text-center">
                    <div class="row">
                        <div class="col">
                            <a href="/product/{{$product->id}}"><button type="button" class="btn btn-primary btn-sm"><i class="fa-regular fa-eye"></i></button></a>
                        </div>
                        <div class="col">
                            <a href="/product/{{$product->id}}/edit"><button type="button" class="btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i></button></a>
                        </div>
                        <div class="col">
                            <form method="POST" action="/product/{{$product->id}}">
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

<div>{{$products->links()}}</div>

@else
<p>No products found</p>

@endunless

@endsection