@extends('layouts.dashboard')
@section('title', 'Edit Product Catalog - SIMAKOPI')
@section('page-title', 'Edit Product Catalog')

@section('dashboard-content')
<div class="form-container" style="background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); max-width: 800px;">
    
    <form id="editCatalogForm" action="{{ route('admin.catalogs.update', $catalog) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div style="margin-bottom: 20px;">
            <label for="product_name" style="display: block; margin-bottom: 8px; font-weight: 500;">Product Name <span style="color: red;">*</span></label>
            <input type="text" id="product_name" name="product_name" class="form-input" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" value="{{ old('product_name', $catalog->product_name) }}" required maxlength="25">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="description" style="display: block; margin-bottom: 8px; font-weight: 500;">Description <span style="color: red;">*</span></label>
            <textarea id="description" name="description" class="form-input" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" rows="4" required>{{ old('description', $catalog->description) }}</textarea>
        </div>

        <div style="display: flex; gap: 20px; margin-bottom: 20px;">
            <div style="flex: 1;">
                <label for="price" style="display: block; margin-bottom: 8px; font-weight: 500;">Price (Rp) <span style="color: red;">*</span></label>
                <input type="number" id="price" name="price" class="form-input" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" value="{{ old('price', $catalog->price) }}" required min="0">
            </div>
            <div style="flex: 1;">
                <label for="stock" style="display: block; margin-bottom: 8px; font-weight: 500;">Stock (pcs) <span style="color: red;">*</span></label>
                <input type="number" id="stock" name="stock" class="form-input" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" value="{{ old('stock', $catalog->stock) }}" required min="0">
            </div>
        </div>

        <div style="margin-bottom: 30px;">
            <label for="product_image" style="display: block; margin-bottom: 8px; font-weight: 500;">Product Image</label>
            <div style="margin-bottom: 10px;">
                <img src="{{ asset('storage/' . $catalog->product_image) }}" alt="Current Image" style="max-height: 100px; border-radius: 4px; border: 1px solid #ddd;">
            </div>
            <input type="file" id="product_image" name="product_image" class="form-input" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; background: #f9f9f9;" accept="image/*">
            <small style="color: #999; display: block; margin-top: 5px;">Leave empty if you don't want to change the image.</small>
        </div>

        <div style="display: flex; gap: 15px; justify-content: flex-end;">
            <a href="{{ route('admin.catalogs.index') }}" class="btn btn--outline" style="padding: 10px 20px;">Cancel</a>
            <button type="button" id="submitBtn" class="btn" style="background: #4a3b32; color: #fff; padding: 10px 30px; border: none; border-radius: 4px; cursor: pointer;">Save</button>
        </div>
    </form>
</div>

<!-- Add SweetAlert2 for popups -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('submitBtn').addEventListener('click', function() {
            const productName = document.getElementById('product_name').value.trim();
            const description = document.getElementById('description').value.trim();
            const price = document.getElementById('price').value;
            const stock = document.getElementById('stock').value;

            // Check if empty (image is optional for update)
            if (!productName || !description || !price || !stock) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Incomplete',
                    text: 'Please complete all required fields before submitting.',
                    confirmButtonColor: '#4a3b32'
                });
                return;
            }

            // Check if invalid format
            if (productName.length > 25 || parseInt(price) < 0 || parseInt(stock) < 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid',
                    text: 'Invalid format. Please try again!',
                    confirmButtonColor: '#4a3b32'
                });
                return;
            }

            // Valid data, show confirmation
            Swal.fire({
                title: 'Confirmation',
                text: 'Are you sure you want to update this product data?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#4a3b32',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('editCatalogForm').submit();
                }
            });
        });
    });

    // Error handling from backend
    @if($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Invalid',
            text: 'Invalid format. Please try again!',
            confirmButtonColor: '#4a3b32'
        });
    @endif
</script>
@endsection
