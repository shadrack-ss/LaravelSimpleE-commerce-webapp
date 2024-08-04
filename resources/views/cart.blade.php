@extends('Components.layoutU')
@section('content')

<section class="products shopping-cart">
    <h3 class="heading">Shopping Cart</h3>

    <div class="box-container">
        @if($carts->isNotEmpty())
            @foreach($carts as $cart)
                <div class="box">
                    <form action="{{ route('cart.updateQuantity', $cart->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                        <a href="/quick_view/{{ $cart->id }}" class="fas fa-eye"></a>
                        <img src="{{ asset('assets/uploaded/'.$cart->image) }}" alt="">
                        <div class="name">{{ $cart->name }}</div>
                        <div class="flex">
                            <div class="price">UGX {{ $cart->price }}/-</div>
                            <input type="number" name="quantity" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="{{ $cart->quantity }}">
                            <button type="submit" class="fas fa-edit" name="update_qty"></button>
                        </div>
                        <div class="sub-total"> Sub Total : <span>UGX {{ $cart->sub_total }}/-</span> </div>
                    </form>

                    <form action="{{ route('cart.delete', $cart->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn" onclick="return confirm('Delete this from cart?');">Delete Item</button>
                    </form>
                </div>
            @endforeach
        @else
            <p class="empty">Your cart is empty</p>
        @endif
    </div>

    <div class="cart-total">
        <p>Grand Total : <span>UGX {{ $grand_total }}/-</span></p>
        <a href="/shop" class="option-btn">Continue Shopping</a>
        <a href="{{ route('cart.deleteAll') }}" class="delete-btn {{ ($grand_total > 1) ? '' : 'disabled' }}" onclick="return confirm('Delete all from cart?');">Delete All Items</a>
        <a href='/checkout' class="btn {{ ($grand_total > 1) ? '' : 'disabled' }}">Proceed to Checkout</a>
    </div>
</section>
@endsection
