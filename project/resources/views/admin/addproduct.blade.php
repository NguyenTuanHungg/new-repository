@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Product</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('insert') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <select class="form-select" name="category_id" aria-label="Default select example">
                        <option selected>Select category</option>
                        @foreach ($categories as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">@error('category_id') {{$message}} @enderror</span>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name">
                    <span class="text-danger">@error('name') {{$message}} @enderror</span>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" rows="3" class="form-control"></textarea>
                    <span class="text-danger">@error('description') {{$message}} @enderror</span>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Price</label>
                    <input type="number" class="form-control" name="price" id="price">
                    <span class="text-danger">@error('price') {{$message}} @enderror</span>
                </div>


                <div class="col-md-12">
                    <input type="file" name="image" class="form-control">
                    <span class="text-danger">@error('image') {{$message}} @enderror</span>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
