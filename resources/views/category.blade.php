@extends('Components.layoutU')

@section('content')
<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<section class="products">
    <h1 class="heading">{{ $categoryName }}</h1>

    <div class="box-container" style="border-color:darkgray">
        @if($products->count() > 0)
            @foreach($products as $product)
                <form action="{{ route('addToCart') }}" method="post" class="box" style=" border:none;">
                    @csrf
                    <input type="hidden" name="pid" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="hidden" name="image" value="{{ $product->image_01 }}">
                    <button class="fas fa-heart" style=" border:none;" type="submit" name="add_to_wishlist"></button>
                    <a href="{{ url('quick_view', $product->id) }}" class="fas fa-eye" style=" border:none;"></a>
                    <img src="{{ asset('assets/uploaded/' . $product->image_01) }}" alt="">
                    <div class="name">{{ $product->name }}</div>
                    <div class="flex">
                        <div class="price"><span>$</span>{{ $product->price }}<span>/-</span></div>
                        <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
                    </div>
                    <input type="submit" value="add to cart" class="btn" name="add_to_cart">
                </form>
            @endforeach
        @else
            <p class="empty">no products found!</p>
        @endif
    </div>
</section>
@endsection
