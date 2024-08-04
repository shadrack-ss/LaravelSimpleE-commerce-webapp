@extends('Components.layoutU')

@section('content')
<section class="checkout-orders">
    @if(session('error'))
        <p class="error-message">{{ session('error') }}</p>
    @elseif(session('message'))
        <p class="success-message">{{ session('message') }}</p>
    @endif

    <form action="{{ route('order.place') }}" method="POST">
        @csrf
        
        <h3>Place Your Orders</h3>
        <div class="display-orders">
            @if($cart_items->isEmpty())
                <p class="empty">Your cart is empty!</p>
            @else
                @php $grand_total = 0; @endphp
                @foreach($cart_items as $item)
                    <p>{{ $item->name }} <span>({{ 'UGX'.$item->price.'/- x '. $item->quantity }})</span></p>
                    @php $grand_total += $item->price * $item->quantity; @endphp
                @endforeach
                <input type="hidden" name="total_products" value="{{ $cart_items->implode('name', ', ') }}">
                <input type="hidden" name="total_price" value="{{ $grand_total }}">
                <div class="grand-total">Grand total: <span>UGX {{ $grand_total }}/-</span></div>
            @endif
        </div>

        <div class="flex">
            <div class="inputBox">
                <span>Your Name :</span>
                <input type="text" name="name" placeholder="Enter your name" class="box" maxlength="20" required>
            </div>
            <div class="inputBox">
                <span>Your Number :</span>
                <input type="number" name="number" placeholder="Enter your number" class="box" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;" required>
            </div>
            <div class="inputBox">
                <span>Your Email :</span>
                <input type="email" name="email" placeholder="Enter your email" class="box" maxlength="50" required>
            </div>
            <div class="inputBox">
                <span>Payment Method :</span>
                <select name="method" class="box" required>
                    <option value="cash on delivery">Cash on Delivery</option>
                    <option value="credit card">Credit Card</option>
                    <option value="paytm">Paytm</option>
                    <option value="paypal">PayPal</option>
                </select>
            </div>
            <div class="inputBox">
                <span>Address Line :</span>
                <input type="text" name="flat" placeholder="e.g. flat number" class="box" maxlength="50" required>
            </div>

            <div class="inputBox">
                <span>City :</span>
                <input type="text" name="city" placeholder="e.g. Mbarara" class="box" maxlength="50" required>
            </div>
            <div class="inputBox">
                <span>Country :</span>
                <input type="text" name="country" placeholder="e.g. Uganda" class="box" maxlength="50" required>
            </div>
            <div class="inputBox">
                <span>Pin Code :</span>
                <input type="number" name="pin_code" placeholder="e.g. 123456" class="box" min="0" max="999999" onkeypress="if(this.value.length == 6) return false;" required>
            </div>
        </div>

        <input type="submit" class="btn {{ $grand_total > 1 ? '' : 'disabled' }}" value="Place Order">
    </form>
</section>

<script src="{{ asset('assets/js/script.js') }}"></script>

<style>
    .error-message {
        color: #ff0000;
        font-size: 16px;
        margin-bottom: 20px;
    }
    .success-message {
        color: #28a745;
        font-size: 16px;
        margin-bottom: 20px;
    }
</style>
@endsection
