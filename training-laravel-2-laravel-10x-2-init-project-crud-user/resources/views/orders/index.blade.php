@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Danh sách đơn hàng</h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if($orders->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã đơn hàng</th>
                <th>Người dùng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->order_number }}</td>
                <td>{{ $order->user->name }}</td>
                <td>
                    <a href="{{ route('orders.show', $order->user->id) }}" class="btn btn-primary btn-sm">Xem chi tiết</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Chưa có đơn hàng nào.</p>
    @endif
</div>
@endsection