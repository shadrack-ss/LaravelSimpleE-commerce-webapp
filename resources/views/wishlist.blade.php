@extends('Components.layoutU')

@section('title', 'Wishlist')

@section('content')

<section class="products">
    <h3 class="heading">Your Wishlist</h3>

    <div class="box-container">
        @if ($wishlistItems->isEmpty())
            <p class="empty">Your wishlist is empty</p>
        @else
            @foreach ($wishlistItems as $item)
                <form action="{{ route('wishlist.delete') }}" method="post" class="box">
                    @csrf
                    <input type="hidden" name="wishlist_id" value="{{ $item->id }}">
                    <a href={{ url('quick_view', $item->id) }}" class="fas fa-eye"></a>
                    <img src="{{ asset('assets/uploaded/' . $item->image) }}" alt="">
                    <div class="name">{{ $item->name }}</div>
                    <div class="flex">
                        <div class="price">${{ $item->price }}/-</div>
                        <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
                    </div>
                    <input type="submit" value="Add to Cart" class="btn" name="add_to_cart">
                    <input type="submit" value="Delete Item" onclick="return confirm('Delete this from wishlist?');" class="delete-btn" name="delete">
                </form>
            @endforeach
        @endif
    </div>

    <div class="wishlist-total">
        <p>Grand total : <span>${{ $grandTotal }}/-</span></p>
        <a href="/shop" class="option-btn">Continue Shopping</a>
        <a href="{{ route('wishlist.delete_all') }}" class="delete-btn {{ $grandTotal > 0 ? '' : 'disabled' }}" onclick="return confirm('Delete all from wishlist?');">Remove all items</a>
    </div>
</section>

@endsection
