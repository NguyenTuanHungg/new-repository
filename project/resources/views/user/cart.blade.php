@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <!-- Sidebar content goes here -->
        </div>
        <div class="col-md-9">
            <!-- Main content goes here -->
            <div class="text-center mb-4">
                <h2 class="section-title px-5"><span class="px-2">Cart</span></h2>
            </div>
            
            @if($countCart > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td class="align-middle"><img src="{{ asset('assets/uploads/product/' . $item->product->image) }}" alt="" style="width: 100px;"></td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->product->price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->product->price * $item->quantity }}</td>
                        <td>

                        </td>
                    </tr>
                    @php
                    $itemId = $item->id;
                    @endphp
                    <div class="input-group">
                        <button type="button" class="btn btn-sm btn-secondary" onclick="updateQuantity({ $itemId}, 'decrease')">-</button>
                        <input type="text" class="form-control text-center" value="{{ $item->quantity }}" disabled>
                        <button type="button" class="btn btn-sm btn-secondary" onclick="updateQuantity({ $itemId }, 'increase')">+</button>
                    </div>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="text-center">Your cart is empty.</p>
            @endif

            <div class="text-right mt-4">
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    function updateQuantity(productId, action) {
        // Gửi request AJAX đến server để cập nhật số lượng sản phẩm
        $.ajax({
            method: "POST",
            data: {
                productId: productId,
                action: action,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                // Cập nhật lại số lượng sản phẩm trong giao diện
                // (nếu muốn tự cập nhật số lượng mới thì update trực tiếp dữ liệu trong giao diện)
                location.reload();
            },
            error: function() {
                alert('Có lỗi xảy ra. Vui lòng thử lại sau.');
            }
        });
    }
</script>