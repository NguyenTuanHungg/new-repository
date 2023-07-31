@extends('layouts.app')

@section('content')
<div class="container mt-4">
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
                        <img src="{{asset('assets/uploads/product/'.$product->image)}}" class="card-img-top" alt="{{ $product->name }}" style="width: 200px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->price }}</p>
                            <form method="POST" action="{{ route('addProduct') }}" enctype="multipart/form-data">
                                @csrf
                                <button class="btn btn-primary">Add to cart</button>
                            </form>
                        </div>s
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection