@extends('layouts.dashboard')
@section('title', 'Edit Production Data - SIMAKOPI')
@section('page-title', 'Edit Production Data')

@section('dashboard-content')
<div class="form-container" style="background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); max-width: 800px;">
    
    <form id="editProductionForm" action="{{ route('admin.productions.update', $production) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div style="margin-bottom: 20px;">
            <label for="product_name" style="display: block; margin-bottom: 8px; font-weight: 500;">Product Name <span style="color: red;">*</span></label>
            <input type="text" id="product_name" name="product_name" class="form-input" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" value="{{ $production->product_name }}" required maxlength="25">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="production_date" style="display: block; margin-bottom: 8px; font-weight: 500;">Production Date <span style="color: red;">*</span></label>
            <input type="date" id="production_date" name="production_date" class="form-input" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" value="{{ \Carbon\Carbon::parse($production->production_date)->format('Y-m-d') }}" required>
        </div>

        <div style="margin-bottom: 20px;">
            <label for="stock_in" style="display: block; margin-bottom: 8px; font-weight: 500;">Stock In (kg) <span style="color: red;">*</span></label>
            <input type="number" id="stock_in" name="stock_in" class="form-input" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" value="{{ $production->stock_in }}" required min="0">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="production_status" style="display: block; margin-bottom: 8px; font-weight: 500;">Production Status <span style="color: red;">*</span></label>
            <select id="production_status" name="production_status" class="form-input" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" required>
                <option value="" disabled>Select status...</option>
                <option value="In Progress" {{ $production->production_status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Completed" {{ $production->production_status == 'Completed' ? 'selected' : '' }}>Completed</option>
                <option value="Failed" {{ $production->production_status == 'Failed' ? 'selected' : '' }}>Failed</option>
            </select>
        </div>

        <div style="margin-bottom: 30px;">
            <label for="final_quantity" style="display: block; margin-bottom: 8px; font-weight: 500;">Final Quantity (kg)</label>
            <input type="number" id="final_quantity" name="final_quantity" class="form-input" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" value="{{ $production->final_quantity }}" min="0">
            <small id="final_quantity_help" style="color: #999; display: block; margin-top: 5px;">Final quantity can only be edited when production status is Completed.</small>
        </div>

        <div style="display: flex; gap: 15px; justify-content: flex-end;">
            <a href="{{ route('admin.productions.index') }}" class="btn btn--outline" style="padding: 10px 20px;">Cancel</a>
            <button type="button" id="submitBtn" class="btn" style="background: #4a3b32; color: #fff; padding: 10px 30px; border: none; border-radius: 4px; cursor: pointer;">Save</button>
        </div>
    </form>
</div>

<!-- Add SweetAlert2 for popups -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusSelect = document.getElementById('production_status');
        const finalQtyInput = document.getElementById('final_quantity');
        const finalQtyHelp = document.getElementById('final_quantity_help');

        function toggleFinalQuantity() {
            if (statusSelect.value === 'Completed') {
                finalQtyInput.disabled = false;
                finalQtyInput.style.backgroundColor = '#fff';
                finalQtyInput.style.color = '#333';
                finalQtyInput.style.cursor = 'text';
                finalQtyHelp.style.display = 'none';
            } else {
                finalQtyInput.disabled = true;
                finalQtyInput.style.backgroundColor = '#f9f9f9';
                finalQtyInput.style.color = '#999';
                finalQtyInput.style.cursor = 'not-allowed';
                finalQtyHelp.style.display = 'block';
            }
        }

        // Run on load
        toggleFinalQuantity();

        // Run on change
        statusSelect.addEventListener('change', toggleFinalQuantity);

        document.getElementById('submitBtn').addEventListener('click', function() {
            const productName = document.getElementById('product_name').value.trim();
            const productionDate = document.getElementById('production_date').value;
            const stockIn = document.getElementById('stock_in').value;
            const productionStatus = document.getElementById('production_status').value;
            const finalQty = finalQtyInput.value;

            // Check if empty
            if (!productName || !productionDate || !stockIn || !productionStatus || (productionStatus === 'Completed' && finalQty === '')) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Incomplete',
                    text: 'Please complete all required fields before submitting.',
                    confirmButtonColor: '#4a3b32'
                });
                return;
            }

            // Check if invalid format
            if (productName.length > 25 || parseInt(stockIn) < 0 || (productionStatus === 'Completed' && parseInt(finalQty) < 0)) {
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
                text: 'Are you sure you want to update this production data?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#4a3b32',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Enable the input before submitting so its value is sent
                    finalQtyInput.disabled = false;
                    document.getElementById('editProductionForm').submit();
                }
            });
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
