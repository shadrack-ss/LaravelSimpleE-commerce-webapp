@extends('Components.layoutU')
@section('content')

<section class="products">
   <h1 class="heading">Latest Products</h1>

   <div class="box-container">
      @if($products->isNotEmpty())
         @foreach($products as $product)
            <form action="/add_to_cart" method="post" class="box" style=" border:none;">
               @csrf
               <input type="hidden" name="pid" value="{{ $product->id }}">
               <input type="hidden" name="name" value="{{ $product->name }}">
               <input type="hidden" name="price" value="{{ $product->price }}">
               <input type="hidden" name="image" value="{{ $product->image_01 }}">
               <button class="fas fa-heart" style=" border:none;" type="button" name="add_to_wishlist"></button>
               <a href="{{ url('quick_view', $product->id) }}" class="fas fa-eye" style=" border:none;"></a>
               <img src="{{ asset('assets/uploaded/' . $product->image_01) }}" alt="" class="rounded-img">
               <div class="name">{{ \Illuminate\Support\Str::limit($product->name, 58, '...') }}</div>

               <div class="flex">
                  <div class="price"><span>UGX </span>{{ $product->price }}<span>/-</span></div>
                  <input type="number" name="quantity" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
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
