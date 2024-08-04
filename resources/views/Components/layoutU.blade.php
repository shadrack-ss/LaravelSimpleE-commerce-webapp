<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('title')</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}">
</head>
<body>

@include('components.user_header')

@yield('content')

@include('components.footer')

<script src="{{ asset('assets/js/swiper-bundle.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
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
</body>
</html>
