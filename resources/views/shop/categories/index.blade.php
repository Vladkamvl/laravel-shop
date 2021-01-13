@extends('master')

@section('title', 'All categories')

@section('content')
    <div class="card-columns mt-4">
        @foreach($categories as $category)
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('assets/img/image-cap.svg') }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('shop.categories.show', [$category->id]) }}">{{ $category->title }}</a></h5>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($category->description, 50) }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
