@extends('layouts.dashboard')
@section('title', 'Edit Profile - SIMAKOPI')
@section('page-title', 'Edit Profile')

@section('dashboard-content')
<div class="form-card">
    <form method="POST" action="{{ route('customer.profile.update') }}" enctype="multipart/form-data" id="edit-profile-form">
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
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-input" value="{{ old('email', $user->email) }}" required maxlength="30">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea id="address" name="address" class="form-input" rows="2" maxlength="100">{{ old('address', $user->address) }}</textarea>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="district">District</label>
                <input type="text" id="district" name="district" class="form-input" value="{{ old('district', $user->district) }}" maxlength="30">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" class="form-input" value="{{ old('city', $user->city) }}" maxlength="30">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="province">Province</label>
                <input type="text" id="province" name="province" class="form-input" value="{{ old('province', $user->province) }}" maxlength="30">
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" id="country" name="country" class="form-input" value="{{ old('country', $user->country) }}" maxlength="30">
            </div>
        </div>
        <div class="form-actions">
            <a href="{{ route('customer.profile.show') }}" class="btn btn--outline">Cancel</a>
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
