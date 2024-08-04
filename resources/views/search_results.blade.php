@extends('Components.layoutU')

@section('title', 'Search Page')

@section('content')

<section class="search-form">
    <form action="/searching" method="post">
        @csrf
        <input type="text" name="search_box" placeholder="Search here..." maxlength="100" class="box" required>
        <button type="submit" class="fas fa-search" name="search_btn"></button>
    </form>
</section>

<section class="products" style="padding-top: 40px; min-height:100vh;">
    <div class="box-container">
        @if(isset($products) && $products->count() > 0)
            @foreach($products as $product)
                <form action="/add_to_wishlist" method="post" class="box">
                    @csrf
                    <input type="hidden" name="pid" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="hidden" name="image" value="{{ $product->image_01 }}">
                    <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
                    <a href="/products', $product->id) }}" class="fas fa-eye"></a>
                    <img src="{{ asset('assets/uploaded/' . $product->image_01) }}" alt="{{ $product->name }}">
                    <div class="name">{{ $product->name }}</div>
                    <div class="flex">
                        <div class="price"><span>$</span>{{ $product->price }}<span>/-</span></div>
                        <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
                    </div>
                    <input type="submit" value="Add to Cart" class="btn" name="add_to_cart">
                </form>
            @endforeach
        @else
            <p class="empty">No products found!</p>
        @endif
    </div>
</section>
@endsection