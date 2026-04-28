@extends('layouts.dashboard')
@section('title', 'Add Supplier - SIMAKOPI')
@section('page-title', 'Add Supplier')

@section('dashboard-content')
<div class="form-card">
    <form method="POST" action="{{ route('admin.suppliers.store') }}" id="add-supplier-form">
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="form-input" placeholder="supplier_username" required maxlength="25" value="{{ old('username') }}">
            @error('username')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-input" placeholder="*********" required minlength="6">
            @error('password')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-actions">
            <a href="{{ route('admin.suppliers.index') }}" class="btn btn--outline">Cancel</a>
            <button type="submit" class="btn btn--primary">Add</button>
        </div>
    </form>
</div>

@push('scripts')
<script>
document.getElementById('add-supplier-form').addEventListener('submit', function(e) {
    e.preventDefault();
    if (confirm('Are you sure you want to add this supplier?')) {
        this.submit();
    }
});
</script>
@endpush
@endsection
