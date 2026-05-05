@extends('layouts.dashboard')
@section('title', 'Product Catalog - SIMAKOPI')
@section('page-title', 'Product Catalog')

@section('dashboard-content')
<p class="text-muted" style="margin-top: -15px; margin-bottom: 20px; color: #666;">Kelola catalog produk</p>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
    <button class="btn btn--outline" style="display: flex; align-items: center; gap: 5px; background: #fff;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
        Filter
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
    </button>
    <a href="{{ route('admin.catalogs.create') }}" class="btn" style="background: #4a3b32; color: #fff; display: flex; align-items: center; gap: 5px;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        Add Product
    </a>
</div>

<div class="catalog-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 30px;">
    @forelse($catalogs as $catalog)
    <div class="catalog-card" style="background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.05); padding: 15px; display: flex; flex-direction: column;">
        <div class="catalog-image" style="height: 200px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px; background: #f9f9f9; border-radius: 6px;">
            <img src="{{ asset('storage/' . $catalog->product_image) }}" alt="{{ $catalog->product_name }}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
        </div>
        
        <div class="catalog-info" style="flex: 1;">
            <span class="catalog-badge" style="background: #fdf0e6; color: #d35400; font-size: 0.75rem; padding: 4px 10px; border-radius: 12px; font-weight: 600; display: inline-block; margin-bottom: 8px;">Beans</span>
            <h3 style="font-size: 1rem; margin: 0 0 8px 0; color: #333;">{{ $catalog->product_name }}</h3>
            <p style="margin: 0 0 8px 0; font-weight: 600; color: #555;">Rp {{ number_format($catalog->price, 0, ',', '.') }}</p>
            <p style="margin: 0; font-size: 0.85rem; color: #999;">Stok: <span style="color: #2ecc71;">{{ $catalog->stock }} kg</span></p>
        </div>

        <div class="catalog-actions" style="display: flex; gap: 8px; margin-top: 15px;">
            <button type="button" class="btn btn--outline" title="Detail (Coming Soon)" style="flex: 1; padding: 6px; display: inline-flex; justify-content: center; opacity: 0.5;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></button>
            <a href="{{ route('admin.catalogs.edit', $catalog) }}" class="btn btn--outline" title="Edit" style="flex: 1; padding: 6px; display: inline-flex; justify-content: center;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon></svg></a>
            <form action="{{ route('admin.catalogs.destroy', $catalog) }}" method="POST" style="flex: 1; display: flex;" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn--outline delete-btn" title="Delete" style="width: 100%; padding: 6px; display: inline-flex; justify-content: center; color: #e74c3c; border-color: #ffcdd2;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>
            </form>
        </div>
    </div>
    @empty
    <div style="grid-column: 1 / -1; text-align: center; padding: 40px; background: #fff; border-radius: 8px; color: #999;">
        Belum ada katalog produk
    </div>
    @endforelse
</div>

@if($catalogs->hasPages())
<div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px; color: #666; font-size: 0.9rem;">
    <div>
        Showing {{ $catalogs->firstItem() ?? 0 }} to {{ $catalogs->lastItem() ?? 0 }} of {{ $catalogs->total() }} results
    </div>
    <div>
        {{ $catalogs->links('pagination::bootstrap-4') }}
    </div>
</div>
@endif

<!-- Add SweetAlert2 for session popups -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Display session success if it came from backend
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "{{ session('success') }}",
            confirmButtonColor: '#4a3b32'
        });
    @endif

    // Handle delete confirmation
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('.delete-form');
            Swal.fire({
                title: 'Confirmation',
                text: 'Are you sure you want to delete this product data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#4a3b32',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection
