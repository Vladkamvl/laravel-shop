@extends('layouts.master')

@section('title', 'Basket')

@section('content')
<form action="{{ route('basket.confirm') }}"method="POST">
    @method('patch')
    @csrf
    <h5>Total cost: {{ $order->calculateTotalCost()}}</h5>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name: </label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="name">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Phone: </label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="phone">
    </div>
    <button type="submit" class="btn btn-primary">Checkout</button>
  </form>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
