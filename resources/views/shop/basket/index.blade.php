@extends('master')

@section('title', 'Basket')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col"></th>
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
                    <a class="btn btn-danger">-</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
