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
                        <a href="/products" class="btn">shop now</a>
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
            <a href="{{ url('category?category=laptops') }}" class="swiper-slide slide" style=" border:none;">
                <img src="{{ asset('assets/images/icon-1.png') }}" alt="">
                <h3>Laptops</h3>
            </a>

            <a href="{{ url('category?category=electronics') }}" class="swiper-slide slide" style=" border:none;">
                <img src="{{ asset('assets/images/icon-2.png') }}" alt="">
                <h3>Electronics</h3>
            </a>

            <a href="{{ url('category?category=supermarket') }}" class="swiper-slide slide" style=" border:none;">
                <img src="{{ asset('assets/images/icon-3.png') }}" alt="">
                <h3>Supermarket</h3>
            </a>

            <a href="{{ url('category?category=heathy_and_beauty') }}" class="swiper-slide slide" style=" border:none;">
                <img src="{{ asset('assets/images/icon-4.png') }}" alt="">
                <h3>Heathy and Beauty</h3>
            </a>

            <a href="{{ url('category?category=big appliances') }}" class="swiper-slide slide" style=" border:none;">
                <img src="{{ asset('assets/images/icon-5.png') }}" alt="">
                <h3>Big Appliances</h3>
            </a>

            <a href="{{ url('category?category=furniture') }}" class="swiper-slide slide" style=" border:none;">
                <img src="{{ asset('assets/images/icon-6.png') }}" alt="">
                <h3>Furniture</h3></a>

            <a href="{{ url('category?category=phones_and_tablets') }}" class="swiper-slide slide" style=" border:none;">
                <img src="{{ asset('assets/images/icon-7.png') }}" alt="">
                <h3>Phones and Tablets</h3>
            </a>

            <a href="{{ url('category?category=fashion') }}" class="swiper-slide slide" style=" border:none;">
                <img src="{{ asset('assets/images/icon-8.png') }}" alt="">
                <h3>Fashion</h3>
            </a>
        </div>

        <div class="swiper-pagination"></div>
    </div>
</section>

<section class="home-products">

    <h1 class="heading">latest products</h1>
            <!-- Display flash messages -->
            <style>
    .alert {
        font-size: 20px;
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }
</style>
            @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="swiper products-slider">
        <div class="swiper-wrapper">
            @if($products->count() > 0)
                @foreach($products as $product)
                    <form action="{{ route('addToCart') }}" method="post" class="swiper-slide slide" style=" border:none;">
                        @csrf
                        <input type="hidden" name="pid" value="{{ $product->id }}">
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <input type="hidden" name="image" value="{{ $product->image_01 }}">
                        <button class="fas fa-heart" type="submit" name="add_to_wishlist" formaction='/add_to_wishlist' style=" border:none;"></button>
                        <a href="{{ url('quick_view', $product->id) }}" class="fas fa-eye" style=" border:none;"></a>
                        <img src="{{ asset('assets/uploaded/' . $product->image_01) }}" alt="">
                        <div class="name">{{ \Illuminate\Support\Str::limit($product->name, 60, '...') }}</div>
                        <div class="flex">
                            <div class="price"><span>UGX </span>{{ $product->price }}<span>/-</span></div>
                            <input type="number" name="quantity" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
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
