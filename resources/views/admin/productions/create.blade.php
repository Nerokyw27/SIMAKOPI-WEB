@extends('layouts.dashboard')
@section('title', 'Add Production Data - SIMAKOPI')
@section('page-title', 'Add Production Data')

@section('dashboard-content')
<div class="form-container" style="background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); max-width: 800px;">
    
    <form id="addProductionForm" action="{{ route('admin.productions.store') }}" method="POST">
        @csrf
        
        <div style="margin-bottom: 20px;">
            <label for="product_name" style="display: block; margin-bottom: 8px; font-weight: 500;">Product Name <span style="color: red;">*</span></label>
            <input type="text" id="product_name" name="product_name" class="form-input" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" placeholder="e.g. Arabica Coffee Beans" required maxlength="25">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="production_date" style="display: block; margin-bottom: 8px; font-weight: 500;">Production Date <span style="color: red;">*</span></label>
            <input type="date" id="production_date" name="production_date" class="form-input" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 20px;">
            <label for="stock_in" style="display: block; margin-bottom: 8px; font-weight: 500;">Stock In (kg) <span style="color: red;">*</span></label>
            <input type="number" id="stock_in" name="stock_in" class="form-input" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" placeholder="0" required min="0">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="production_status_display" style="display: block; margin-bottom: 8px; font-weight: 500;">Production Status <span style="color: red;">*</span></label>
            <input type="text" id="production_status_display" class="form-input" style="width: 100%; padding: 10px; border: 1px solid #eee; border-radius: 4px; background-color: #f9f9f9; color: #999; cursor: not-allowed;" value="In Progress" readonly>
            <input type="hidden" id="production_status" name="production_status" value="In Progress">
        </div>

        <div style="display: flex; gap: 15px; justify-content: flex-end;">
            <a href="{{ route('admin.productions.index') }}" class="btn btn--outline" style="padding: 10px 20px;">Cancel</a>
            <button type="button" id="submitBtn" class="btn" style="background: #4a3b32; color: #fff; padding: 10px 30px; border: none; border-radius: 4px; cursor: pointer;">Add</button>
        </div>
    </form>
</div>

<!-- Add SweetAlert2 for popups -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('submitBtn').addEventListener('click', function() {
        const productName = document.getElementById('product_name').value.trim();
        const productionDate = document.getElementById('production_date').value;
        const stockIn = document.getElementById('stock_in').value;

        // Check if empty
        if (!productName || !productionDate || !stockIn) {
            Swal.fire({
                icon: 'warning',
                title: 'Incomplete',
                text: 'Please complete all required fields before submitting.',
                confirmButtonColor: '#4a3b32'
            });
            return;
        }

        // Check if invalid format (e.g. qty negative, or name > 25)
        if (productName.length > 25 || parseInt(stockIn) < 0) {
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
            text: 'Are you sure you want to add this production data?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#4a3b32',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('addProductionForm').submit();
            }
        });
    });

    // Display session success if it came from backend
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "{{ session('success') }}",
            confirmButtonColor: '#4a3b32'
        });
    @endif
</script>
@endsection
