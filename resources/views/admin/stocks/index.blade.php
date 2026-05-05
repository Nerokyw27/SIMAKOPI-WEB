@extends('layouts.dashboard')
@section('title', 'Stock - SIMAKOPI')
@section('page-title', 'Stock')

@section('dashboard-content')
<p class="text-muted" style="margin-top: -15px; margin-bottom: 20px; color: #666;">Kelola data stock kopi</p>

<div class="dash-stats" style="grid-template-columns: repeat(4, 1fr); margin-bottom: 24px;">
    <!-- Total Produk -->
    <div class="stat-card" style="border-left: 4px solid #4a90e2; padding: 20px;">
        <div class="stat-icon" style="background: rgba(74, 144, 226, 0.1); color: #4a90e2;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
        </div>
        <div class="stat-info">
            <span class="stat-label" style="font-size: 0.8rem;">Total Produk</span>
            <span class="stat-number">{{ $totalProducts }} <span style="font-size: 0.8rem; font-weight: normal; color: #999;">Data</span></span>
        </div>
    </div>
    
    <!-- Low Stock -->
    <div class="stat-card" style="border-left: 4px solid #f39c12; padding: 20px;">
        <div class="stat-icon" style="background: rgba(243, 156, 18, 0.1); color: #f39c12;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
        </div>
        <div class="stat-info">
            <span class="stat-label" style="font-size: 0.8rem;">Low Stock</span>
            <span class="stat-number">{{ $lowStockCount }} <span style="font-size: 0.8rem; font-weight: normal; color: #999;">Data</span></span>
        </div>
    </div>

    <!-- Available -->
    <div class="stat-card" style="border-left: 4px solid #2ecc71; padding: 20px;">
        <div class="stat-icon" style="background: rgba(46, 204, 113, 0.1); color: #2ecc71;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
        </div>
        <div class="stat-info">
            <span class="stat-label" style="font-size: 0.8rem;">Available</span>
            <span class="stat-number">{{ $availableCount }} <span style="font-size: 0.8rem; font-weight: normal; color: #999;">Data</span></span>
        </div>
    </div>

    <!-- Out of Stock -->
    <div class="stat-card" style="border-left: 4px solid #e74c3c; padding: 20px;">
        <div class="stat-icon" style="background: rgba(231, 76, 60, 0.1); color: #e74c3c;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
        </div>
        <div class="stat-info">
            <span class="stat-label" style="font-size: 0.8rem;">Out of Stock</span>
            <span class="stat-number">{{ $outOfStockCount }} <span style="font-size: 0.8rem; font-weight: normal; color: #999;">Data</span></span>
        </div>
    </div>
</div>

<div class="data-table-wrapper" style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <div style="display: flex; gap: 10px;">
            <button class="btn btn--outline" style="display: flex; align-items: center; gap: 5px;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                Filter
            </button>
        </div>
        <!-- <div style="display: flex; gap: 10px;">
            <button class="btn btn--outline" style="display: flex; align-items: center; gap: 5px;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                01 Apr 2026 - 17 Apr 2026
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
            </button>
        </div> -->
    </div>

    <table class="data-table" id="stock-table" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #f9f9f9; text-align: left; border-bottom: 1px solid #eee;">
                <th style="padding: 12px; font-weight: 500; color: #555;">Product Name</th>
                <th style="padding: 12px; font-weight: 500; color: #555;">Available Stock</th>
                <th style="padding: 12px; font-weight: 500; color: #555;">Stock Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($catalogs as $catalog)
            <tr style="border-bottom: 1px solid #eee;">
                <td style="padding: 12px;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        @if($catalog->product_image)
                            <img src="{{ asset('storage/' . $catalog->product_image) }}" alt="{{ $catalog->product_name }}" style="width: 40px; height: 40px; border-radius: 6px; object-fit: cover;">
                        @else
                            <div style="width: 40px; height: 40px; background: #eee; border-radius: 6px; display: flex; align-items: center; justify-content: center;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#999" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                            </div>
                        @endif
                        <div style="display: flex; flex-direction: column;">
                            <span style="font-weight: 600; color: #333;">{{ $catalog->product_name }}</span>
                            <span style="font-size: 0.75rem; color: #999;">Beans</span>
                        </div>
                    </div>
                </td>
                <td style="padding: 12px; color: #666;">{{ $catalog->available_stock }} kg</td>
                <td style="padding: 12px;">
                    @if($catalog->stock_status == 'Low Stock')
                        <span style="background: rgba(243, 156, 18, 0.1); color: #f39c12; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; display: inline-flex; align-items: center; gap: 6px;">
                            <span style="width: 6px; height: 6px; background: #f39c12; border-radius: 50%; display: inline-block;"></span>
                            Low Stock
                        </span>
                    @elseif($catalog->stock_status == 'Available')
                        <span style="background: rgba(46, 204, 113, 0.1); color: #2ecc71; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; display: inline-flex; align-items: center; gap: 6px;">
                            <span style="width: 6px; height: 6px; background: #2ecc71; border-radius: 50%; display: inline-block;"></span>
                            Available
                        </span>
                    @else
                        <span style="background: rgba(231, 76, 60, 0.1); color: #e74c3c; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; display: inline-flex; align-items: center; gap: 6px;">
                            <span style="width: 6px; height: 6px; background: #e74c3c; border-radius: 50%; display: inline-block;"></span>
                            Out of Stock
                        </span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="table-empty" style="padding: 20px; text-align: center; color: #999;">Belum ada data stok</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px; color: #666; font-size: 0.9rem;">
        <div>
            Showing {{ $catalogs->firstItem() ?? 0 }} to {{ $catalogs->lastItem() ?? 0 }} of {{ $totalProducts }} results
        </div>
        <div>
            {{ $catalogs->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
