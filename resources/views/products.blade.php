@extends('admin.layout')

@section('content')

@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<section class="show-products" style="padding-top:0">
    <h1 class="heading">Products Added</h1>
    <div class="box-container">
        @forelse($products as $product)
            <div class="box">
                <img src="{{ Storage::url($product->image_01) }}" alt="{{ $product->name }}">
                <div class="name">{{ $product->name }}</div>
                <div class="price">${{ $product->price }}</div>
                <div class="details">{{ $product->details }}</div>
                <div class="flex-btn">
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="option-btn">Update</a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="empty">No products added yet!</p>
        @endforelse
    </div>
</section>
@endsection
