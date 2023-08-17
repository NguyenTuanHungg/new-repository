@extends('layouts.app')

@section('content')


<div class="container">
    <div class="product-image">
        <img src="{{ asset('assets/uploads/product/'.$product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="width:200px">
    </div>
    <h1>{{ $product->name }}</h1>
    <p>Price: {{ $product->price }}</p>
    <p>Description: {{ $product->description }}</p>
    <p>Category:{{$product->category->name}}</p>
    <form method="POST" action="{{ route('addProduct') }}">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" value="1" min="1" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Add to cart</button>
    </form>
    <!-- Thêm các thông tin khác của sản phẩm -->
</div>
@endsection