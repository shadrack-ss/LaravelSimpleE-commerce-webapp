@extends('Components.layoutU')

@section('title', 'Contact')

@section('content')
<section class="contact">
    @if (session('message'))
        <p class="alert">{{ session('message') }}</p>
    @endif

    <form action="{{ route('contact.send') }}" method="post">
        @csrf
        <h3>Get in touch</h3>
        <input type="text" name="name" placeholder="Enter your name" required maxlength="20" class="box" value="{{ old('name') }}">
        @error('name')
            <p class="error">{{ $message }}</p>
        @enderror

        <input type="email" name="email" placeholder="Enter your email" required maxlength="50" class="box" value="{{ old('email') }}">
        @error('email')
            <p class="error">{{ $message }}</p>
        @enderror

        <input type="number" name="number" min="0" max="9999999999" placeholder="Enter your number" required class="box" value="{{ old('number') }}" onkeypress="if(this.value.length == 10) return false;">
        @error('number')
            <p class="error">{{ $message }}</p>
        @enderror

        <textarea name="msg" class="box" placeholder="Enter your message" cols="30" rows="10">{{ old('msg') }}</textarea>
        @error('msg')
            <p class="error">{{ $message }}</p>
        @enderror

        <input type="submit" value="Send Message" name="send" class="btn">
    </form>
</section>

@endsection
