@extends('layouts.dashboard')
@section('title', 'Edit Profile - SIMAKOPI')
@section('page-title', 'Edit Profile')

@section('dashboard-content')
<div class="form-card">
    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" id="edit-profile-form">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="form-input" value="{{ old('username', $user->username) }}" required maxlength="25">
            @error('username') <span class="form-error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="password">Password <small>(kosongkan jika tidak ingin mengubah)</small></label>
            <input type="password" id="password" name="password" class="form-input" placeholder="*********" minlength="6">
        </div>
        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name" class="form-input" value="{{ old('full_name', $user->full_name) }}" required maxlength="25">
            @error('full_name') <span class="form-error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="profile_picture">Profile Picture</label>
            <input type="file" id="profile_picture" name="profile_picture" class="form-input" accept="image/*">
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" id="phone_number" name="phone_number" class="form-input" value="{{ old('phone_number', $user->phone_number) }}" maxlength="13">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-input" value="{{ old('email', $user->email) }}" required maxlength="30">
            @error('email') <span class="form-error">{{ $message }}</span> @enderror
        </div>
        <div class="form-actions">
            <a href="{{ route('admin.profile.show') }}" class="btn btn--outline">Cancel</a>
            <button type="submit" class="btn btn--primary">Save</button>
        </div>
    </form>
</div>

@push('scripts')
<script>
document.getElementById('edit-profile-form').addEventListener('submit', function(e) {
    e.preventDefault();
    if (confirm('Are you sure you want to save these changes?')) {
        this.submit();
    }
});
</script>
@endpush
@endsection
