<form action="{{ route('add_To_Cart') }}" method="post">
    @csrf <!-- CSRF protection token -->

    <!-- Hidden input field to store the user ID -->
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">

    <!-- Hidden input field to store the product ID -->
    <input type="hidden" name="pid" value="{{ $product->id }}">

    <!-- Hidden input field to store the product name -->
    <input type="hidden" name="name" value="{{ $product->name }}">

    <!-- Hidden input field to store the product price -->
    <input type="hidden" name="price" value="{{ $product->price }}">

    <!-- Hidden input field to store the product image URL -->
    <input type="hidden" name="image" value="{{ $product->image_01 }}">

    <!-- Input field for selecting the quantity, with a minimum value of 1 -->
    <input type="number" name="quantity" value="1" min="1">

    <!-- Submit button to add the product to the cart -->
    <button type="submit">Add to Cart</button>
</form>
