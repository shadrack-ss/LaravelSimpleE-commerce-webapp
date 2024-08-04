@extends('Components.layout')

@section('title', 'Products')
@section('dashboard_bar')
    Products
@endsection

@section('content')

@if (session('success'))
    <div class="alert">
        {{ session('success') }}
    </div>
@endif

<section class="show-products">
    <div class="heading-container">
        <h1 class="heading">Products Added</h1>
        <a href="/add_product" class="btn add-product-btn">Add Product</a>
    </div>
    @if($products->isEmpty())
        <p>No products found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td><img src="{{ asset('assets/uploaded/'.$product->image_01) }}" alt="Product Image" style="max-width: 100px; max-height: 100px;"></td>
                        <td>{{ \Illuminate\Support\Str::limit($product->name, 10, '...') }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($product->details, 10, '...') }}</td>
                        <td>
                            <a href='/view_product/{{ $product->id }}' class="option-btn">View</a>
                            <a href='/update_product/{{ $product->id }}' class="option-btn">Update</a>
                            <form action="/products/{{ $product->id }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Delete this product?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <style>
        body {
            background-color: #ddd;
        }

        .heading-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .add-products {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            background-color: #f3f3f3;
            padding: 0.5px 10px 10px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
            max-width: 800px;
            margin: 0 auto;
        }

        .add-products .heading {
            font-size: 24px;
            color: #333;
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
            margin: 3px 15px 3px 3px;
        }

        .add-products .inputBox span {
            font-size: 16px;
            color: #666;
        }

        .add-products .inputBox .box {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }
 
        .show-products {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 1500px;
            margin: 0 auto;
            width: 100%;
        }

        .show-products .heading {
            font-size: 24px;
            color: #333;
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

        .add-product-btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .add-product-btn:hover {
            background-color: #0056b3;
            color: #fff;
        }

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
</section>

@endsection
