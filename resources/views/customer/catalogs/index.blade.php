@extends('layouts.dashboard')
@section('title', 'Product Catalog - SIMAKOPI')
@section('page-title', 'Product Catalog')

@section('dashboard-content')
<p class="text-muted" style="margin-top: -15px; margin-bottom: 20px; color: #666;">Explore our coffee collection</p>

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
        </div>

        <div class="catalog-actions" style="margin-top: 15px;">
            <a href="{{ route('customer.catalogs.show', $catalog) }}" class="btn btn--outline" style="width: 100%; display: flex; justify-content: center; align-items: center; gap: 8px;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                Detail
            </a>
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
@endsection
