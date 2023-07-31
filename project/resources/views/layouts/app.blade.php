
    <head>
    <title>Shopee-like Website</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Shopee</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                   
                </ul>
            </div>
            
            <!-- Giỏ hàng -->
            <a class="btn btn-outline-primary" href="#" role="button">
                <i class="fa fa-shopping-cart"></i> Giỏ hàng
            </a>
            
                    @if (Route::has('login'))
      <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
        
        <a href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" class="nav-link">Log out</a>
      @endauth
     </div>
    @endif
                    
            
        </div>
    </nav>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</body>