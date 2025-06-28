@extends('layouts.app')

@section('title', ' - StyleHub')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="" class="text-gray-700 hover:text-gray-900">Home</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <span class="mx-2 text-gray-400">/</span>
                        <a href="" class="text-gray-700 hover:text-gray-900">Women</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <span class="mx-2 text-gray-400">/</span>
                        <span class="text-gray-500">Dresses</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Product Images -->
            <div>
                <div class="aspect-square bg-gray-100 rounded-lg overflow-hidden mb-4">
                    <img src="{{ asset('storage/' . $product->main_image) ?? 'https://via.placeholder.com/600x600/7FB069/FFFFFF?text=Product+Image' }}"
                        alt="" class="w-full h-full object-cover" id="main-product-image">
                </div>

                <!-- Thumbnail Images -->
                <div class="grid grid-cols-3 gap-4">
                    @php
                        $galleryImages = is_array($product->gallery_images)
                            ? $product->gallery_images
                            : json_decode($product->gallery_images, true) ?? [];
                    @endphp

                    @foreach ($galleryImages as $index => $image)
                        <div class="aspect-square bg-gray-100 rounded-lg overflow-hidden cursor-pointer hover:ring-2 hover:ring-pink-500"
                            onclick="changeMainImage('{{ asset('storage/' . $image) }}')">
                            <img src="{{ asset('storage/' . $image) }}" alt="Product view {{ $index + 1 }}"
                                class="w-full h-full object-cover">
                        </div>
                    @endforeach

                    <!-- Default thumbnails if no images -->
                    @if (empty($product->gallery_images))
                        <div
                            class="aspect-square bg-yellow-100 rounded-lg overflow-hidden cursor-pointer hover:ring-2 hover:ring-pink-500">
                            <img src="https://via.placeholder.com/200x200/F3E8A6/8B4513?text=View+1" alt="Product view 1"
                                class="w-full h-full object-cover">
                        </div>
                        <div
                            class="aspect-square bg-yellow-200 rounded-lg overflow-hidden cursor-pointer hover:ring-2 hover:ring-pink-500">
                            <img src="https://via.placeholder.com/200x200/DDD6A3/8B4513?text=View+2" alt="Product view 2"
                                class="w-full h-full object-cover">
                        </div>
                        <div
                            class="aspect-square bg-pink-100 rounded-lg overflow-hidden cursor-pointer hover:ring-2 hover:ring-pink-500">
                            <img src="https://via.placeholder.com/200x200/F8D7DA/8B4513?text=View+3" alt="Product view 3"
                                class="w-full h-full object-cover">
                        </div>
                    @endif
                </div>
            </div>

            <!-- Product Details -->
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $product->name ?? 'Elegant Evening Gown' }}</h1>

                <p class="text-gray-600 mb-6">
                    {{ $product->description ?? 'This stunning evening gown is perfect for any special occasion. Made from luxurious silk, it features a flattering silhouette and intricate detailing.' }}
                </p>

                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <!-- Color Selection -->
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-3">Color</h3>
                        <div class="flex space-x-3">
                            @foreach ($product->colors ?? ['black', 'white', 'blue'] as $color)
                                <label class="cursor-pointer">
                                    <input type="radio" name="color" value="{{ $color }}" class="sr-only"
                                        {{ $loop->first ? 'checked' : '' }}>
                                    <div
                                        class="w-8 h-8 rounded-full border-2 border-gray-300 hover:border-gray-400
                                        {{ $color === 'black' ? 'bg-black' : ($color === 'white' ? 'bg-white' : 'bg-blue-600') }}
                                        peer-checked:ring-2 peer-checked:ring-pink-500">
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Size Selection -->
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-3">Size</h3>
                        <div class="grid grid-cols-5 gap-3">
                            @foreach ($product->sizes ?? ['XS', 'S', 'M', 'L', 'XL'] as $size)
                                <label class="cursor-pointer">
                                    <input type="radio" name="size" value="{{ $size }}" class="sr-only"
                                        {{ $size === 'M' ? 'checked' : '' }}>
                                    <div
                                        class="border border-gray-300 rounded-md py-2 px-3 text-center hover:border-gray-400
                                        peer-checked:border-pink-500 peer-checked:bg-pink-50">
                                        {{ $size }}
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Price</span>
                            <span class="font-semibold">${{ number_format($product->price ?? 199.99, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Availability</span>
                            <span
                                class="text-green-600 font-medium">{{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">SKU</span>
                            <span class="text-gray-900">{{ $product->sku ?? 'SKU: 123456' }}</span>
                        </div>
                    </div>

                    <!-- Add to Cart Button -->
                    <button type="submit"
                        class="w-full bg-red-600 text-white py-3 px-6 rounded-md font-medium hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors duration-200"
                        {{ ($product->stock ?? 1) > 0 ? '' : 'disabled' }}>
                        Add to Cart
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function changeMainImage(imageSrc) {
            document.getElementById('main-product-image').src = imageSrc;
        }
    </script>
@endsection
