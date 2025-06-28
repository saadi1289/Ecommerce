@extends('layouts.app')

@section('title', 'Home - E-Commerce Store')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Discover Amazing Products</h1>
                <p>Shop the latest trends and find everything you need in one place</p>
                <button class="btn btn-primary btn-large">Shop Now</button>
            </div>
            <div class="hero-image">
                <img src="/placeholder.svg?height=400&width=600" alt="Hero Image">
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories">
        <div class="container">
            <h2 class="section-title">Shop by Category</h2>
            <div class="category-grid">
                @foreach ($categories as $category)
                    <div class="category-card">
                        <img src="/placeholder.svg?height=200&width=200" alt="Electronics">
                        <h3>{{ $category->name }}</h3>
                        <p>{{ $category->description }}</p>
                    </div>
                @endforeach

                {{-- <div class="category-card">
                    <img src="/placeholder.svg?height=200&width=200" alt="Fashion">
                    <h3>Fashion</h3>
                    <p>Trendy clothing and accessories</p>
                </div>
                <div class="category-card">
                    <img src="/placeholder.svg?height=200&width=200" alt="Home">
                    <h3>Home & Garden</h3>
                    <p>Everything for your home</p>
                </div>
                <div class="category-card">
                    <img src="/placeholder.svg?height=200&width=200" alt="Sports">
                    <h3>Sports</h3>
                    <p>Fitness and outdoor gear</p>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="featured-products">
        <div class="container">
            <h2 class="section-title">Featured Products</h2>
            <div class="product-grid">
                @foreach($products as $product)
                <div class="product-card" data-product-id="{{ $product->id }}">
                    <div class="product-image">
                        <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->name }}">
                        <div class="product-overlay">
                            <button class="btn btn-primary add-to-cart-btn" onclick="addToCart({{ $product->id }}, '{{ addslashes($product->name) }}', {{ $product->price }}, '{{ asset('storage/' . $product->main_image) }}')">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </button>
                            <button class="btn btn-secondary quick-view-btn" onclick="quickView({{ $product->id }})">
                                <i class="fas fa-eye"></i> Quick View
                            </button>
                        </div>
                        @if($product->is_new)
                            <div class="product-badge">New</div>
                        @elseif($product->sale_price)
                            <div class="product-badge sale">Sale</div>
                        @endif
                    </div>
                    <div class="product-info">
                        <h3>
                            <a href="{{ route('product.details', $product->id) }}">{{ $product->name }}</a>
                        </h3>
                        <div class="product-rating">
                            {{-- You can add dynamic rating here --}}
                            <i class="fas fa-star"></i>
                            <span>({{ $product->rating ?? '4.5' }})</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">${{ $product->sale_price ?? $product->price }}</span>
                            @if($product->sale_price)
                            <span class="original-price">${{ $product->price }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section">
        <div class="container">
            <div class="newsletter-content">
                <h2>Stay Updated</h2>
                <p>Subscribe to our newsletter and get 10% off your first order</p>
                <div class="newsletter-form">
                    <input type="email" placeholder="Enter your email">
                    <button class="btn btn-primary">Subscribe</button>
                </div>
            </div>
        </div>
    </section>
@endsection
