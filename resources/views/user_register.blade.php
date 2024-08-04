@extends('Components.layoutU')

@section('title', 'Register')

@section('content')
<section class="form-container">
    @if(session('success'))
        <div class="message">
            <span>{{ session('success') }}</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
    @endif

    @if($errors->any())
        <div class="message">
            @foreach ($errors->all() as $error)
                <span>{{ $error }}</span>
                <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            @endforeach
        </div>
    @endif

    <form action="/store" method="POST">
        @csrf
        <h3>Register Now</h3>
        <input type="text" name="name" required placeholder="Enter your username" maxlength="20" class="box">
        <input type="email" name="email" required placeholder="Enter your email" maxlength="50" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
        <input type="password" name="password" required placeholder="Enter your password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
        <input type="password" name="password_confirmation" required placeholder="Confirm your password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
        <input type="submit" value="Register Now" class="btn">
        <p>Already have an account?</p>
        <a href='/login' class="option-btn">Login now</a>
    </form>
</section>
<script src="{{ asset('assets/js/script.js') }}"></script>
@endsection
