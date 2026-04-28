<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SIMAKOPI Dashboard')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @stack('styles')
</head>
<body class="dashboard-body">
    <div class="dashboard-wrapper">
        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Main --}}
        <div class="dashboard-main">
            {{-- Top Bar --}}
            <header class="dashboard-topbar">
                <button class="sidebar-toggle" id="sidebar-toggle" aria-label="Toggle sidebar">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                </button>
                <div class="topbar-title">
                    <h1>@yield('page-title', 'Dashboard')</h1>
                </div>
                <div class="topbar-actions">
                    <div class="topbar-user">
                        <div class="user-avatar user-avatar--sm">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <div class="topbar-user-info">
                            <span class="topbar-user-name">{{ auth()->user()->name }}</span>
                            <span class="topbar-user-role">{{ ucfirst(auth()->user()->role) }}</span>
                        </div>
                    </div>
                </div>
            </header>

            {{-- Content --}}
            <div class="dashboard-content">
                @yield('dashboard-content')
            </div>
        </div>
    </div>

    {{-- Toast --}}
    <div id="toast-notification" class="toast-notification toast-notification--hidden" role="alert" aria-live="assertive">
        <span class="toast-icon" id="toast-icon"></span>
        <span class="toast-message" id="toast-message"></span>
    </div>

    @if(session('toast'))
    <script>window.__TOAST__ = @json(session('toast'));</script>
    @endif

    <script>
        // Toast
        const toast = document.getElementById('toast-notification');
        const toastIcon = document.getElementById('toast-icon');
        const toastMsg = document.getElementById('toast-message');
        let toastTimer = null;
        const showToast = (type, message) => {
            if (toastTimer) clearTimeout(toastTimer);
            toast.className = 'toast-notification toast-notification--' + type;
            const icons = {
                success: `<svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" fill="#22c55e"/><path d="M7 12l3.5 3.5L17 9" stroke="white" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>`,
                warning: `<svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" fill="#f59e0b"/><path d="M12 7v5" stroke="white" stroke-width="2.2" stroke-linecap="round"/><circle cx="12" cy="16" r="1.2" fill="white"/></svg>`,
                error:   `<svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" fill="#ef4444"/><path d="M8 8l8 8M16 8l-8 8" stroke="white" stroke-width="2.2" stroke-linecap="round"/></svg>`,
                info:    `<svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" fill="#3b82f6"/><path d="M12 11v5" stroke="white" stroke-width="2.2" stroke-linecap="round"/><circle cx="12" cy="8" r="1.2" fill="white"/></svg>`,
            };
            toastIcon.innerHTML = icons[type] || icons.info;
            toastMsg.textContent = message;
            toast.classList.remove('toast-notification--hidden');
            toastTimer = setTimeout(() => toast.classList.add('toast-notification--hidden'), 4000);
        };
        if (window.__TOAST__) showToast(window.__TOAST__.type, window.__TOAST__.message);

        // Sidebar toggle
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const dashboardWrapper = document.querySelector('.dashboard-wrapper');
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', () => {
                dashboardWrapper.classList.toggle('sidebar-collapsed');
            });
        }
    </script>
    @stack('scripts')
</body>
</html>
