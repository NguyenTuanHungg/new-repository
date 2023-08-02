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
                @csrf
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="number" name="quantity" value="1" min="1">
                            <img src="{{asset('assets/uploads/product/'.$product->image)}}" class="card-img-top" alt="{{ $product->name }}" style="width: 200px;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->price }}</p>
                                <button type="submit" class="btn btn-primary">Add to cart</button>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </form>

</div>
@endsection