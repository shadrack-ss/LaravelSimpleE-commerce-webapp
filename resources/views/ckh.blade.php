
@extends('Components.layoutU')

@section('content')
<section class="checkout-orders">
   <form action="{{ route('order.place') }}" method="POST">
      @csrf

      <h3>Your Orders</h3>

      <div class="display-orders">
         @if(count($cart_items) > 0)
            @foreach($cart_items as $item)
               <p> {{ $item->name }} <span>(UGX {{ $item->price }}/- x {{ $item->quantity }})</span> </p>
            @endforeach
         @else
            <p class="empty">Your cart is empty!</p>
         @endif
         <input type="hidden" name="total_products" value="{{ $cart_items->implode('name', ', ') }}">
                    <input type="hidden" name="total_price" value="{{ $grand_total }}">
                    <div class="grand-total">Grand total: <span>${{ $grand_total }}/-</span></div>
      </div>

      <h>Place Your Orders</h>

      <div class="flex">
                        <div class="inputBox">
                    <span>Address Line 01 :</span>
                    <input type="text" name="flat" placeholder="e.g. flat number" class="box" maxlength="50" required>
                </div>
                <div class="inputBox">
                    <span>Address Line 02 :</span>
                    <input type="text" name="street" placeholder="e.g. street name" class="box" maxlength="50" required>
                </div>
                <div class="inputBox">
                    <span>City :</span>
                    <input type="text" name="city" placeholder="e.g. Mumbai" class="box" maxlength="50" required>
                </div>
                <div class="inputBox">
                    <span>State :</span>
                    <input type="text" name="state" placeholder="e.g. Maharashtra" class="box" maxlength="50" required>
                </div>
                <div class="inputBox">
                    <span>Country :</span>
                    <input type="text" name="country" placeholder="e.g. India" class="box" maxlength="50" required>
                </div>
                <div class="inputBox">
                    <span>Pin Code :</span>
                    <input type="number" name="pin_code" placeholder="e.g. 123456" class="box" min="0" max="999999" onkeypress="if(this.value.length == 6) return false;" required>
                </div>
            </div>
         <div class="inputBox">
            <span>Address Line 01:</span>
            <input type="text" name="flat" placeholder="e.g. flat number" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>Address Line 02:</span>
            <input type="text" name="street" placeholder="e.g. street name" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>City:</span>
            <input type="text" name="city" placeholder="e.g. Mumbai" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>State:</span>
            <input type="text" name="state" placeholder="e.g. Maharashtra" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>Country:</span>
            <input type="text" name="country" placeholder="e.g. India" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>Pin Code:</span>
            <input type="number" name="pin_code" placeholder="e.g. 123456" class="box" min="0" max="999999" onkeypress="if(this.value.length == 6) return false;" required>
         </div>
      </div>

      <input type="submit" name="order" class="btn {{ $grand_total > 1 ? '' : 'disabled' }}" value="Place Order">
   </form>
</section>

<script src="{{ asset('assets/js/script.js') }}"></script>
@endsection
