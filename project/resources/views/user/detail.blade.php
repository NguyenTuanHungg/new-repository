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

    @php
    $rating_value = $exist_rate->stars_rated;
    $round_rate = number_format($rating_value) @endphp
    @for ($i = 1; $i <= $round_rate; $i ++) <span class="star">&#9733;</span>
        @endfor
        @for ($j = $round_rate + 1; $j <= 5; $j ++) <span class="star">&#9733;</span>
            @endfor
            <form method="POST" action="{{ route('addProduct') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" value="1" min="1" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Add to cart</button>

            </form>
            <button type="button" class="btn btn-primary" id="openReviewModal">
                Đánh giá sản phẩm
            </button>

            <!-- Review Dialog Modal -->
            <div class="modal" id="reviewModal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close" id="closeReviewModal">&times;</span>

                    <form action="{{route('rating')}}" method="GET">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <!-- Star rating input -->
                        <div class="rating">
                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
                        </div>
                        <!-- Review content input -->
                        <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
                    </form>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    // Get references to the review modal and open button
                    const reviewModal = document.getElementById("reviewModal");
                    const openReviewModalBtn = document.getElementById("openReviewModal");
                    const closeReviewModalBtn = document.getElementById("closeReviewModal");

                    // Open the review modal when the open button is clicked
                    openReviewModalBtn.addEventListener("click", () => {
                        reviewModal.style.display = "block";
                    });

                    // Close the review modal when the close button is clicked
                    closeReviewModalBtn.addEventListener("click", () => {
                        reviewModal.style.display = "none";
                    });

                    // Close the review modal when clicking outside the modal
                    window.addEventListener("click", (event) => {
                        if (event.target === reviewModal) {
                            reviewModal.style.display = "none";
                        }
                    });
                });
            </script>
            <!-- Thêm các thông tin khác của sản phẩm -->
</div>
@endsection