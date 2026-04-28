@extends('layouts.dashboard')
@section('title', 'Admin Dashboard - SIMAKOPI')
@section('page-title', 'Dashboard')

@section('dashboard-content')
<div class="dash-stats">
    <div class="stat-card stat-card--brown">
        <div class="stat-icon">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
        </div>
        <div class="stat-info">
            <span class="stat-number">{{ $totalSuppliers }}</span>
            <span class="stat-label">Total Supplier</span>
        </div>
    </div>
    <div class="stat-card stat-card--accent">
        <div class="stat-icon">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        </div>
        <div class="stat-info">
            <span class="stat-number">{{ $totalCustomers }}</span>
            <span class="stat-label">Total Customer</span>
        </div>
    </div>
    <div class="stat-card stat-card--dark">
        <div class="stat-icon">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="3" width="20" height="18" rx="2"/><line x1="8" y1="3" x2="8" y2="21"/><line x1="2" y1="9" x2="22" y2="9"/><line x1="2" y1="15" x2="22" y2="15"/></svg>
        </div>
        <div class="stat-info">
            <span class="stat-number">0</span>
            <span class="stat-label">Total Produk</span>
        </div>
    </div>
    <div class="stat-card stat-card--green">
        <div class="stat-icon">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
        </div>
        <div class="stat-info">
            <span class="stat-number">0</span>
            <span class="stat-label">Total Pesanan</span>
        </div>
    </div>
</div>

<div class="dash-welcome">
    <div class="welcome-card">
        <h2>Selamat Datang, {{ auth()->user()->name }}!</h2>
        <p>Anda login sebagai <strong>Administrator</strong>. Gunakan sidebar di sebelah kiri untuk navigasi fitur-fitur sistem.</p>
    </div>
</div>
@endsection
