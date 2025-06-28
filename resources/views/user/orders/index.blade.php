@extends('user.layouts.app')

@section('title', 'My Orders')

@section('content')
<div class="page-container">
    <div class="page-header" data-aos="fade-up">
        <h1 class="page-title">My Orders</h1>
        <p class="page-subtitle">Track and manage your orders</p>
    </div>

    <!-- Order Filters -->
    <div class="filter-tabs" data-aos="fade-up" data-aos-delay="200">
        <button class="filter-tab active" data-filter="all">All Orders</button>
        <button class="filter-tab" data-filter="processing">Processing</button>
        <button class="filter-tab" data-filter="shipped">Shipped</button>
        <button class="filter-tab" data-filter="delivered">Delivered</button>
        <button class="filter-tab" data-filter="cancelled">Cancelled</button>
    </div>

    <!-- Orders List -->
    <div class="orders-container" data-aos="fade-up" data-aos-delay="300">
        @php
            $orders = [
                ['id' => 'ORD-001', 'date' => '2024-01-15', 'status' => 'delivered', 'total' => 299.00, 'items' => 2],
                ['id' => 'ORD-002', 'date' => '2024-01-10', 'status' => 'processing', 'total' => 149.00, 'items' => 1],
                ['id' => 'ORD-003', 'date' => '2024-01-05', 'status' => 'shipped', 'total' => 89.00, 'items' => 3],
                ['id' => 'ORD-004', 'date' => '2024-01-01', 'status' => 'cancelled', 'total' => 199.00, 'items' => 1]
            ];
        @endphp

        @foreach($orders as $order)
        <div class="order-card" data-status="{{ $order['status'] }}">
            <div class="order-header">
                <div class="order-id">{{ $order['id'] }}</div>
                <div class="order-date">{{ date('M d, Y', strtotime($order['date'])) }}</div>
                <div class="order-status {{ $order['status'] }}">
                    {{ ucfirst($order['status']) }}
                </div>
            </div>
            
            <div class="order-body">
                <div class="order-summary">
                    <div class="order-items">{{ $order['items'] }} item(s)</div>
                    <div class="order-total">${{ number_format($order['total'], 2) }}</div>
                </div>
                
                <div class="order-actions">
                    <button class="btn-minimal secondary">View Details</button>
                    @if($order['status'] === 'delivered')
                        <button class="btn-minimal primary">Reorder</button>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
