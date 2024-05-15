@extends('layout')
@section('content')
    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>{{ $product->name }}</h1>
        <p>test langs</p>
    </div>

    <div class="container mt-5">
        <div class="row">
            Product {{ $product->name }} description
        </div>
    </div>
@endsection
