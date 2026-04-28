@extends('layouts.dashboard')
@section('title', 'Customer Data - SIMAKOPI')
@section('page-title', 'Customer Data')

@section('dashboard-content')
<div class="data-table-wrapper">
    <table class="data-table" id="customer-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Full Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($customers as $index => $customer)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $customer->name }}</td>
                <td>
                    <a href="{{ route('admin.customers.show', $customer) }}" class="btn btn--sm btn--outline">Detail</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="table-empty">Belum ada data customer</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
