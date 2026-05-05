<nav class="navbar" id="navbar">
    <div class="navbar-container">
        <a href="{{ url('/') }}" class="navbar-brand" id="navbar-brand">
            <div class="brand-icon">
                <img src="{{ asset('images/logo-nawasena.png') }}" alt="Nawasena Group Logo" width="36" height="36">
            </div>
            <div class="brand-text">
                <span class="brand-name">SIMAKOPI</span>
                <span class="brand-sub">PT Nawasena Group</span>
            </div>
        </a>

        <ul class="navbar-menu" id="navbar-menu">
            @auth
                @if(auth()->user()->isAdmin())
                    <li><a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.suppliers.index') }}" class="nav-link {{ request()->routeIs('admin.suppliers.*') ? 'active' : '' }}">Supplier Data</a></li>
                    <li><a href="{{ route('admin.customers.index') }}" class="nav-link {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">Customer Data</a></li>
                @elseif(auth()->user()->isSupplier())
                    <li><a href="{{ route('supplier.dashboard') }}" class="nav-link {{ request()->routeIs('supplier.dashboard') ? 'active' : '' }}">Dashboard</a></li>
                @elseif(auth()->user()->isCustomer())
                    <li><a href="{{ route('customer.dashboard') }}" class="nav-link {{ request()->routeIs('customer.dashboard') ? 'active' : '' }}">Dashboard</a></li>
                @endif
            @else
                <li><a href="#beranda" class="nav-link active" id="nav-beranda">Beranda</a></li>
                <li><a href="#fitur" class="nav-link" id="nav-fitur">Fitur</a></li>
                <li><a href="#tentang" class="nav-link" id="nav-tentang">Tentang</a></li>
            @endauth
        </ul>

        <div class="navbar-actions">
            @auth
                <div class="user-dropdown" id="user-dropdown">
                    <button class="user-dropdown-btn" id="user-dropdown-btn" type="button">
                        <div class="user-avatar">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <span class="user-dropdown-name">{{ auth()->user()->name }}</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="user-dropdown-menu" id="user-dropdown-menu">
                        <div class="dropdown-user-info">
                            <span class="dropdown-user-name">{{ auth()->user()->name }}</span>
                            <span class="dropdown-user-role">{{ ucfirst(auth()->user()->role) }}</span>
                        </div>
                        <div class="dropdown-divider"></div>
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.profile.show') }}" class="dropdown-item">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M5 20c0-2.761 3.134-5 7-5s7 2.239 7 5"/></svg>
                                Profile
                            </a>
                        @elseif(auth()->user()->isSupplier())
                            <a href="{{ route('supplier.profile.show') }}" class="dropdown-item">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M5 20c0-2.761 3.134-5 7-5s7 2.239 7 5"/></svg>
                                Profile
                            </a>
                        @elseif(auth()->user()->isCustomer())
                            <a href="{{ route('customer.profile.show') }}" class="dropdown-item">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M5 20c0-2.761 3.134-5 7-5s7 2.239 7 5"/></svg>
                                Profile
                            </a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" id="logout-form">
                            @csrf
                            <button type="submit" class="dropdown-item dropdown-item--danger">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a href="#" class="user-icon" id="user-icon-btn" title="Login">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="8" r="4" stroke="#333" stroke-width="1.8"/>
                        <path d="M5 20C5 17.2386 8.13401 15 12 15C15.866 15 19 17.2386 19 20" stroke="#333" stroke-width="1.8" stroke-linecap="round"/>
                    </svg>
                </a>
            @endauth
            <button class="mobile-menu-btn" id="mobile-menu-btn" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</nav>
