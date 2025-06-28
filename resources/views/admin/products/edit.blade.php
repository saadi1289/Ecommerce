@extends('admin.layouts.app')

@section('title', 'Edit Product - Admin Panel')

@section('content')
    <div class="create-product-container">
        <!-- Page Header -->
        <div class="page-header">
            <div class="page-title">
                <h1>Edit Product</h1>
                <p>Update product details</p>
            </div>
            <div class="page-actions">
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Back to Products
                </a>
            </div>
        </div>

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
            id="productForm">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="alert alert-danger" style="margin-bottom: 1rem;">
                    <ul style="margin: 0;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-layout">
                <!-- Main Content -->
                <div class="form-main">
                    <!-- Basic Information -->
                    <div class="form-card">
                        <div class="card-header">
                            <h3>Basic Information</h3>
                            <p>Enter the basic details of your product</p>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="name" class="form-label required">Product Name</label>
                                    <input type="text" id="name" name="name" class="form-input"
                                        placeholder="Enter product name" value="{{ old('name', $product->name) }}" required>
                                    @error('name')
                                        <span class="form-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="sku" class="form-label required">SKU</label>
                                    <input type="text" id="sku" name="sku" class="form-input"
                                        placeholder="Enter SKU" value="{{ old('sku', $product->sku) }}" required>
                                    @error('sku')
                                        <span class="form-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="description" name="description" class="form-textarea" rows="4"
                                        placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>
                                    @error('description')
                                        <span class="form-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="short_description" class="form-label">Short Description</label>
                                    <textarea id="short_description" name="short_description" class="form-textarea" rows="2"
                                        placeholder="Brief product summary">{{ old('short_description', $product->short_description) }}</textarea>
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
                                        </div>
                                        <input type="file" id="main_image" name="main_image" accept="image/*" hidden>
                                    </div>
                                    <div class="image-preview" id="mainImagePreview"
                                        style="{{ $product->main_image ? 'display: block;' : 'display: none;' }}">
                                        <img src="{{ $product->main_image ? asset('storage/' . $product->main_image) : '/placeholder.svg' }}"
                                            alt="Main product image">
                                        <button type="button" class="remove-image" id="removeMainImage">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                    @error('main_image')
                                        <span class="form-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="gallery-images-upload">
                                    <label class="form-label">Gallery Images</label>
                                    <div class="gallery-upload-grid" id="galleryUpload">
                                        @if ($product->gallery_images)
                                            @foreach (json_decode($product->gallery_images, true) as $image)
                                                <div class="gallery-upload-item">
                                                    <img src="{{ asset('storage/' . $image) }}" alt="Gallery image"
                                                        style="
                                                            width: -webkit-fill-available;
                                                        ">
                                                    <button type="button" class="remove-image"
                                                        data-image="{{ $image }}">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            @endforeach
                                        @endif
                                        <div class="gallery-upload-item">
                                            <div class="upload-placeholder">
                                                <i class="fas fa-plus"></i>
                                                <span>Add Image</span>
                                            </div>
                                            <input type="file" name="gallery_images[]" accept="image/*" multiple hidden>
                                        </div>
                                    </div>
                                    <input type="hidden" name="removed_gallery_images" id="removedGalleryImages"
                                        value="[]">
                                    @error('gallery_images.*')
                                        <span class="form-error">{{ $message }}</span>
                                    @enderror
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
                                            value="{{ old('price', $product->price) }}" required>
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
                                            value="{{ old('sale_price', $product->sale_price) }}">
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
                                        placeholder="0" min="0" value="{{ old('stock', $product->stock) }}"
                                        required>
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
                                        placeholder="Enter color" value="{{ old('color', $product->color) }}">
                                    @error('color')
                                        <span class="form-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="size" class="form-label">Size</label>
                                    <input type="text" id="size" name="size" class="form-input"
                                        placeholder="Enter size" value="{{ old('size', $product->size) }}">
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
                                    <option value="public"
                                        {{ old('visibility', $product->visibility) == 'public' ? 'selected' : '' }}>Public
                                    </option>
                                    <option value="private"
                                        {{ old('visibility', $product->visibility) == 'private' ? 'selected' : '' }}>
                                        Private</option>
                                </select>
                                @error('visibility')
                                    <span class="form-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div style="margin-top: 10px;">
                                <label for="is_active">Active</label>
                                <select name="is_active" id="is_active" class="form-select">
                                    <option value="1" {{ old('is_active', $product->is_active) ? 'selected' : '' }}>
                                        Active
                                    </option>
                                    <option value="0" {{ old('is_active', $product->is_active) ? 'selected' : '' }}>
                                        Inactive
                                    </option>
                                </select>
                            </div>
                            @error('is_active')
                                <span class="form-error">{{ $message }}</span>
                            @enderror

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
                                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
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
                                <input type="text" id="tags" class="form-input"
                                    placeholder="Enter tags"
                                    value="{{ is_array(old('tags')) ? implode(',', old('tags')) : old('tags', implode(',', json_decode($product->tags, true) ?? [])) }}">
                                <input type="hidden" id="tags_hidden" name="tags[]" value="">
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
                            Update Product
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
        const hiddenInput = document.querySelector('#tags_hidden');
        const tagify = new Tagify(input, {
            delimiters: ',',
            originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
        });

        // After Tagify initialization
        function syncTagsHiddenInputs() {
            const tags = tagify.value.map(item => item.value);
            // Remove previous hidden inputs
            document.querySelectorAll('input[name="tags[]"]').forEach(el => el.remove());
            // Add one hidden input per tag
            tags.forEach(tag => {
                const hidden = document.createElement('input');
                hidden.type = 'hidden';
                hidden.name = 'tags[]';
                hidden.value = tag;
                input.parentNode.appendChild(hidden);
            });
        }

        // Sync on page load
        syncTagsHiddenInputs();

        // Sync on tag change
        tagify.on('change', syncTagsHiddenInputs);
    </script>
@endpush
