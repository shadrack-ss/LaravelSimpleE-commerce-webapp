<header class="header">
   <section class="flex">
      <a href="/" class="logo">Luca<span>.</span></a>
      <nav class="navbar">
         <a href="/">Home</a>
         <a href="/about">About</a>
         <a href="/orders">Orders</a>
         <a href="/shop">Products</a>
         <a href="/contact">Contact</a>
      </nav>
      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <a href="/search"><i class="fas fa-search"></i></a>
         <a href="/wishlist"><i class="fas fa-heart"></i><span>({{ $totalWishlistCount }})</span></a>
         <a href="/cart"><i class="fas fa-shopping-cart"></i><span>({{ $totalCartCount }})</span></a>
         <div id="user-btn" class="fas fa-user"></div>
      </div>
      <div class="profile">
            @auth
                <a href="/profile/update" class="btn">update profile</a>
                <div class="flex-btn">
                    <a href="/register" class="option-btn">register</a>
                    <a href="/login" class="option-btn">login</a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="/logout" class="delete-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a>
            @else
                <p>please login or register first!</p>
                <div class="flex-btn">
                    <a href="/register" class="option-btn">register</a>
                    <a href="/login" class="option-btn">login</a>
                </div>
            @endauth
        </div>
      </div>
   </section>
</header>
