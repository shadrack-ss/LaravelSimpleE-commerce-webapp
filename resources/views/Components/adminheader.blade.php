@if(session('message'))
    <div class="message">
        @foreach (session('message') as $message)
            <span>{{ $message }}</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        @endforeach
    </div>
@endif

<header class="header">
    <section class="flex">
        <a href='/dashboard' class="logo">Admin<span>Panel</span></a>

        <nav class="navbar">
            <a href='/admin/dashboard'>Home</a>
            <a href='/admin/create'>Products</a>
            <a href='/admin/orders'>Orders</a>
            <a href='/admin/admins'>Admins</a>
            <a href='/admin/users'>Users</a>
            <a href='/admin/messages'>Messages</a>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
        </div>

        <div class="profile">
            @php
                $admin = Auth::user();
            @endphp
            <p>{{ $admin->name }}</p>
            <a href='/updateProfile' class="btn">Update Profile</a>
            <div class="flex-btn">
                <a href='/register' class="option-btn">Register</a>
                <a href='/login'class="option-btn">Login</a>
            </div>
            <a href='/logout' class="delete-btn" onclick="return confirm('Logout from the website?');">Logout</a>
        </div>
    </section>
</header>
