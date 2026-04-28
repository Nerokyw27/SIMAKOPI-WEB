@extends('layouts.app')

@section('title', 'SIMAKOPI - Sistem Informasi Manajemen Operasional Kopi')

@section('content')

{{-- Hero Section --}}
<section class="hero" id="beranda">
    <div class="hero-overlay"></div>
    <img src="{{ asset('images/hero-coffee.png') }}" alt="SIMAKOPI Hero" class="hero-bg" loading="eager">
    <div class="hero-content">
        <h1 class="hero-title">SIMAKOPI</h1>
        <h2 class="hero-subtitle">Sistem Informasi Manajemen Operasional Kopi<br>untuk Monitoring Produksi dan Penjualan Produk</h2>
        <p class="hero-desc">
            Platform digital yang dirancang untuk membantu
            perusahaan dalam mengelola operasional bisnis kopi,
            khususnya dalam proses produksi, pengelolaan stok, dan
            penjualan produk secara terintegrasi.
        </p>
    </div>
</section>

{{-- Fitur Utama Section --}}
<section class="features" id="fitur">
    <div class="features-container">
        <div class="features-header">
            <h2 class="section-title">Fitur Utama Sistem</h2>
            <span class="section-badge">SIMAKOPI</span>
        </div>

        <div class="features-grid">
            {{-- Feature Card 1 --}}
            <div class="feature-card" id="feature-supplier">
                <div class="feature-icon">
                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#5C3D2E" stroke-width="1.5">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 00-3-3.87"/>
                        <path d="M16 3.13a4 4 0 010 7.75"/>
                    </svg>
                </div>
                <h3 class="feature-title">Manajemen Supplier</h3>
                <p class="feature-desc">Kelola kerja sama dengan supplier kopi dari proses pengiriman bahan baku secara mudah dan terintegrasi.</p>
            </div>

            {{-- Feature Card 2 --}}
            <div class="feature-card" id="feature-produk">
                <div class="feature-icon">
                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#5C3D2E" stroke-width="1.5">
                        <rect x="2" y="3" width="20" height="18" rx="2"/>
                        <line x1="8" y1="3" x2="8" y2="21"/>
                        <line x1="2" y1="9" x2="22" y2="9"/>
                        <line x1="2" y1="15" x2="22" y2="15"/>
                    </svg>
                </div>
                <h3 class="feature-title">Manajemen Produk</h3>
                <p class="feature-desc">Atur data produk kopi dan kelola stok dengan sistem yang menyediakan monitoring secara praktis dan efisien.</p>
            </div>

            {{-- Feature Card 3 --}}
            <div class="feature-card" id="feature-transaksi">
                <div class="feature-icon">
                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#5C3D2E" stroke-width="1.5">
                        <rect x="1" y="4" width="22" height="16" rx="2"/>
                        <line x1="1" y1="10" x2="23" y2="10"/>
                        <path d="M7 15h4"/>
                        <path d="M15 15h2"/>
                    </svg>
                </div>
                <h3 class="feature-title">Sistem Transaksi</h3>
                <p class="feature-desc">Kelola proses pemesanan dan penjualan produk secara praktis dan efisien.</p>
            </div>

            {{-- Feature Card 4 --}}
            <div class="feature-card" id="feature-laporan">
                <div class="feature-icon">
                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#5C3D2E" stroke-width="1.5">
                        <rect x="3" y="3" width="18" height="18" rx="2"/>
                        <path d="M7 8h10"/>
                        <path d="M7 12h6"/>
                        <path d="M7 16h8"/>
                    </svg>
                </div>
                <h3 class="feature-title">Laporan & Analitik</h3>
                <p class="feature-desc">Pantau laporan produksi dan penjualan secara ringkas untuk mendukung pengambilan keputusan.</p>
            </div>
        </div>
    </div>
</section>

{{-- CTA Banner Section --}}
<section class="cta-banner" id="cta-banner">
    <div class="cta-overlay"></div>
    <img src="{{ asset('images/coffee-beans-banner.png') }}" alt="Coffee Beans" class="cta-bg" loading="lazy">
    <div class="cta-content">
        <h2 class="cta-title"><span>Check Out</span><span>Our Best</span><span>Coffee Beans</span></h2>
        <a href="#fitur" class="cta-btn" id="explore-btn">Explore Our Products &raquo;</a>
    </div>
