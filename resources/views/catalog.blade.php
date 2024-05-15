@extends('layout')
@section('content')
    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>{{ $category->name }}</h1>
    </div>
    <div class="container mt-5">
        <div class="row">
            @foreach($products as $product)
                <div class="col-sm-4">
                    <a href="{{ route('product', $product->slug) }}">
                        <h3>{{ $product->name }}</h3>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
