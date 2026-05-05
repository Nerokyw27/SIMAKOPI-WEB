@extends('layouts.dashboard')
@section('title', 'Supplier Data - SIMAKOPI')
@section('page-title', 'Supplier Data')

@section('dashboard-content')
<div class="page-actions">
    <a href="{{ route('admin.suppliers.create') }}" class="btn btn--primary">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        Add Supplier
    </a>
</div>

<div class="data-table-wrapper">
    <table class="data-table" id="supplier-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Supplier Name</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($suppliers as $index => $supplier)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $supplier->supplier_name }}</td>
                <td>
                    <div class="table-avatar">
                        @if($supplier->image)
                            <img src="{{ asset('storage/' . $supplier->image) }}" alt="{{ $supplier->supplier_name }}">
                        @else
                            {{ strtoupper(substr($supplier->supplier_name, 0, 1)) }}
                        @endif
                    </div>
                </td>
                <td>
                    <a href="{{ route('admin.suppliers.show', $supplier) }}" class="btn btn--sm btn--outline">Detail</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="table-empty">Belum ada data supplier</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