</section>

{{-- Tentang Section --}}
<section class="about" id="tentang">
    <div class="about-container">
        <div class="about-image">
            <img src="{{ asset('images/about-coffee.png') }}" alt="Tentang SIMAKOPI" loading="lazy">
        </div>
        <div class="about-content">
            <h2 class="about-title">Tentang SIMAKOPI</h2>
            <p class="about-desc">
                SIMAKOPI merupakan platform sistem informasi berbasis web yang
                dikembangkan untuk mengintegrasikan seluruh proses operasional
                bisnis kopi dalam satu sistem terpadu. Sistem ini mencakup
                pengelolaan produksi, stok, serta penjualan produk secara efisien
                dan terstruktur. Dengan adanya SIMAKOPI, pelaku usaha dapat
                meningkatkan produktivitas, meminimalisir kesalahan pencatatan,
                serta mempermudah pengambilan keputusan berbasis data.
            </p>
            <ul class="about-features">
                <li>
                    <span class="check-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" fill="#5C3D2E"/>
                            <path d="M8 12l3 3 5-5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Manajemen produksi yang terstruktur
                </li>
                <li>
                    <span class="check-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" fill="#5C3D2E"/>
                            <path d="M8 12l3 3 5-5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Sistem pemesanan dan penjualan online
                </li>
                <li>
                    <span class="check-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" fill="#5C3D2E"/>
                            <path d="M8 12l3 3 5-5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Pengelolaan stok yang efisien
                </li>
            </ul>
        </div>
    </div>
</section>

@guest
{{-- Auth Modal Overlay (only for guests) --}}
<div class="auth-overlay" id="auth-overlay">
    <div class="auth-backdrop" id="auth-backdrop"></div>

    {{-- Welcome Modal --}}
    <div class="auth-modal" id="modal-welcome">
        <div class="auth-modal-body auth-welcome">
            <div class="auth-welcome-logo">
                <img src="{{ asset('images/logo-nawasena.png') }}" alt="SIMAKOPI" width="48" height="48">
                <div class="auth-welcome-brand">
                    <span class="brand-name">SIMAKOPI</span>
                    <span class="brand-sub">PT Nawasena Group</span>
                </div>
            </div>
            <h2 class="auth-welcome-title">Selamat Datang di SIMAKOPI</h2>
            <p class="auth-welcome-desc">Akses sistem untuk mendapatkan<br>experience yang lebih baik</p>
            <button class="auth-btn auth-btn--primary" id="btn-to-login" type="button">Masuk</button>
            <div class="auth-divider"><span>atau</span></div>
            <button class="auth-btn auth-btn--outline" id="btn-to-register" type="button">Daftar Sekarang</button>
            <p class="auth-link-text">Belum punya akun? <a href="#" id="link-to-register" class="auth-link">Daftar</a></p>
        </div>
    </div>

    {{-- Login Modal --}}
    <div class="auth-modal auth-modal--hidden" id="modal-login">
        <div class="auth-modal-body">
            <h2 class="auth-form-title">Selamat Datang di SIMAKOPI</h2>
            <div class="auth-tabs">
                <button class="auth-tab active" id="tab-login-masuk" type="button">Masuk</button>
                <button class="auth-tab" id="tab-login-daftar" type="button">Daftar</button>
            </div>
            <form id="login-form" class="auth-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="auth-field">
                    <label for="login-username">Username</label>
                    <input type="text" id="login-username" name="username" placeholder="Kim_ming" autocomplete="username" required>
                </div>
                <div class="auth-field">
                    <label for="login-password">Password</label>
                    <input type="password" id="login-password" name="password" placeholder="*********" autocomplete="current-password" required>
                </div>
                <button type="submit" class="auth-btn auth-btn--primary auth-btn--submit">Login</button>
            </form>
        </div>
    </div>

    {{-- Register Modal --}}
    <div class="auth-modal auth-modal--hidden" id="modal-register">
        <div class="auth-modal-body">
            <h2 class="auth-form-title">Selamat Datang di SIMAKOPI</h2>
            <div class="auth-tabs">
                <button class="auth-tab" id="tab-register-masuk" type="button">Masuk</button>
                <button class="auth-tab active" id="tab-register-daftar" type="button">Daftar</button>
            </div>
            <form id="register-form" class="auth-form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="auth-field">
                    <label for="reg-nama">Nama Lengkap</label>
                    <input type="text" id="reg-nama" name="full_name" placeholder="Kim Mingyu" autocomplete="name" required maxlength="25">
                </div>
                <div class="auth-field">
                    <label for="reg-username">Username</label>
                    <input type="text" id="reg-username" name="username" placeholder="Kim_ming" autocomplete="username" required maxlength="25">
                </div>
                <div class="auth-field">
                    <label for="reg-email">Email</label>
                    <input type="email" id="reg-email" name="email" placeholder="kamu@email.com" autocomplete="email" required maxlength="30">
                </div>
                <div class="auth-field">
                    <label for="reg-alamat">Alamat</label>
                    <input type="text" id="reg-alamat" name="address" placeholder="Jalan rumah kamu" autocomplete="street-address" required maxlength="100">
                </div>
                <div class="auth-field">
                    <label for="reg-password">Password</label>
                    <input type="password" id="reg-password" name="password" placeholder="*********" autocomplete="new-password" required minlength="6">
                </div>
                <div class="auth-field">
                    <label for="reg-confirm">Konfirmasi Password</label>
                    <input type="password" id="reg-confirm" name="password_confirmation" placeholder="*********" autocomplete="new-password" required minlength="6">
                </div>
                <div class="auth-btn-group">
                    <button type="button" class="auth-btn auth-btn--primary auth-btn--cancel" id="btn-cancel-register">Cancel</button>
                    <button type="submit" class="auth-btn auth-btn--outline auth-btn--save">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endguest

