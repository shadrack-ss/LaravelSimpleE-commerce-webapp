@extends('Components.layoutU')

@section('title', 'Orders')

@section('content')

<section class="orders">
    <h1 class="heading">Placed Orders</h1>

    <div class="box-container">
        @if (isset($message))
            <p class="empty">{{ $message }}</p>
        @elseif ($orders->isEmpty())
            <p class="empty">No orders placed yet!</p>
        @else
            @foreach ($orders as $order)
                <div class="box">
                    <p>Placed on: <span>{{ $order->created_at }}</span></p>
                    <p>Name: <span>{{ $order->name }}</span></p>
                    <p>Email: <span>{{ $order->email }}</span></p>
                    <p>Number: <span>{{ $order->number }}</span></p>
                    <p>Address: <span>{{ $order->address }}</span></p>
                    <p>Payment Method: <span>{{ $order->method }}</span></p>
                    <p>Total Products: <span>{{ $order->total_products }}</span></p>
                    <p>Total Price: <span>UGX {{ $order->total_price }}/-</span></p>
                    <p>Payment Status: <span style="color:{{ $order->payment_status == 'pending' ? 'red' : 'green' }}">{{ $order->payment_status }}</span></p>
                </div>
            @endforeach
        @endif
    </div>
</section>

@endsection
