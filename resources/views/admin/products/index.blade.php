@extends('admin.layouts.app')

@section('title', 'Products - Admin Panel')

@section('content')
    <div class="products-container">
        <!-- Page Header -->
        <div class="page-header">
            <div class="page-title">
                <h1>Products</h1>
                <p>Manage your product inventory and listings</p>
            </div>
            <div class="page-actions">
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Add Product
                </a>
            </div>
        </div>

        <!-- Filters and Search -->
        <div class="filters-section">
            <div class="filters-card">
                <div class="filters-header">
                    <h3>Filters</h3>
                    <button class="btn btn-link" id="clearFilters">Clear All</button>
                </div>
                <div class="filters-content">
                    <div class="filter-group">
                        <label for="categoryFilter">Category</label>
                        <select id="categoryFilter" class="form-select">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="statusFilter">Status</label>
                        <select id="statusFilter" class="form-select">
                            <option value="">All Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="searchProducts">Search Products</label>
                        <div class="search-input-group">
                            <input type="text" id="searchProducts" class="form-input"
                                placeholder="Search by name, SKU...">
                            <button class="search-btn">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Table -->
        <div class="products-table-section">
            <div class="table-card">
                <div class="table-header">
                    <div class="table-title">
                        <h3>Products List</h3>
                        <span class="products-count">Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of
                            {{ $products->total() }} products</span>
                    </div>
                </div>

                <div class="table-content">
                    <div class="table-responsive">
                        <table class="products-table">
                            <thead>
                                <tr>
                                    <th>
                                        Sr.No
                                     </th>
                                    <th>Product</th>
                                    <th>SKU</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            <div class="product-info">
                                                <img src="{{ $product->main_image ? asset('storage/' . $product->main_image) : '/placeholder.svg' }}"
                                                    alt="Product" class="product-image">
                                                <div class="product-details">
                                                    <h6>{{ $product->name }}</h6>
                                                    <p>{{ $product->short_description ?? 'No description' }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="sku">{{ $product->sku }}</span></td>
                                        <td><span class="category">{{ $product->category->name ?? 'N/A' }}</span></td>
                                        <td><span class="price">${{ number_format($product->price, 2) }}</span></td>
                                        <td>
                                            <div class="stock-info">
                                                <span class="stock-number">{{ $product->stock }}</span>
                                                <span
                                                    class="stock-status {{ $product->stock > 0 ? 'in-stock' : 'out-of-stock' }}">{{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span
                                                class="status-badge {{ (bool) $product->is_active ? 'status-active' : 'status-inactive' }}">
                                                {{ (bool) $product->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="{{ route('admin.products.show', $product->id) }}"
                                                    class="action-btn view-btn" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                                    class="action-btn edit-btn" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-btn delete-btn" title="Delete"
                                                        data-id="{{ $product->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="table-footer">
                    <div class="pagination-info">
                        <span>Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of
                            {{ $products->total() }} results</span>
                    </div>
                    <div class="pagination">
                        {{ $products->links() }}
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
                <button class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('css/products.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('js/products.js') }}"></script>
    <script>
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const form = this.closest('form');
                const modal = document.getElementById('deleteModal');
                const confirmDelete = document.getElementById('confirmDelete');
                const cancelDelete = document.getElementById('cancelDelete');
                const closeModal = document.getElementById('closeModal');

                modal.style.display = 'block';

                confirmDelete.onclick = () => form.submit();
                cancelDelete.onclick = () => modal.style.display = 'none';
                closeModal.onclick = () => modal.style.display = 'none';
            });
        });
    </script>
@endpush
