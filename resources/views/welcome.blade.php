@extends('layout')
@section('content')
    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>Home</h1>
    </div>

    <div class="container-fluid p-5" style="background: yellow">
        <div class="container mt-5">
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-sm-4 mt-4">
                        <a href="{{ route('catalog', $category->slug) }}">
                            <h3>{{ $category->name }}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
