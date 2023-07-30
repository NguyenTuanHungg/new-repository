@extends('layouts.app')

@section('content')
    <h1>Danh sách sản phẩm</h1>
    <a href="{{ route('add') }}" class="btn btn-primary">Thêm sản phẩm</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Danh muc san pham</th>
                <th>Ảnh</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{$product->category->name}}</td>
                    <td>
                        <img src="{{asset('assets/uploads/product/'.$product->image)}}" class="cate-image" alt="Image here" style="width:100px">
                    </td>
                    <td>
                        {{-- <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-primary">Sửa</a> --}}
                        <form action="{{ route('delete', ['id' => $product->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection