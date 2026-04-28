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
            <li><a href="#beranda" class="nav-link active" id="nav-beranda">Beranda</a></li>
            <li><a href="#fitur" class="nav-link" id="nav-fitur">Fitur</a></li>
            <li><a href="#tentang" class="nav-link" id="nav-tentang">Tentang</a></li>
        </ul>

        <div class="navbar-actions">
            <a href="#" class="user-icon" id="user-icon-btn" title="Login">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="8" r="4" stroke="#333" stroke-width="1.8"/>
                    <path d="M5 20C5 17.2386 8.13401 15 12 15C15.866 15 19 17.2386 19 20" stroke="#333" stroke-width="1.8" stroke-linecap="round"/>
                </svg>
            </a>
            <button class="mobile-menu-btn" id="mobile-menu-btn" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</nav>
