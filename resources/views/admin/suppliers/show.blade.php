@extends('layouts.dashboard')
@section('title', 'Supplier Detail - SIMAKOPI')
@section('page-title', 'Supplier Detail')

@section('dashboard-content')
<div class="profile-card">
    <div class="profile-header">
        <div class="profile-avatar-lg">
            @if($supplier->image)
                <img src="{{ asset('storage/' . $supplier->image) }}" alt="{{ $supplier->supplier_name }}">
            @else
                {{ strtoupper(substr($supplier->supplier_name, 0, 1)) }}
            @endif
        </div>
        <div class="profile-header-info">
            <h2>{{ $supplier->supplier_name }}</h2>
            <span class="role-badge role-badge--supplier">Supplier</span>
        </div>
    </div>
    <div class="profile-details">
        <div class="detail-row">
            <span class="detail-label">Username</span>
            <span class="detail-value">{{ $supplier->username }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Supplier Name</span>
            <span class="detail-value">{{ $supplier->supplier_name }}</span>
        </div>
        @if($supplier->akun)
        <div class="detail-row">
            <span class="detail-label">Email</span>
            <span class="detail-value">{{ $supplier->akun->email }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Phone Number</span>
            <span class="detail-value">{{ $supplier->akun->phone_number ?? '-' }}</span>
        </div>
        @endif
    </div>
    <div class="profile-actions">
        <a href="{{ route('admin.suppliers.index') }}" class="btn btn--outline">Back to List</a>
    </div>
</div>
@endsection
