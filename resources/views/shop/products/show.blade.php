@extends('master')

@section('title', 'All items')

@section('content')
    <div class="card">
        <img class="card-img-top" src="{{ asset('assets/img/image-cap.svg') }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $product->title }}</h5>
            <strong>{{ $product->category->title }}</strong><br>
            <p class="card-text">{{ $product->description  }}</p>
            <a href="#" class="btn btn-primary">Add to basket</a>
        </div>
    </div>
@endsection
