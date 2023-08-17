@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <form method="POST" action="{{ route('addProduct') }}">

        <div class="row">
            <div class="col-md-3">
                <!-- Sidebar content goes here -->
            </div>
            <div class="col-md-9">
                <!-- Main content goes here -->
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="product-image">
                                <img src="{{ asset('assets/uploads/product/'.$product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                            </div>
                            <div class="card-body">
                                <a href="{{ route('product.show', $product->id) }}" style="text-decoration: none;color:black;">{{ $product->name }}</a>
                                <p class="card-text">{{ $product->price }}</p>
                                <form method="POST" action="{{ route('addProduct') }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="form-group">
                                        <input type="number" name="quantity" value="1" min="1" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Add to cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </form>

</div>
@endsection