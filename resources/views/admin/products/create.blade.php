@extends('admin.layouts.app')

@section('title', 'Create Product - Admin Panel')

@section('content')
    <div class="create-product-container">
        <!-- Page Header -->
        <div class="page-header">
            <div class="page-title">
                <h1>Create New Product</h1>
                <p>Add a new product to your inventory</p>
            </div>
            <div class="page-actions">
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Back to Products
                </a>
            </div>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" id="productForm">
            @csrf
            <div class="form-layout">
                <!-- Main Content -->
                <div class="form-main">
                    <!-- Basic Information -->
                    <div class="form-card">
                        <div class="card-header">
                            <h3>Basic Information</h3>
                            <p>Enter the basic details of your product</p>
                        </div>
                        <div class="error-message"
                            style="background-color: red; color: white; padding: 10px; border-radius: 5px; display: none;">
                            <strong>Error!</strong> Please fix the errors below.
                            @if ($errors->any())
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="name" class="form-label required">Product Name</label>
                                    <input type="text" id="name" name="name" class="form-input"
                                        placeholder="Enter product name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="form-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="sku" class="form-label required">SKU</label>
                                    <input type="text" id="sku" name="sku" class="form-input"
                                        placeholder="Enter SKU" value="{{ old('sku') }}" required>
                                    @error('sku')
                                        <span class="form-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="description" name="description" class="form-textarea" rows="4"
                                        placeholder="Enter product description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="form-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="short_description" class="form-label">Short Description</label>
                                    <textarea id="short_description" name="short_description" class="form-textarea" rows="2"
                                        placeholder="Brief product summary">{{ old('short_description') }}</textarea>
                                    @error('short_description')
                                        <span class="form-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Images -->
                    <div class="form-card">
                        <div class="card-header">
                            <h3>Product Images</h3>
                            <p>Upload high-quality images of your product</p>
                        </div>
                        <div class="card-body">
                            <div class="image-upload-section">
                                <div class="main-image-upload">
                                    <label class="form-label">Main Product Image</label>
                                    <div class="image-upload-area" id="mainImageUpload">
                                        <div class="upload-placeholder">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <h4>Upload Main Image</h4>
                                            <p>Drag and drop or click to select</p>
                                            <span class="upload-specs">Recommended: 800x800px, Max: 5MB</span>
                                        </div>
                                        <input type="file" id="main_image" name="main_image" accept="image/*" hidden>
                                    </div>
                                    <div class="image-preview" id="mainImagePreview" style="display: none;">
                                        <img src="/placeholder.svg" alt="Main product image">
                                        <button type="button" class="remove-image" id="removeMainImage">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="gallery-images-upload">
                                    <label class="form-label">Gallery Images</label>
                                    <div class="gallery-upload-grid" id="galleryUpload">
                                        <div class="gallery-upload-item">
                                            <div class="upload-placeholder">
                                                <i class="fas fa-plus"></i>
                                                <span>Add Image</span>
                                            </div>
                                            <input type="file" name="gallery_images[]" accept="image/*" hidden multiple>
                                        </div>
                                    </div>
                                    <span class="form-help">You can upload up to 5 additional images</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pricing & Inventory -->
                    <div class="form-card">
                        <div class="card-header">
                            <h3>Pricing & Inventory</h3>
                            <p>Set pricing and manage inventory</p>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="price" class="form-label required">Regular Price</label>
                                    <div class="input-group">
                                        <span class="input-prefix">$</span>
                                        <input type="number" id="price" name="price" class="form-input"
                                            placeholder="0.00" step="0.01" min="0"
                                            value="{{ old('price') }}" required>
                                    </div>
                                    @error('price')
                                        <span class="form-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sale_price" class="form-label">Sale Price</label>
                                    <div class="input-group">
                                        <span class="input-prefix">$</span>
                                        <input type="number" id="sale_price" name="sale_price" class="form-input"
                                            placeholder="0.00" step="0.01" min="0"
                                            value="{{ old('sale_price') }}">
                                    </div>
                                    @error('sale_price')
                                        <span class="form-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="stock" class="form-label required">Stock Quantity</label>
                                    <input type="number" id="stock" name="stock" class="form-input"
                                        placeholder="0" min="0" value="{{ old('stock') }}" required>
                                    @error('stock')
                                        <span class="form-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div class="form-card">
                        <div class="card-header">
                            <h3>Product Details</h3>
                            <p>Additional product attributes</p>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="color" class="form-label">Color</label>
                                    <input type="text" id="color" name="color" class="form-input"
                                        placeholder="Enter color" value="{{ old('color') }}">
                                    @error('color')
                                        <span class="form-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="size" class="form-label">Size</label>
                                    <input type="text" id="size" name="size" class="form-input"
                                        placeholder="Enter size" value="{{ old('size') }}">
                                    @error('size')
                                        <span class="form-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="form-sidebar">
                    <!-- Publish Settings -->
                    <div class="form-card">
                        <div class="card-header">
                            <h3>Publish Settings</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="visibility" class="form-label">Visibility</label>
                                <select id="visibility" name="visibility" class="form-select">
                                    <option value="public" {{ old('visibility') == 'public' ? 'selected' : '' }}>Public
                                    </option>
                                    <option value="private" {{ old('visibility') == 'private' ? 'selected' : '' }}>Private
                                    </option>
                                </select>
                                @error('visibility')
                                    <span class="form-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="checkbox-group" style="margin-top: 10px;">

                                    <label for="is_active" class="checkbox-label">Active</label>
                                    <select name="is_active" id="is_active" class="form-select">
                                        <option value="1" {{ old('is_active', true) ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ old('is_active', false) ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                </div>
                                @error('is_active')
                                    <span class="form-error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="form-card">
                        <div class="card-header">
                            <h3>Categories</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="category_id" class="form-label required">Primary Category</label>
                                <select id="category_id" name="category_id" class="form-select" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="form-error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="form-card">
                        <div class="card-header">
                            <h3>Tags</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="tags" class="form-label">Product Tags</label>
                                <input type="text" id="tags" name="tags[]" class="form-input"
                                    placeholder="Enter tags" value="{{ old('tags') ? implode(',', old('tags')) : '' }}">
                                <span class="form-help">Enter tags separated by commas</span>
                                @error('tags')
                                    <span class="form-error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="form-actions">
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
                            Save Product
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('css/products.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('js/products.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.min.js"></script>
    <script>
        const input = document.querySelector('#tags');
        new Tagify(input, {
            delimiters: ',',
            originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
        });

        // Image preview for main image
    </script>
@endpush
