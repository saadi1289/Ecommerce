@extends('admin.layouts.app')

@section('title', 'Coupons - Admin Panel')

@section('content')
    <div class="products-container">
        <!-- Page Header -->
        <div class="page-header">
            <div class="page-title">
                <h1>Coupons</h1>
                <p>Manage your product coupons</p>
            </div>
            <div class="page-actions">
                <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Add Coupon
                </a>
            </div>
        </div>

        <!-- Filters and Search -->
        {{-- <div class="filters-section">
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
                        <input type="text" id="searchProducts" class="form-input" placeholder="Search by name, SKU...">
                        <button class="search-btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

        <!-- Products Table -->
        <div class="products-table-section">
            <div class="table-card">
                <div class="table-header">
                    <div class="table-title">
                        <h3>Coupons List</h3>
                        <span class="products-count">Showing {{ $coupons->firstItem() }} to {{ $coupons->lastItem() }}
                            of {{ $coupons->total() }} coupons</span>
                    </div>
                </div>

                <div class="table-content">
                    <div class="table-responsive">
                        <table class="products-table">
                            <thead>
                                <tr>
                                    <th>
                                        Sr. No.
                                    </th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Type</th>
                                    <th>Value</th>
                                    <th>Expires At</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $coupon)
                                    <tr>

                                        <td>
                                            <div class="product-info">
                                                {{ $loop->iteration }}
                                            </div>
                                        </td>
                                        <td><span class="name">{{ $coupon->name }}</span></td>
                                        <td><span class="code">{{ $coupon->code }}</span></td>
                                        <td><span class="type">{{ $coupon->type }}</span></td>
                                        <td><span class="value">{{ $coupon->value }}</span></td>
                                        <td><span class="expires-at">{{ $coupon->expires_at }}</span></td>
                                        <td>
                                            <span
                                                class="status-badge {{ $coupon->is_active ? 'status-active' : 'status-inactive' }}">{{ $coupon->is_active ? 'Active' : 'Inactive' }}</span>
                                        </td>


                                        <td>
                                            <div class="action-buttons">

                                                <a href="{{ route('admin.coupons.edit', $coupon->id) }}"
                                                    class="action-btn edit-btn" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.coupons.destroy', $coupon->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-btn delete-btn" title="Delete"
                                                        data-id="{{ $coupon->id }}">
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
                        <span>Showing {{ $coupons->firstItem() }} to {{ $coupons->lastItem() }} of
                            {{ $coupons->total() }} results</span>
                    </div>
                    <div class="pagination">
                        {{ $coupons->links() }}
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
                <p>Are you sure you want to delete this category? This action cannot be undone.</p>
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
