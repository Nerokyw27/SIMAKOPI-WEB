@extends('layouts.dashboard')
@section('title', 'Add Product Catalog - SIMAKOPI')
@section('page-title', 'Add Product Catalog')

@section('dashboard-content')
<div class="form-container" style="background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); max-width: 800px;">
    
    <form id="addCatalogForm" action="{{ route('admin.catalogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div style="margin-bottom: 20px;">
            <label for="product_name" style="display: block; margin-bottom: 8px; font-weight: 500;">Product Name <span style="color: red;">*</span></label>
            <select id="product_name" name="product_name" class="form-input" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" required>
                <option value="" disabled selected>Select a product...</option>
                @foreach($products as $product)
                    <option value="{{ $product->product_name }}" data-stock="{{ $product->total_stock }}">{{ $product->product_name }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 20px;">
            <label for="description" style="display: block; margin-bottom: 8px; font-weight: 500;">Description <span style="color: red;">*</span></label>
            <textarea id="description" name="description" class="form-input" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" rows="4" placeholder="Product description..." required></textarea>
        </div>

        <div style="display: flex; gap: 20px; margin-bottom: 20px;">
            <div style="flex: 1;">
                <label for="price" style="display: block; margin-bottom: 8px; font-weight: 500;">Price (Rp) <span style="color: red;">*</span></label>
                <input type="number" id="price" name="price" class="form-input" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" placeholder="0" required min="0">
            </div>
            <div style="flex: 1;">
                <label for="stock" style="display: block; margin-bottom: 8px; font-weight: 500;">Stock <span style="color: red;">*</span></label>
                <input type="number" id="stock" name="stock" class="form-input" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; background-color: #f9f9f9; color: #999; cursor: not-allowed;" placeholder="0" required min="0" readonly>
            </div>
        </div>

        <div style="margin-bottom: 30px;">
            <label for="product_image" style="display: block; margin-bottom: 8px; font-weight: 500;">Product Image <span style="color: red;">*</span></label>
            <input type="file" id="product_image" name="product_image" class="form-input" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; background: #f9f9f9;" accept="image/*" required>
            <small style="color: #999; display: block; margin-top: 5px;">Upload a clear image of the product.</small>
        </div>

        <div style="display: flex; gap: 15px; justify-content: flex-end;">
            <a href="{{ route('admin.catalogs.index') }}" class="btn btn--outline" style="padding: 10px 20px;">Cancel</a>
            <button type="button" id="submitBtn" class="btn" style="background: #4a3b32; color: #fff; padding: 10px 30px; border: none; border-radius: 4px; cursor: pointer;">Add</button>
        </div>
    </form>
</div>

<!-- Add SweetAlert2 for popups -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const productNameSelect = document.getElementById('product_name');
        const stockInput = document.getElementById('stock');

        productNameSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const availableStock = selectedOption.getAttribute('data-stock');
            if(availableStock) {
                stockInput.value = availableStock;
            } else {
                stockInput.value = 0;
            }
        });

        document.getElementById('submitBtn').addEventListener('click', function() {
            const productName = document.getElementById('product_name').value.trim();
            const description = document.getElementById('description').value.trim();
            const price = document.getElementById('price').value;
            const stock = document.getElementById('stock').value;
            const productImage = document.getElementById('product_image').value;

            // Check if empty
            if (!productName || !description || !price || !stock || !productImage) {
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
                text: 'Are you sure you want to add this product data?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#4a3b32',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('addCatalogForm').submit();
                }
            });
        });
    });

    // Error handling from backend (like image too large, validation fail)
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
