@extends('layouts.master')

@section('title', 'Basket')

@section('content')
    @if(session()->has('checkoutError'))
        <div class="alert alert-danger" role="alert">
            {{ session()->get('checkoutError') }}
        </div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col"></th>
            <th scope="col">Cost</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order->products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->title}}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <form action="{{ route('basket.add', [$product->id]) }}" method="POST">
                        @method('post')
                        @csrf
                        <button class="btn btn-primary">+</button>
                    </form>
                    {{ $product->pivot->count }}
                    <form action="{{ route('basket.remove', [$product->id]) }}" method="POST">
                        @method('post')
                        @csrf
                        <button class="btn btn-danger">-</button>
                    </form>
                </td>
                <td>{{ $product->getTotalCost() }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <strong>Total cost: {{ $order->calculateTotalCost() }}</strong><br>
    <a href="{{ route('basket.checkout') }}"class="btn btn-primary">Checkout</a>
@endsection
