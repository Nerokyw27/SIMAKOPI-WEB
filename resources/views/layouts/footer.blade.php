<footer class="footer" id="footer">
    <div class="footer-main">
        <div class="footer-container">
            {{-- Brand Column --}}
            <div class="footer-brand">
                <div class="footer-logo">
                    <div class="brand-icon brand-icon--light">
                        <img src="{{ asset('images/logo-nawasena.png') }}" alt="Nawasena Group Logo" width="36" height="36" class="footer-logo-img">
                    </div>
                    <div class="brand-text brand-text--light">
                        <span class="brand-name">SIMAKOPI</span>
                        <span class="brand-sub">PT NAWASENA GROUP</span>
                    </div>
                </div>
                <p class="footer-desc">
                    Sistem Informasi Manajemen Operasional Kopi<br>
                    untuk Monitoring Produksi dan Penjualan Produk
                </p>
            </div>

            {{-- Menu Column --}}
            <div class="footer-links">
                <h4 class="footer-title">Menu</h4>
                <ul>
                    <li><a href="#beranda" id="footer-beranda">Beranda</a></li>
                    <li><a href="#fitur" id="footer-fitur">Fitur</a></li>
                    <li><a href="#tentang" id="footer-tentang">Tentang</a></li>
                </ul>
            </div>

            {{-- Kontak Column --}}
            <div class="footer-contact">
                <h4 class="footer-title">Kontak</h4>
                <ul>
                    <li>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="2" y="4" width="20" height="16" rx="2"/>
                            <path d="M22 4L12 13L2 4"/>
                        </svg>
                        simakopi@email.com
                    </li>
                    <li>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/>
                        </svg>
                        +62 8743 6769 283
                    </li>
                    <li>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                        Jember, Jawa Timur
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="footer-container">
            <p>&copy; {{ date('Y') }} SIMAKOPI. All rights reserved.</p>
        </div>
    </div>
</footer>
