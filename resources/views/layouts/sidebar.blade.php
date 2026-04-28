<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <a href="{{ url('/') }}" class="sidebar-brand">
            <img src="{{ asset('images/logo-nawasena.png') }}" alt="SIMAKOPI" width="32" height="32">
            <div class="sidebar-brand-text">
                <span class="brand-name">SIMAKOPI</span>
                <span class="brand-sub">PT Nawasena Group</span>
            </div>
        </a>
    </div>

    <nav class="sidebar-nav">
        <div class="sidebar-section">
            <span class="sidebar-section-title">Menu</span>

            @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.suppliers.index') }}" class="sidebar-link {{ request()->routeIs('admin.suppliers.*') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                    <span>Supplier Data</span>
                </a>
                <a href="{{ route('admin.customers.index') }}" class="sidebar-link {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    <span>Customer Data</span>
                </a>
                <a href="{{ route('admin.profile.show') }}" class="sidebar-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="8" r="4"/><path d="M5 20c0-2.761 3.134-5 7-5s7 2.239 7 5"/></svg>
                    <span>Profile</span>
                </a>
            @elseif(auth()->user()->isSupplier())
                <a href="{{ route('supplier.dashboard') }}" class="sidebar-link {{ request()->routeIs('supplier.dashboard') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('supplier.profile.show') }}" class="sidebar-link {{ request()->routeIs('supplier.profile.*') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="8" r="4"/><path d="M5 20c0-2.761 3.134-5 7-5s7 2.239 7 5"/></svg>
                    <span>Profile</span>
                </a>
            @elseif(auth()->user()->isCustomer())
                <a href="{{ route('customer.dashboard') }}" class="sidebar-link {{ request()->routeIs('customer.dashboard') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('customer.profile.show') }}" class="sidebar-link {{ request()->routeIs('customer.profile.*') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="8" r="4"/><path d="M5 20c0-2.761 3.134-5 7-5s7 2.239 7 5"/></svg>
                    <span>Profile</span>
                </a>
            @endif
        </div>
    </nav>

    <div class="sidebar-footer">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="sidebar-link sidebar-link--logout">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>
