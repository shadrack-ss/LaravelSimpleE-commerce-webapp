@extends('Components.layout')
@section('title', 'Pdt-details')
@section('dashboard_bar')
    Product Details
@endsection
@section('content')


<section class="product-details" style="
padding-top:20px;
padding-left:20px;
padding-right:20px;

">
    <h1 class="heading">Product Details</h1>

    <div class="box">
        <div class="image-container">
            <div class="sub-image">
                <img src="{{ asset('assets/uploaded/'. $product->image_01) }}" style="max-width: 100px; max-height:100px;" alt="">
                <img src="{{ asset('assets/uploaded/'. $product->image_02) }}" style="max-width: 100px; max-height:100px;" alt="">
                <img src="{{ asset('assets/uploaded/'. $product->image_03) }}" style="max-width: 100px; max-height:100px;" alt="">
            </div>
        </div>
        <div class="details-container">
            <p><strong>Name:</strong> <span>{{ $product->name }}</span></p>
            <p><strong>Price:</strong> <span>UGX {{ $product->price }}</span></p>
            <p><strong>Details:</strong> <span>{{ $product->details }}</span></p>
        </div>
    </div>

    <div class="flex-btn">
        <a href="/update_product/{{$product->id}}" class="btn">Edit Product</a>
        <a href="/products" class="option-btn">Go Back</a>
    </div>
</section>

@endsection

