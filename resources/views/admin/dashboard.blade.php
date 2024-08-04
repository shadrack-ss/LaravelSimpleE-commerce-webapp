@extends('admin.admin_layout')

@section('content')
    @if(session('message'))
        <div class="message">
            <span>{{ session('message') }}</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
    @endif

    <section class="dashboard">
        <h1 class="heading">Dashboard</h1>
        <div class="box-container">
            <div class="box">
                <h3>Welcome!</h3>
                <p>{{ $admin->first_name }}</p>
                <a href="{{ route('admin.updateProfile') }}" class="btn">Update Profile</a>
            </div>

            <div class="box">
                <h3><span>$</span>{{ $total_pendings }}<span>/-</span></h3>
                <p>Total Pendings</p>
                <a href="/pending" class="btn">See Orders</a>
            </div>

            <div class="box">
                <h3><span>$</span>{{ $total_completes }}<span>/-</span></h3>
                <p>Completed Orders</p>
                <a href="/completed" class="btn">See Orders</a>
            </div>

            <div class="box">
                <h3>{{ $number_of_orders }}</h3>
                <p>All Orders</p>
                <a href="/all_rders" class="btn">See Orders</a>
            </div>

            <div class="box">
                <h3>{{ $number_of_products }}</h3>
                <p>Products Added</p>
                <a href='/admin/create' class="btn">See Products</a>
            </div>

            <div class="box">
                <h3>{{ $number_of_users }}</h3>
                <p>Normal Users</p>
                <a href="{{ route('admin.users') }}" class="btn">See Users</a>
            </div>

            <div class="box">
                <h3>{{ $number_of_admins }}</h3>
                <p>Admin Users</p>
                <a href="{{ route('admin.admins') }}" class="btn">See Admins</a>
            </div>

            <div class="box">
                <h3>{{ $number_of_messages }}</h3>
                <p>New Messages</p>
                <a href="{{ route('admin.messages') }}" class="btn">See Messages</a>
            </div>
        </div>
    </section>
@endsection