{{-- Toast Notification --}}
<div id="toast-notification" class="toast-notification toast-notification--hidden" role="alert" aria-live="assertive">
    <span class="toast-icon" id="toast-icon"></span>
    <span class="toast-message" id="toast-message"></span>
</div>

@endsection

@push('scripts')
<style>
/* ===== Toast Notification ===== */
.toast-notification {
    position: fixed;
    top: 88px;
    left: 50%;
    transform: translateX(-50%) translateY(0);
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px 24px;
    border-radius: 10px;
    background: #ffffff;
    box-shadow: 0 8px 32px rgba(0,0,0,0.18), 0 2px 8px rgba(0,0,0,0.10);
    font-size: 15px;
    font-weight: 500;
    color: #1a1a1a;
    z-index: 99999;
    min-width: 280px;
    max-width: 480px;
    transition: opacity 0.35s ease, transform 0.35s ease;
    opacity: 1;
    border-left: 5px solid transparent;
}
.toast-notification--hidden {
    opacity: 0;
    pointer-events: none;
    transform: translateX(-50%) translateY(-14px);
}
.toast-notification--success { border-left-color: #22c55e; }
.toast-notification--warning { border-left-color: #f59e0b; }
.toast-notification--error   { border-left-color: #ef4444; }
.toast-notification--info    { border-left-color: #3b82f6; }

.toast-icon { flex-shrink: 0; display: flex; align-items: center; }
.toast-message { flex: 1; line-height: 1.4; }
</style>
<script>
    // ========== Toast Notification ==========
    const toast = document.getElementById('toast-notification');
    const toastIcon = document.getElementById('toast-icon');
    const toastMsg = document.getElementById('toast-message');
    let toastTimer = null;

    const showToast = (type, message) => {
        if (toastTimer) clearTimeout(toastTimer);
        toast.className = 'toast-notification';
        toast.classList.add('toast-notification--' + type);
        const icons = {
            success: `<svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" fill="#22c55e"/><path d="M7 12l3.5 3.5L17 9" stroke="white" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>`,
            warning: `<svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" fill="#f59e0b"/><path d="M12 7v5" stroke="white" stroke-width="2.2" stroke-linecap="round"/><circle cx="12" cy="16" r="1.2" fill="white"/></svg>`,
            error:   `<svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" fill="#ef4444"/><path d="M8 8l8 8M16 8l-8 8" stroke="white" stroke-width="2.2" stroke-linecap="round"/></svg>`,
            info:    `<svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" fill="#3b82f6"/><path d="M12 11v5" stroke="white" stroke-width="2.2" stroke-linecap="round"/><circle cx="12" cy="8" r="1.2" fill="white"/></svg>`,
        };
        toastIcon.innerHTML = icons[type] || icons.info;
        toastMsg.textContent = message;
        toast.classList.remove('toast-notification--hidden');
        toastTimer = setTimeout(() => {
            toast.classList.add('toast-notification--hidden');
        }, 4000);
    };

    // Show server-side toast
    document.addEventListener('DOMContentLoaded', () => {
        if (window.__TOAST__) {
            showToast(window.__TOAST__.type, window.__TOAST__.message);
        }
    });

    @guest
    // ========== Auth Modal Logic ==========
    const authOverlay = document.getElementById('auth-overlay');
    const modalWelcome = document.getElementById('modal-welcome');
    const modalLogin = document.getElementById('modal-login');
    const modalRegister = document.getElementById('modal-register');

    const showModal = (modal) => {
        modalWelcome.classList.add('auth-modal--hidden');
        modalLogin.classList.add('auth-modal--hidden');
        modalRegister.classList.add('auth-modal--hidden');
        modal.classList.remove('auth-modal--hidden');
    };

    const closeAuth = () => {
        authOverlay.classList.add('auth-overlay--hidden');
        document.body.style.overflow = '';
    };

    const openAuth = () => {
        showModal(modalWelcome);
        authOverlay.classList.remove('auth-overlay--hidden');
        document.body.style.overflow = 'hidden';
    };

    // Show modal on page load
    document.addEventListener('DOMContentLoaded', () => {
        if (window.__SHOW_LOGIN__) {
            showModal(modalLogin);
            authOverlay.classList.remove('auth-overlay--hidden');
            document.body.style.overflow = 'hidden';
        } else if (!window.__TOAST__) {
            openAuth();
        }

        // Show modal again if server returned validation error
        @if($errors->any())
            openAuth();
            showModal(modalLogin);
        @endif
    });

    // User icon opens modal
    const userIconBtn = document.getElementById('user-icon-btn');
    if (userIconBtn) {
        userIconBtn.addEventListener('click', (e) => {
            e.preventDefault();
            openAuth();
        });
    }

    // Welcome → Login
    document.getElementById('btn-to-login').addEventListener('click', () => showModal(modalLogin));

    // Welcome → Register
    document.getElementById('btn-to-register').addEventListener('click', () => showModal(modalRegister));
    document.getElementById('link-to-register').addEventListener('click', (e) => {
        e.preventDefault();
        showModal(modalRegister);
    });

    // Login tabs
    document.getElementById('tab-login-daftar').addEventListener('click', () => showModal(modalRegister));
    document.getElementById('tab-register-masuk').addEventListener('click', () => showModal(modalLogin));

    // Cancel register → welcome
    document.getElementById('btn-cancel-register').addEventListener('click', () => showModal(modalWelcome));
    @endguest

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const navHeight = document.querySelector('.navbar').offsetHeight;
                const targetPosition = target.offsetTop - navHeight;
                window.scrollTo({ top: targetPosition, behavior: 'smooth' });
            }
            const navMenu = document.getElementById('navbar-menu');
            const mobileBtn = document.getElementById('mobile-menu-btn');
            if (navMenu) navMenu.classList.remove('active');
            if (mobileBtn) mobileBtn.classList.remove('active');
        });
    });

    // Mobile menu toggle
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const navMenu = document.getElementById('navbar-menu');
    if (mobileBtn && navMenu) {
        mobileBtn.addEventListener('click', () => {
            mobileBtn.classList.toggle('active');
            navMenu.classList.toggle('active');
        });
    }

    // Navbar scroll effect
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Scroll animations
    const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -50px 0px' };
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) entry.target.classList.add('animate-in');
        });
    }, observerOptions);
    document.querySelectorAll('.feature-card, .about-image, .about-content, .cta-content').forEach(el => {
        observer.observe(el);
    });

    // User dropdown toggle
    const dropdownBtn = document.getElementById('user-dropdown-btn');
    const dropdownMenu = document.getElementById('user-dropdown-menu');
    if (dropdownBtn && dropdownMenu) {
        dropdownBtn.addEventListener('click', () => {
            dropdownMenu.classList.toggle('show');
        });
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.user-dropdown')) {
                dropdownMenu.classList.remove('show');
            }
        });
    }
</script>
@endpush