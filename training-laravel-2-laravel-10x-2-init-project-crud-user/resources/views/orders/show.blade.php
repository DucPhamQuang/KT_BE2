@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Đơn hàng của người dùng: {{ $user->name }}</h2>

    @foreach($orders as $order)
    <div class="order">
        <h4>Đơn hàng: {{ $order->order_number }}</h4>
        <ul>
            @foreach($order->products as $product)
            <li>
                <strong>{{ $product->name }}</strong><br>
                {{ $product->description }} - {{ number_format($product->price) }} VND
            </li>
            @endforeach
        </ul>
    </div>
    @endforeach
</div>
@endsection