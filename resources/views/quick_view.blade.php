@extends('Components.layoutU')

@section('content')

<section class="quick-view">
   <style>
      .heading{
         font-family:arial;
         font-size:20px;
      }

      .name{
         font-weight: bold;
      }

      .related-products .box-container {
         display: flex;
         flex-wrap: wrap;
         gap: 20px;
         justify-content: center;
      }

      .related-products .box {
         border: 1px solid darkgray;
         border-radius: 5px;
         padding: 10px;
         max-width: 200px;
         box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      }

      .related-products img {
         max-width: 100%;
         height: auto;
         display: block;
         margin: 0 auto 10px;
      }

      .related-products .name {
         font-size: 16px;
         font-weight: bold;
         margin-bottom: 5px;
         text-align: center;
      }

      .related-products .price {
         font-size: 14px;
         color: #333;
         margin-bottom: 10px;
         text-align: center;
      }

      .related-products .flex {
         display: flex;
         justify-content: space-between;
         align-items: center;
         margin-bottom: 10px;
      }

      .related-products .qty {
         width: 60px;
         text-align: center;
      }

      .related-products .btn {
         background-color: #007bff;
         color: white;
         border: none;
         padding: 5px 10px;
         border-radius: 3px;
         cursor: pointer;
         text-align: center;
      }

      .related-products .btn:hover {
         background-color: #0056b3;
      }

      .related-products .option-btn {
         background-color: #dc3545;
         color: white;
         border: none;
         padding: 5px 10px;
         border-radius: 3px;
         cursor: pointer;
         text-align: center;
         margin-left: 10px;
      }

      .related-products .option-btn:hover {
         background-color: #c82333;
      }
   </style>

   <h1 class="heading">Product details</h1>

   @if($product)
   <form action="{{ route('addToCart') }}" method="post" class="box" style="border:none";>
      @csrf
      <input type="hidden" name="pid" value="{{ $product->id }}">
      <input type="hidden" name="name" value="{{ $product->name }}">
      <input type="hidden" name="price" value="{{ $product->price }}">
      <input type="hidden" name="image" value="{{ $product->image_01 }}">
      <div class="row">
         <div class="image-container">
            <div class="main-image">
               <img src="{{ asset('assets/uploaded/' . $product->image_01) }}" alt="">
            </div>
            <div class="sub-image">
               <img src="{{ asset('assets/uploaded/' . $product->image_01) }}" alt="">
               <img src="{{ asset('assets/uploaded/' . $product->image_02) }}" alt="">
               <img src="{{ asset('assets/uploaded/' . $product->image_03) }}" alt="">
            </div>
         </div>
         <div class="content">
            <div class="name">{{ $product->name }}</div>
            <div class="flex">
               <div class="price"><span>UGX </span>{{ $product->price }}<span>/-</span></div>
               <input type="number" name="quantity" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
            </div>
            <div class="details">{{ $product->details }}</div>
            <div class="flex-btn">
               <input type="submit" value="Add to Cart" class="btn" name="add_to_cart">
               <input class="option-btn" type="submit" name="add_to_wishlist" value="Add to Wishlist">
            </div>
         </div>
      </div>
   </form>

   <section class="related-products">
      <h1 class="heading">Related Products</h1>
      <div class="box-container">
         @if($relatedProducts->count() > 0)
            @foreach($relatedProducts as $relatedProduct)
               <form action="{{ route('addToCart') }}" method="post" class="box">
                  @csrf
                  <input type="hidden" name="pid" value="{{ $relatedProduct->id }}">
                  <input type="hidden" name="name" value="{{ $relatedProduct->name }}">
                  <input type="hidden" name="price" value="{{ $relatedProduct->price }}">
                  <input type="hidden" name="image" value="{{ $relatedProduct->image_01 }}">
                  <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
                  <a href="{{ url('quick_view', $relatedProduct->id) }}" class="fas fa-eye"></a>
                  <img src="{{ asset('assets/uploaded/' . $relatedProduct->image_01) }}" alt="">
                  <div class="name">{{ \Illuminate\Support\Str::limit($relatedProduct->name, 53, '...') }}</div>
                  <div class="flex">
                     <div class="price"><span>UGX- </span>{{ $relatedProduct->price }}<span>/-</span></div>
                     <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
                  </div>
                  <input type="submit" value="Add to Cart" class="btn" name="add_to_cart">
               </form>
            @endforeach
         @else
            <p class="empty">No related products found!</p>
         @endif
      </div>
   </section>
   
   @else
      <p class="empty">No products added yet!</p>
   @endif

</section>

@endsection
