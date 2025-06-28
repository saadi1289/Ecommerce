@extends('admin.layouts.app')

@section('title', 'Create Coupon - Admin Panel')

@section('content')
<div class="create-coupon-container">
    <!-- Page Header -->
    <div class="page-header">
        <div class="page-title">
            <h1>Create New Coupon</h1>
            <p>Add a new discount coupon</p>
        </div>
        <div class="page-actions">
            <a href="{{ route('admin.coupons.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i>
                Back to Coupons
            </a>
        </div>
    </div>

    <form action="{{ route('admin.coupons.store') }}" method="POST" id="couponForm">
        @csrf
        <div class="form-layout">
            <!-- Main Content -->
            <div class="form-main">
                <!-- Coupon Information -->
                <div class="form-card">
                    <div class="card-header">
                        <h3>Coupon Information</h3>
                        <p>Enter the details of your coupon</p>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name" class="form-label required">Coupon Name</label>
                                <input type="text" id="name" name="name" class="form-input" placeholder="Enter coupon name" value="{{ old('name') }}" required>
                                @error('name') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="code" class="form-label required">Coupon Code</label>
                                <input type="text" id="code" name="code" class="form-input" placeholder="Enter coupon code" value="{{ old('code') }}" required>
                                @error('code') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="type" class="form-label required">Discount Type</label>
                                <select id="type" name="type" class="form-select" required>
                                    <option value="percentage" {{ old('type') == 'percentage' ? 'selected' : '' }}>Percentage</option>
                                    <option value="fixed" {{ old('type') == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
                                </select>
                                @error('type') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="value" class="form-label required">Discount Value</label>
                                <input type="number" id="value" name="value" class="form-input" placeholder="Enter discount value" step="0.01" min="0" value="{{ old('value') }}" required>
                                @error('value') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" id="start_date" name="start_date" class="form-input" value="{{ old('start_date') }}">
                                @error('start_date') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" id="end_date" name="end_date" class="form-input" value="{{ old('end_date') }}">
                                @error('end_date') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="usage_limit" class="form-label">Usage Limit</label>
                                <input type="number" id="usage_limit" name="usage_limit" class="form-input" placeholder="Enter usage limit" min="1" value="{{ old('usage_limit') }}">
                                @error('usage_limit') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <div class="checkbox-group">
                                    <input type="checkbox" id="is_single_use" name="is_single_use" class="checkbox" {{ old('is_single_use') ? 'checked' : '' }}>
                                    <label for="is_single_use" class="checkbox-label">Single Use</label>
                                </div>
                                @error('is_single_use') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <div class="checkbox-group">
                                    <input type="checkbox" id="is_active" name="is_active" class="checkbox" {{ old('is_active', true) ? 'checked' : '' }}>
                                    <label for="is_active" class="checkbox-label">Active</label>
                                </div>
                                @error('is_active') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="form-sidebar">
                <!-- Action Buttons -->
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-save"></i>
                        Save Coupon
                    </button>
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
