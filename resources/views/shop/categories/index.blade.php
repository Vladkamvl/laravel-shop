@extends('master')

@section('title', 'All categories')

@section('content')
    <div class="card-deck mt-4">
        @for($i=0;$i<3;$i++)
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('assets/img/image-cap.svg') }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        @endfor
    </div>
@endsection
