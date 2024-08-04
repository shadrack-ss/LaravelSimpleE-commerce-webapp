@extends('Components.layout')
@section('title', 'Placed Orders')
@section('title', 'Edit Profile')
@section('dashboard_bar')
    All Orders
@endsection
@section('content')

        <section class="orders">
                
            <h1 class="heading">Placed Orders</h1>

            @if (Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
            @elseif ($orders->isEmpty())
                <p class="alert alert-warning">No orders placed yet!</p>
            @else
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Placed On</th>
                                <th>Name</th>
                                <th>Number</th>
                                <th>Address</th>
                                <th>Total Products</th>
                                <th>Total Price</th>
                                <th>Payment Method</th>
                                <th>Payment Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->number }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->total_products }}</td>
                                    <td>UGX {{ $order->total_price }}/-</td>
                                    <td>{{ $order->method }}</td>
                                    <td>
                                        <form action="/update-payment-status" method="post">
                                            @csrf
                                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                                            <select name="payment_status" class="form-control">
                                                <option selected disabled>{{ $order->payment_status }}</option>
                                                <option value="pending">pending</option>
                                                <option value="completed">completed</option>
                                            </select>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                        <a href="/delete-order/{{ $order->id }}" class="btn btn-danger" onclick="return confirm('Delete this order?');">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
            
        </section>

@endsection