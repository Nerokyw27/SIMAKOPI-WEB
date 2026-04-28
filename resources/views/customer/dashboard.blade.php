@extends('layouts.dashboard')
@section('title', 'Customer Dashboard - SIMAKOPI')
@section('page-title', 'Dashboard')

@section('dashboard-content')
<div class="dash-welcome">
    <div class="welcome-card">
        <h2>Selamat Datang, {{ auth()->user()->name }}!</h2>
        <p>Anda login sebagai <strong>Customer</strong>. Fitur katalog produk dan pemesanan akan tersedia pada sprint berikutnya.</p>
    </div>
</div>
@endsection
