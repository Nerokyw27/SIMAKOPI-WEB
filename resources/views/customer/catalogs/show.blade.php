@extends('layouts.dashboard')
@section('title', 'Product Detail - SIMAKOPI')
@section('page-title', 'Product Detail')

@section('dashboard-content')
<div class="form-container" style="background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); max-width: 800px;">
    
    <div style="display: flex; gap: 30px; align-items: flex-start;">
        <!-- Product Image -->
        <div style="flex: 0 0 250px; background: #f9f9f9; padding: 20px; border-radius: 8px; border: 1px solid #eee; text-align: center;">
            <img src="{{ asset('storage/' . $catalog->product_image) }}" alt="{{ $catalog->product_name }}" style="max-width: 100%; border-radius: 4px;">
        </div>
        
        <!-- Product Info -->
        <div style="flex: 1;">
            <span class="catalog-badge" style="background: #fdf0e6; color: #d35400; font-size: 0.75rem; padding: 4px 10px; border-radius: 12px; font-weight: 600; display: inline-block; margin-bottom: 8px;">Beans</span>
            <h2 style="margin-top: 0; color: #333; margin-bottom: 15px;">{{ $catalog->product_name }}</h2>
            
            <div style="margin-bottom: 15px;">
                <span style="display: block; font-size: 0.85rem; color: #777; margin-bottom: 4px;">Description</span>
                <p style="margin: 0; line-height: 1.6; color: #555;">{{ $catalog->description }}</p>
            </div>
            
            <div style="display: flex; gap: 40px; margin-bottom: 25px;">
                <div>
                    <span style="display: block; font-size: 0.85rem; color: #777; margin-bottom: 4px;">Price</span>
                    <span style="font-size: 1.2rem; font-weight: 600; color: #333;">Rp {{ number_format($catalog->price, 0, ',', '.') }}</span>
                </div>
                <div>
                    <span style="display: block; font-size: 0.85rem; color: #777; margin-bottom: 4px;">Stock</span>
                    <span style="font-size: 1.2rem; font-weight: 600; color: #2ecc71;">{{ $catalog->stock }} pcs</span>
                </div>
            </div>
            
            <div style="display: flex; gap: 15px;">
                <a href="{{ route('customer.catalogs.index') }}" class="btn btn--outline" style="padding: 10px 20px;">Back to Catalog</a>
            </div>
        </div>
    </div>
</div>
@endsection
