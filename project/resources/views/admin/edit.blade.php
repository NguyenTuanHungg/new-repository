@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Product</h4>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('update', ['id' => $products->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label>Category</label>
                    <select class="form-select" name="category_id">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $products->category->id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" class="form-control" value="{{$products->name}}" name="name">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" rows="3" class="form-control">{{$products->description}}</textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label for=""> Price</label>
                    <input type="number" class="form-control" value="{{$products->price}}" name="price" id="original_price">
                </div>

                {{-- <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{$products->status == '1' ? 'checked' : '' }} name="status">
            </div>

            <div class="col-md-6 mb-3">
                <label for="">Trending</label>
                <input type="checkbox" {{$products->trending == '1' ? 'checked' : '' }} name="trending" id="original_price">
            </div> --}}

            @if ($products->image)
            <img src="{{asset('assets/uploads/product/'.$products->image)}}" class="cate-image" alt="Category image">
            @endif

            <div class="col-md-12">
                <input type="file" name="image" class="form-control">
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </div>
    </form>
</div>
</div>
@endsection