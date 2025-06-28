@extends('admin.layouts.app')

@section('title', 'Product Details - Admin Panel')

@section('content')
<div class="product-detail-container">
    <!-- Page Header -->
    <div class="page-header">
        <div class="page-title">
            <h1>Product Details</h1>
            <p>View detailed information about the product</p>
        </div>
        <div class="page-actions">

            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i>
                Back to Products
            </a>

        </div>
    </div>

    <!-- Product Details -->
    <div class="product-detail-section">
        <div class="detail-card">
            <div class="detail-header">
                <h3>{{ $product->name }}</h3>
                <span class="status-badge {{ $product->is_active ? 'status-active' : 'status-inactive' }}">
                    {{ $product->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
            <div class="detail-content">
                <div class="detail-grid">
                    <!-- SKU -->
                    <div class="detail-box">
                        <label>SKU</label>
                        <p>{{ $product->sku }}</p>
                    </div>
                    <!-- Category -->
                    <div class="detail-box">
                        <label>Category</label>
                        <p>{{ $product->category->name ?? 'N/A' }}</p>
                    </div>
                    <!-- Price -->
                    <div class="detail-box">
                        <label>Price</label>
                        <p>${{ number_format($product->price, 2) }}</p>
                    </div>
                    <!-- Sale Price -->
                    <div class="detail-box">
                        <label>Sale Price</label>
                        <p>{{ $product->sale_price ? '$' . number_format($product->sale_price, 2) : 'N/A' }}</p>
                    </div>
                    <!-- Stock -->
                    <div class="detail-box">
                        <label>Stock</label>
                        <p>
                            {{ $product->stock }}
                            <span class="stock-status {{ $product->stock > 0 ? 'in-stock' : 'out-of-stock' }}">
                                {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                            </span>
                        </p>
                    </div>
                    <!-- Visibility -->
                    <div class="detail-box">
                        <label>Visibility</label>
                        <p>{{ ucfirst($product->visibility ?? 'public') }}</p>
                    </div>
                    <!-- Color -->
                    <div class="detail-box">
                        <label>Color</label>
                        <p>{{ $product->color ?? 'N/A' }}</p>
                    </div>
                    <!-- Size -->
                    <div class="detail-box">
                        <label>Size</label>
                        <p>{{ $product->size ?? 'N/A' }}</p>
                    </div>
                    <!-- Tags -->
                    <div class="detail-box full-width">
                        <label>Tags</label>
                        <p>
                            @php
                                $tags = [];
                                if ($product->tags) {
                                    $decoded = json_decode($product->tags, true);
                                    if (is_array($decoded)) {
                                        $tags = $decoded;
                                    }
                                }
                            @endphp
                            @if(count($tags))
                                @foreach($tags as $tag)
                                    <span class="badge badge-secondary">{{ $tag }}</span>
                                @endforeach
                            @else
                                N/A
                            @endif
                        </p>
                    </div>
                    <!-- Main Image -->
                    <div class="detail-box full-width">
                        <label>Main Image</label>
                        <div class="product-image-container">
                            <img src="{{ $product->main_image ? asset('storage/' . $product->main_image) : '/placeholder.svg' }}"
                                 alt="Main Product Image"
                                 class="product-main-image">
                        </div>
                    </div>
                    <!-- Gallery Images -->
                    <div class="detail-box full-width">
                        <label>Gallery Images</label>
                        <div class="gallery-images">
                            @if($product->gallery_images && is_array(json_decode($product->gallery_images)))
                                @foreach(json_decode($product->gallery_images) as $image)
                                    <img src="{{ asset('storage/' . $image) }}"
                                         alt="Gallery Image"
                                         class="gallery-image">
                                @endforeach
                            @else
                                <p>No gallery images available</p>
                            @endif
                        </div>
                    </div>
                    <!-- Short Description -->
                    <div class="detail-box full-width">
                        <label>Short Description</label>
                        <p>{{ $product->short_description ?? 'No short description available' }}</p>
                    </div>
                    <!-- Full Description -->
                    <div class="detail-box full-width">
                        <label>Full Description</label>
                        <p>{!! $product->description ?? 'No description available' !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal" id="deleteModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Confirm Delete</h3>
                <button class="modal-close" id="closeModal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this product? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="cancelDelete">Cancel</button>
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" id="confirmDelete">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('css/products.css') }}" rel="stylesheet">
<style>
.product-detail-container {
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
}
.detail-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    padding: 20px;
    margin-bottom: 20px;
}
.detail-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
    border-bottom: 2px solid #f0f0f0;
    background: #fafafa;
    border-radius: 12px 12px 0 0;
}
.detail-header h3 {
    margin: 0;
    font-size: 1.8rem;
    color: #333;
}
.detail-content {
    padding: 20px;
}
.detail-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}
.detail-box {
    background: #f8f9fa;
    border-radius: 8px;
    padding: 15px;
    border: 1px solid #e0e0e0;
}
.detail-box.full-width {
    grid-column: span 2;
}
.detail-box label {
    font-weight: 600;
    display: block;
    margin-bottom: 8px;
    color: #444;
}
.detail-box p {
    margin: 0;
    color: #666;
}
.product-main-image {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
}
.gallery-images {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}
.gallery-image {
    max-width: 120px;
    height: auto;
    border-radius: 8px;
    border: 1px solid #ddd;
}
.status-badge {
    padding: 5px 10px;
    border-radius: 12px;
    font-size: 0.9rem;
}
.status-active {
    background: #d4edda;
    color: #155724;
}
.status-inactive {
    background: #f8d7da;
    color: #721c24;
}
.stock-status {
    font-size: 0.85rem;
    padding: 3px 8px;
    border-radius: 10px;
}
.in-stock {
    background: #d4edda;
    color: #155724;
}
.out-of-stock {
    background: #f8d7da;
    color: #721c24;
}
.badge-secondary {
    background: #6c757d;
    color: #fff;
    padding: 5px 10px;
    border-radius: 12px;
    margin-right: 5px;
}
.btn-danger {
    background: #dc3545;
    border: none;
}
.btn-danger:hover {
    background: #c82333;
}
</style>
@endpush

@push('scripts')
<script src="{{ asset('js/products.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteBtn = document.querySelector('.delete-btn');
        const modal = document.getElementById('deleteModal');
        const confirmDelete = document.getElementById('confirmDelete');
        const cancelDelete = document.getElementById('cancelDelete');
        const closeModal = document.getElementById('closeModal');

        deleteBtn.addEventListener('click', function(e) {
            e.preventDefault();
            modal.style.display = 'block';
        });

        cancelDelete.addEventListener('click', () => modal.style.display = 'none');
        closeModal.addEventListener('click', () => modal.style.display = 'none');
    });
</script>
@endpush
