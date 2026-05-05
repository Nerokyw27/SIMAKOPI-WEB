@extends('layouts.dashboard')
@section('title', 'Customer Detail - SIMAKOPI')
@section('page-title', 'Customer Detail')

@section('dashboard-content')
<div class="profile-card">
    <div class="profile-header">
        <div class="profile-avatar-lg">
            {{ strtoupper(substr($customer->name, 0, 1)) }}
        </div>
        <div class="profile-header-info">
            <h2>{{ $customer->name }}</h2>
            <span class="role-badge role-badge--customer">Customer</span>
        </div>
    </div>
    <div class="profile-details">
        <div class="detail-row">
            <span class="detail-label">Name</span>
            <span class="detail-value">{{ $customer->name }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Email</span>
            <span class="detail-value">{{ $customer->email }}</span>
        </div>
    </div>

    {{-- Purchase History --}}
    <div class="section-divider"></div>
    <h3 class="sub-title">Purchase History</h3>
    <div class="data-table-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                @if($customer->product_name)
                <tr>
                    <td>{{ $customer->product_name }}</td>
                    <td>{{ $customer->quantity }}</td>
                    <td>Rp {{ number_format($customer->total_price, 0, ',', '.') }}</td>
                </tr>
                @else
                <tr>
                    <td colspan="3" class="table-empty">Belum ada riwayat pembelian</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div class="profile-actions">
        <a href="{{ route('admin.customers.index') }}" class="btn btn--outline">Back to List</a>
    </div>
</div>
@endsection
