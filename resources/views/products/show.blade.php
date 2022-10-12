@extends('layout')

@section('content')

<article class="post vt-post mt-5">
    <div class="row">
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4">
            <div class="post-type post-img">
                <img src="https://placekitten.com/330/330" class="img-responsive" alt="image post">
            </div>
            <div class="author-info author-info-2">
                <ul class="list-inline">
                    <li>
                        <div class="info">
                            <span>Added on:</span>
                            <strong>{{$product->created_at->format('M j, Y')}}</strong>
                        </div>
                    </li>
                    <li>
                        <div class="info">
                            <span>Updated on:</span>
                            <strong>{{$product->updated_at->format('M j, Y')}}</strong>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
            <div class="caption">
                <h3 class="md-heading">{{$product->title}}</h3>
                <p>{{$product['description']}}</p>
            </div>
            <div class="caption mt-5">
                <p class="fw-bold">Colors:</p>
                @unless(count($product->colors) == 0)
                    <ul class="list-group">
                        @foreach ($product->colors as $color)
                            <li class="list-group-item">{{$color->title}}</li>
                            @endforeach
                    </ul>
                    @else
                    <p>No colors found</p>
                @endunless
            </div>
            <div class="caption mt-5">
                <p class="fw-bold">Actions:</p>
                <div class="row">
                    <div class="col">
                        <a href="/product/{{$product->id}}/edit"><button type="button" class="btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i> Edit</button></a>
                    </div>
                    <div class="col">
                        <form method="POST" action="/product/{{$product->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i> Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>

@endsection