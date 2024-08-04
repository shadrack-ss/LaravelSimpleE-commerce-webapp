@extends('Components.layoutU')

@section('title', 'Search Page')

@section('content')

<section class="search-form">
    <form action="/searching" method="post">
        @csrf
        <input type="text" name="search_box" placeholder="Search here..." maxlength="100" class="box" required>
        <button type="submit" class="fas fa-search" name="search_btn"></button>
    </form>
</section>

@endsection
