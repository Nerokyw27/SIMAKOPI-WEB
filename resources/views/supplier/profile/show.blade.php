@extends('layouts.dashboard')
@section('title', 'Supplier Profile - SIMAKOPI')
@section('page-title', 'Profile')

@section('dashboard-content')
<div class="profile-card">
    <div class="profile-header">
        <div class="profile-avatar-lg">
            @if($user->profile_picture)
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="{{ $user->full_name }}">
            @else
                {{ strtoupper(substr($user->full_name, 0, 1)) }}
            @endif
        </div>
        <div class="profile-header-info">
            <h2>{{ $user->full_name }}</h2>
            <span class="role-badge role-badge--supplier">Supplier</span>
        </div>
    </div>
    <div class="profile-details">
        <div class="detail-row">
            <span class="detail-label">Username</span>
            <span class="detail-value">{{ $user->username }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Full Name</span>
            <span class="detail-value">{{ $user->full_name }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Email</span>
            <span class="detail-value">{{ $user->email }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Phone Number</span>
            <span class="detail-value">{{ $user->phone_number ?? '-' }}</span>
        </div>
<<<<<<< HEAD
        <div class="detail-row">
            <span class="detail-label">Address</span>
            <span class="detail-value">{{ $user->address ?? '-' }}</span>
        </div>
=======
>>>>>>> 612bddbaa9f4a18412e012a7b92ffa32e7ddd4b6
    </div>
    <div class="profile-actions">
        <a href="{{ route('supplier.profile.edit') }}" class="btn btn--primary">Edit Profile</a>
    </div>
</div>
@endsection
