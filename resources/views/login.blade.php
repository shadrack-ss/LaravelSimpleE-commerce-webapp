@extends('Components.layoutU')

@section('title', 'Login | Luca')

@section('content')
    <section class="form-container">
        @if($errors->any())
            <div class="message">
                @foreach ($errors->all() as $error)
                    <span>{{ $error }}</span>
                    <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                @endforeach
            </div>
        @endif

        <form action='/login' method="POST">
            @csrf
            <h3>Login Now</h3>
            <input type="email" name="email" required placeholder="Enter your email" maxlength="50" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="password" name="password" required placeholder="Enter your password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="submit" value="Login Now" class="btn">
            <p>Don't have an account?</p>
            <a href='/register' class="option-btn">Register now</a>
        </form>
    </section>

    <script src="{{ asset('js/script.js') }}"></script>
@endsection
