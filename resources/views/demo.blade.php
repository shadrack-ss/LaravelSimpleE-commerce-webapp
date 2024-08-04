@extends('Components.layoutU')

@section('content')
<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<div class="home-bg">
    <section class="home">
        <div class="swiper home-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide slide">
                    <div class="image">
                        <img src="{{ asset('assets/images/home-img-1.png') }}" alt="">
                    </div>
                    <div class="content">
                        <span>upto 50% off</span>
                        <h3>latest smartphones</h3>
                        <a href="{{ url('shop') }}" class="btn">shop now</a>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="image">
                        <img src="{{ asset('assets/images/home-img-2.png') }}" alt="">
                    </div>
                    <div class="content">
                        <span>upto 50% off</span>
                        <h3>latest watches</h3>
                        <a href="{{ url('shop') }}" class="btn">shop now</a>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="image">
                        <img src="{{ asset('assets/images/home-img-3.png') }}" alt="">
                    </div>
                    <div class="content">
                        <span>upto 50% off</span>
                        <h3>latest headsets</h3>
                        <a href="{{ url('shop') }}" class="btn">shop now</a>
                    </div>
                </div>
            </div>

            <div class="swiper-pagination"></div>
        </div>
    </section>
</div>

<section class="category">
    <h1 class="heading">shop by category</h1>
    <div class="swiper category-slider">
        <div class="swiper-wrapper">
            <a href="{{ url('category?category=laptop') }}" class="swiper-slide slide">
                <img src="{{ asset('assets/images/icon-1.png') }}" alt="">
                <h3>laptop</h3>
            </a>

            <a href="{{ url('category?category=tv') }}" class="swiper-slide slide">
                <img src="{{ asset('assets/images/icon-2.png') }}" alt="">
                <h3>tv</h3>
            </a>

            <a href="{{ url('category?category=camera') }}" class="swiper-slide slide">
                <img src="{{ asset('assets/images/icon-3.png') }}" alt="">
                <h3>camera</h3>
            </a>

            <a href="{{ url('category?category=mouse') }}" class="swiper-slide slide">
                <img src="{{ asset('assets/images/icon-4.png') }}" alt="">
                <h3>mouse</h3>
            </a>

            <a href="{{ url('category?category=fridge') }}" class="swiper-slide slide">
                <img src="{{ asset('assets/images/icon-5.png') }}" alt="">
                <h3>fridge</h3>
            </a>

            <a href="{{ url('category?category=washing') }}" class="swiper-slide slide">
                <img src="{{ asset('assets/images/icon-6.png') }}" alt="">
                <h3>washing machine</h3>
            </a>

            <a href="{{ url('category?category=smartphone') }}" class="swiper-slide slide">
                <img src="{{ asset('assets/images/icon-7.png') }}" alt="">
                <h3>smartphone</h3>
            </a>

            <a href="{{ url('category?category=watch') }}" class="swiper-slide slide">
                <img src="{{ asset('assets/images/icon-8.png') }}" alt="">
                <h3>watch</h3>
            </a>
        </div>

        <div class="swiper-pagination"></div>
    </div>
</section>

<section class="home-products">
    <h1 class="heading">latest products</h1>
    <div class="swiper products-slider">
        <div class="swiper-wrapper">
            @if($products->count() > 0)
                @foreach($products as $product)
                    <form action="{{ route('addToCart') }}" method="post" class="swiper-slide slide">
                        @csrf
                        <input type="hidden" name="pid" value="{{ $product->id }}">
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <input type="hidden" name="image" value="{{ $product->image_01 }}">
                        <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
                        <a href="{{ url('quick_view', $product->id) }}" class="fas fa-eye"></a>
                        <img src="{{ asset('assets/uploaded_img/' . $product->image_01) }}" alt="">
                        <div class="name">{{ $product->name }}</div>
                        <div class="flex">
                            <div class="price"><span>$</span>{{ $product->price }}<span>/-</span></div>
                            <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
                        </div>
                        <input type="submit" value="add to cart" class="btn" name="add_to_cart">
                    </form>
                @endforeach
            @else
                <p class="empty">no products added yet!</p>
            @endif
        </div>

        <div class="swiper-pagination"></div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".home-slider", {
        loop:true,
        spaceBetween: 20,
        pagination: {
            el: ".swiper-pagination",
            clickable:true,
        },
    });

    var swiper = new Swiper(".category-slider", {
        loop:true,
        spaceBetween: 20,
        pagination: {
            el: ".swiper-pagination",
            clickable:true,
        },
        breakpoints: {
            0: {
                slidesPerView: 2,
            },
            650: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 4,
            },
            1024: {
                slidesPerView: 5,
            },
        },
    });

    var swiper = new Swiper(".products-slider", {
        loop:true,
        spaceBetween: 20,
        pagination: {
            el: ".swiper-pagination",
            clickable:true,
        },
        breakpoints: {
            550: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
    });
</script>
@endpush
