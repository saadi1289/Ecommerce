@extends('admin.layouts.app')

@section('title', 'Create Category - Admin Panel')

@section('content')
    <div class="create-category-container">
        <!-- Page Header -->
        <div class="page-header">
            <div class="page-title">
                <h1>Create New Category</h1>
                <p>Add a new category to organize your products</p>
            </div>
            <div class="page-actions">
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Back to Categories
                </a>
            </div>
        </div>

        <form action="{{ route('admin.categories.store') }}" method="POST" id="categoryForm">
            @csrf
            <div class="form-layout">
                <!-- Main Content -->
                <div class="form-main">
                    <!-- Basic Information -->
                    <div class="form-card">
                        <div class="card-header">
                            <h3>Category Information</h3>
                            <p>Enter the details of your category</p>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="name" class="form-label required">Category Name</label>
                                    <input type="text" id="name" name="name" class="form-input"
                                        placeholder="Enter category name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="form-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="description" name="description" class="form-textarea" rows="4"
                                        placeholder="Enter category description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="form-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <div class="checkbox-group">
                                        <label for="status" class="form-label required">Status</label>
                                        <select name="status" id="status" class="form-select">
                                            <option value="active" {{ old('status', true) ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="inactive" {{ old('status', false) ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                    </div>
                                    @error('status')
                                        <span class="form-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary btn-block"
                        style="
                                padding: 0.75rem;
                                border: 1px solid #e2e8f0;
                                border-radius: 0.5rem;
                                font-size: 0.875rem;
                                transition: all 0.2s;
                                background: #6b6fd5;
                            ">
                        <i class="fas fa-save"></i>
                        Save Category
                    </button>
                </div>

                <!-- Sidebar -->
                <div class="form-sidebar">
                    <!-- Action Buttons -->
                    <div class="form-actions">

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('css/products.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('js/products.js') }}"></script>
@endpush
