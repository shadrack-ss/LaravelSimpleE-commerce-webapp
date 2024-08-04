@extends('Components.layout')

@section('title', 'Update Product')

@section('dashboard_bar')
    Update Product
@endsection

@section('content')

<style>
    /* Add the CSS here */
    .update-product {
        width: 100%;
        margin: auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .update-product .heading {
        text-align: center;
        font-size: 2rem;
        margin-bottom: 20px;
        color: #333;
    }

    .update-product .alert {
        color: #d9534f;
        font-size: 1rem;
        text-align: center;
        margin-bottom: 20px;
    }

    .update-product .image-container {
        display: flex;
        justify-content: space-around;
        margin-bottom: 20px;
    }

    .update-product .sub-image img {
        max-width: 100px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .update-product table {
        width: 100%;
        border-collapse: collapse;
    }

    .update-product th, .update-product td {
        padding: 10px;
        text-align: left;
    }

    .update-product th {
        width: 150px;
        font-weight: normal;
        color: #555;
    }

    .update-product .box {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
    }

    .update-product .btn, .update-product .option-btn {
        display: inline-block;
        padding: 10px 50px;
        font-size: 1rem;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        text-align: center;
    }

    .update-product .btn {
        background-color: #007bff;
    }

    .update-product .btn:hover {
        background-color: #0069d9;
    }

    .update-product .option-btn {
        background-color: #dc3545;
    }

    .update-product .option-btn:hover {
        background-color: #c82333;
    }

    .update-product .flex-btn {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

<section class="update-product">
    <h1 class="heading">Update Product</h1>

    @if(session('message'))
        <p class="alert">{{ session('message') }}</p>
    @endif

    <form action="/update_product/{{ $product->id }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="pid" value="{{ $product->id }}">
        <input type="hidden" name="old_image_01" value="{{ $product->image_01 }}">
        <input type="hidden" name="old_image_02" value="{{ $product->image_02 }}">
        <input type="hidden" name="old_image_03" value="{{ $product->image_03 }}">

        <table>
            <tr>
                <th>Current Images</th>
                <td class="image-container">
                    <div class="sub-image">
                        <img src="{{ asset('assets/uploaded/' . $product->image_01) }}" alt="Image 01">
                        <img src="{{ asset('assets/uploaded/' . $product->image_02) }}" alt="Image 02">
                        <img src="{{ asset('assets/uploaded/' . $product->image_03) }}" alt="Image 03">
                    </div>
                </td>
            </tr>
            <tr>
                <th><label for="name">Update Name</label></th>
                <td><input type="text" id="name" name="name" required class="box" maxlength="100" placeholder="Enter product name" value="{{ $product->name }}"></td>
            </tr>
            <tr>
                <th><label for="price">Update Price</label></th>
                <td><input type="number" id="price" name="price" required class="box" min="0" max="9999999999" placeholder="Enter product price" value="{{ $product->price }}"></td>
            </tr>
            <tr>
                <th><label for="details">Update Details</label></th>
                <td><textarea id="details" name="details" class="box" required>{{ $product->details }}</textarea></td>
            </tr>
            <tr>
                <th><label for="quantity">Update Quantity</label></th>
                <td><input type="number" id="quantity" name="quantity" required class="box" min="1" max="9999" placeholder="Enter product quantity" value="{{ $product->quantity }}"></td>
            </tr>
            <tr>
                <th><label for="image_01">Update Image 01</label></th>
                <td><input type="file" id="image_01" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box"></td>
            </tr>
            <tr>
                <th><label for="image_02">Update Image 02</label></th>
                <td><input type="file" id="image_02" name="image_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="box"></td>
            </tr>
            <tr>
                <th><label for="image_03">Update Image 03</label></th>
                <td><input type="file" id="image_03" name="image_03" accept="image/jpg, image/jpeg, image/png, image/webp" class="box"></td>
            </tr>
        </table>

        <div class="flex-btn">
            <input type="submit" class="btn" value="Update">
            <a href="/products" class="option-btn">Go Back</a>
        </div>
    </form>
</section>

@endsection
