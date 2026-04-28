@extends('layouts.dashboard')
@section('title', 'Customer Profile - SIMAKOPI')
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
            <span class="role-badge role-badge--customer">Customer</span>
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
            <span class="detail-label">District</span>
            <span class="detail-value">{{ $user->district ?? '-' }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">City</span>
            <span class="detail-value">{{ $user->city ?? '-' }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Province</span>
            <span class="detail-value">{{ $user->province ?? '-' }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Country</span>
            <span class="detail-value">{{ $user->country ?? '-' }}</span>
        </div>
    </div>
    <div class="profile-actions">
        <a href="{{ route('customer.profile.edit') }}" class="btn btn--primary">Edit Profile</a>
    </div>
</div>
@endsection
