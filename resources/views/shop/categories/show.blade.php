@extends('layouts.master')

@section('title', 'All items')

@section('content')
    <h3>{{ $category->title }}</h3>
    <h5>{{ $category->description }}</h5>
    <div class="card-columns mt-4">
        @foreach($products as $product)
            <form action="{{ route('basket.add', [$product->id]) }}" method="POST">
                @method('post')
                @csrf
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('assets/img/image-cap.svg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ route('shop.products.show', [$product->id]) }}">{{ $product->title }}</a></h5>
                        <strong>{{ $category->title }}</strong>
                        <p class="card-text">
                            {{
                            \Illuminate\Support\Str::limit($product->description, 100)
                            }}
                        </p>
                        <button type="submit" class="btn btn-primary">Add to basket</button>
                    </div>
                </div>
            </form>
        @endforeach
    </div>
@endsection
