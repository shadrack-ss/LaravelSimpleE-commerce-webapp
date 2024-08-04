@extends('Components.layout')
@section('title', 'Add pdt')
@section('dashboard_bar')
    Add Products
@endsection
@section('content')
<section class="add-products" style="padding-top:10px;">
    <h1 class="heading">Add Product</h1>
    <form id="add-product-form" action='/products' method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex">
            <div class="inputBox">
                <span>Product Name (required)</span>
                <input type="text" class="box" maxlength="100" placeholder="Enter product name" name="name" required>
            </div>
            <div class="inputBox">
                <span>Product Price (required)</span>
                <input type="number" min="0" class="box" max="9999999999" placeholder="Enter product price" name="price" required>
            </div>
            <div class="inputBox">
                <span>Category (required)</span>
                <input type="text" class="box" maxlength="100" placeholder="Enter product category" name="category" required>
            </div>
            <div class="inputBox">
                <span>Quantity (required)</span>
                <input type="number" min="1" class="box" max="9999" placeholder="Enter product quantity" name="quantity" required>
            </div>
            <div class="inputBox">
                <span>Image 01 (required)</span>
                <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
            </div>
            <div class="inputBox">
                <span>Image 02 (required)</span>
                <input type="file" name="image_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
            </div>
            <div class="inputBox">
                <span>Image 03 (required)</span>
                <input type="file" name="image_03" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
            </div>
            <div class="inputBox">
                <span>Product Details (required)</span>
                <textarea name="details" placeholder="Enter product details" class="box" required maxlength="500"></textarea>
            </div>
        </div>
        <input type="submit" value="Add Product" class="btn">
        <a href="/products" class="btn" id="cancel-btn">Cancel</a>
    </form>
</section>

<style>
    body {
        background-color: #ddd;
    }

    /* Add Products Section */
    .add-products {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 20px;
        background-color: #f3f3f3;
        padding-top: 0.5px;
        padding-left: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 40px;
        max-width: 800px;
        margin: 0 auto;
    }

    .add-products .heading {
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
        text-align: center;
    }

    .add-products .flex {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .box {
        margin-top: 10px;
        margin-bottom: 0px;
    }

    .add-products .inputBox {
        flex: 1 1 45%;
        display: flex;
        flex-direction: column;
        margin-top: 3px;
        margin-bottom: 3px;
        margin-left: 3px;
        margin-right: 15px;
    }

    .add-products .inputBox span {
        font-size: 16px;
        color: #666;
        margin-top: 0px;
    }

    .add-products .inputBox .box {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
        width: 100%;
    }

    .add-products .btn {
        display: inline-block;
        width: 48%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        text-align: center;
        border-radius: 5px;
        text-decoration: none;
        margin-top: 20px;
        font-size: 16px;
        border: none;
        margin-right: 10px;
    }

    .add-products .btn:hover {
        background-color: #0056b3;
    }

    .add-products #cancel-btn {
        background-color: #dc3545;
    }

    .add-products #cancel-btn:hover {
        background-color: #c82333;
    }

    /* Show Products Section */
    .show-products {
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        max-width: 1200px;
        margin: 0 auto;
    }

    .show-products .heading {
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
        text-align: center;
    }

    .show-products table {
        width: 100%;
        border-collapse: collapse;
    }

    .show-products th, .show-products td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    .show-products th {
        background-color: #f9f9f9;
    }

    .show-products img {
        max-width: 100px;
        height: auto;
    }

    .show-products .option-btn,
    .show-products .delete-btn {
        padding: 5px 3px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 14px;
        color: #fff;
    }

    .show-products .option-btn {
        background-color: #007bff;
    }

    .show-products .option-btn:hover {
        background-color: #0056b3;
    }

    .show-products .delete-btn {
        background-color: #dc3545;
        border: none;
        cursor: pointer;
    }

    .show-products .delete-btn:hover {
        background-color: #c82333;
    }

    /* Media queries for responsiveness */
    @media (max-width: 768px) {
        .add-products .inputBox {
            flex: 1 1 100%;
        }
    }
</style>

<script>
    document.getElementById('cancel-btn').addEventListener('click', function() {
        document.getElementById('add-product-form').reset();
    });
</script>
@endsection
