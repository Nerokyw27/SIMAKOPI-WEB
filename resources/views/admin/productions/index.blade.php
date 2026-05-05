@extends('layouts.dashboard')
@section('title', 'Production - SIMAKOPI')
@section('page-title', 'Production')

@section('dashboard-content')
<p class="text-muted" style="margin-top: -15px; margin-bottom: 20px; color: #666;">Kelola data produksi kopi yang sedang berjalan</p>

<div class="dash-stats" style="grid-template-columns: repeat(4, 1fr); margin-bottom: 24px;">
    <div class="stat-card" style="border-left: 4px solid #4a90e2; padding: 20px;">
        <div class="stat-icon" style="background: rgba(74, 144, 226, 0.1); color: #4a90e2;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
        </div>
        <div class="stat-info">
            <span class="stat-label" style="font-size: 0.8rem;">Total Produksi</span>
            <span class="stat-number">{{ $totalProduction }} <span style="font-size: 0.8rem; font-weight: normal; color: #999;">Data</span></span>
        </div>
    </div>
    
    <div class="stat-card" style="border-left: 4px solid #f39c12; padding: 20px;">
        <div class="stat-icon" style="background: rgba(243, 156, 18, 0.1); color: #f39c12;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
        </div>
        <div class="stat-info">
            <span class="stat-label" style="font-size: 0.8rem;">In Progress</span>
            <span class="stat-number">{{ $inProgress }} <span style="font-size: 0.8rem; font-weight: normal; color: #999;">Data</span></span>
        </div>
    </div>

    <div class="stat-card" style="border-left: 4px solid #2ecc71; padding: 20px;">
        <div class="stat-icon" style="background: rgba(46, 204, 113, 0.1); color: #2ecc71;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
        </div>
        <div class="stat-info">
            <span class="stat-label" style="font-size: 0.8rem;">Completed</span>
            <span class="stat-number">{{ $completed }} <span style="font-size: 0.8rem; font-weight: normal; color: #999;">Data</span></span>
        </div>
    </div>

    <div class="stat-card" style="border-left: 4px solid #e74c3c; padding: 20px;">
        <div class="stat-icon" style="background: rgba(231, 76, 60, 0.1); color: #e74c3c;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
        </div>
        <div class="stat-info">
            <span class="stat-label" style="font-size: 0.8rem;">Failed</span>
            <span class="stat-number">{{ $failed }} <span style="font-size: 0.8rem; font-weight: normal; color: #999;">Data</span></span>
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
            <!-- <button class="btn btn--outline" style="display: flex; align-items: center; gap: 5px;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                01 May 2026 - 31 May 2026
            </button> -->
        </div>
        <a href="{{ route('admin.productions.create') }}" class="btn" style="background: #4a3b32; color: #fff; display: flex; align-items: center; gap: 5px;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            Add Production Data
        </a>
    </div>

    <table class="data-table" id="production-table" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #f9f9f9; text-align: left; border-bottom: 1px solid #eee;">
                <th style="padding: 12px; font-weight: 500; color: #555;">Product Name</th>
                <th style="padding: 12px; font-weight: 500; color: #555;">Production Date</th>
                <th style="padding: 12px; font-weight: 500; color: #555;">Stock In</th>
                <th style="padding: 12px; font-weight: 500; color: #555;">Production Status</th>
                <th style="padding: 12px; font-weight: 500; color: #555;">Final Quantity</th>
                <th style="padding: 12px; font-weight: 500; color: #555; text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($productions as $production)
            <tr style="border-bottom: 1px solid #eee;">
                <td style="padding: 12px;">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <div style="width: 32px; height: 32px; background: #eee; border-radius: 4px; display: flex; align-items: center; justify-content: center;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="2"><path d="M18 8h1a4 4 0 0 1 0 8h-1"></path><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path><line x1="6" y1="1" x2="6" y2="4"></line><line x1="10" y1="1" x2="10" y2="4"></line><line x1="14" y1="1" x2="14" y2="4"></line></svg>
                        </div>
                        <span style="font-weight: 500;">{{ $production->product_name }}</span>
                    </div>
                </td>
                <td style="padding: 12px; color: #666;">{{ \Carbon\Carbon::parse($production->production_date)->format('d M Y') }}</td>
                <td style="padding: 12px; color: #666;">{{ $production->stock_in }} kg</td>
                <td style="padding: 12px;">
                    @if($production->production_status == 'In Progress')
                        <span style="background: rgba(243, 156, 18, 0.1); color: #f39c12; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; display: inline-flex; align-items: center; gap: 4px;">
                            <span style="width: 6px; height: 6px; background: #f39c12; border-radius: 50%; display: inline-block;"></span>
                            In Progress
                        </span>
                    @elseif($production->production_status == 'Completed')
                        <span style="background: rgba(46, 204, 113, 0.1); color: #2ecc71; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; display: inline-flex; align-items: center; gap: 4px;">
                            <span style="width: 6px; height: 6px; background: #2ecc71; border-radius: 50%; display: inline-block;"></span>
                            Completed
                        </span>
                    @else
                        <span style="background: rgba(231, 76, 60, 0.1); color: #e74c3c; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; display: inline-flex; align-items: center; gap: 4px;">
                            <span style="width: 6px; height: 6px; background: #e74c3c; border-radius: 50%; display: inline-block;"></span>
                            Failed
                        </span>
                    @endif
                </td>
                <td style="padding: 12px; color: #666;">{{ $production->final_quantity }} kg</td>
                <td style="padding: 12px; text-align: center;">
                    <div style="display: flex; gap: 8px; justify-content: center;">
                        <button class="btn btn--outline" style="padding: 6px; display: inline-flex;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></button>
                        <a href="{{ route('admin.productions.edit', $production) }}" class="btn btn--outline" style="padding: 6px; display: inline-flex;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon></svg></a>
                        <button type="button" class="btn btn--outline btn-delete" data-id="{{ $production->id }}" style="padding: 6px; display: inline-flex; color: #e74c3c; border-color: #ffcdd2;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>
                        <form id="delete-form-{{ $production->id }}" action="{{ route('admin.productions.destroy', $production) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="table-empty" style="padding: 20px; text-align: center; color: #999;">Belum ada data produksi</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px; color: #666; font-size: 0.9rem;">
        <div>
            Showing {{ $productions->firstItem() ?? 0 }} to {{ $productions->lastItem() ?? 0 }} of {{ $totalProduction }} results
        </div>
        <div>
            {{ $productions->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

<!-- Add SweetAlert2 for popups -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.btn-delete');
        
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const productionId = this.getAttribute('data-id');
                
                Swal.fire({
                    title: 'Are you sure to delete this production data?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#4a3b32',
                    confirmButtonText: 'Confirm'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + productionId).submit();
                    }
                });
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
