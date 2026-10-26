<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard — Nova Platform</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .glass-card {
            background: rgba(18, 24, 38, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
    </style>
</head>
<body class="bg-[#0B0F19] text-slate-100 antialiased min-h-screen flex flex-col justify-between">

    <!-- Background Orbs -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden z-0" aria-hidden="true">
        <div class="absolute -top-40 left-1/3 w-96 h-96 bg-indigo-600/15 rounded-full blur-[128px]"></div>
    </div>

    <!-- Top Navigation -->
    <nav class="relative z-10 border-b border-slate-800 bg-[#0B0F19]/80 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Brand -->
                <div class="flex items-center gap-6">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-tr from-indigo-500 to-purple-500 p-0.5">
                            <div class="w-full h-full bg-[#0B0F19] rounded-[6px] flex items-center justify-center">
                                <svg class="w-4 h-4 text-indigo-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                </svg>
                            </div>
                        </div>
                        <span class="text-lg font-bold text-white">Nova<span class="text-indigo-400">.</span></span>
                    </a>

                    <div class="hidden sm:flex items-center gap-4 text-sm text-slate-300">
                        <a href="{{ route('dashboard') }}" class="text-white font-medium px-3 py-1.5 rounded-lg bg-slate-800/80">Ringkasan</a>
                        <a href="{{ route('home') }}" class="hover:text-white px-3 py-1.5 rounded-lg transition-colors">Landing Page</a>
                    </div>
                </div>

                <!-- User profile & Logout -->
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-500 flex items-center justify-center font-bold text-xs text-white">
                            {{ strtoupper(substr($user->name, 0, 2)) }}
                        </div>
                        <div class="hidden md:block text-left text-xs">
                            <p class="font-semibold text-white">{{ $user->name }}</p>
                            <p class="text-slate-400">{{ $user->email }}</p>
                        </div>
                    </div>

                    <!-- Logout Form -->
                    <form action="{{ route('logout') }}" method="POST" id="logout-form">
                        @csrf
                        <button
                            type="submit"
                            id="btn-logout"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold text-rose-300 bg-rose-500/10 hover:bg-rose-500/20 border border-rose-500/20 transition-all"
                        >
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex-grow w-full">
        <!-- Welcome Banner -->
        <div class="p-6 sm:p-8 rounded-2xl bg-gradient-to-r from-indigo-900/50 via-purple-900/40 to-slate-900/60 border border-indigo-500/20 shadow-xl mb-8 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <div>
                <span class="inline-flex items-center gap-1.5 text-xs font-medium text-emerald-400 bg-emerald-500/10 px-2.5 py-1 rounded-full mb-3 border border-emerald-500/20">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span> Sesi Autentikasi Aktif
                </span>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white">
                    Halo, {{ $user->name }}! 👋
                </h1>
                <p class="text-slate-300 text-sm mt-1 max-w-xl">
                    Anda berhasil masuk ke dashboard internal Nova. Dari sini Anda dapat memantau alur kerja, performa server, dan status integrasi.
                </p>
            </div>
            <a href="{{ route('home') }}" class="px-5 py-2.5 rounded-xl text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-500 transition-colors shadow-md shadow-indigo-600/30">
                Lihat Landing Page
            </a>
        </div>

        <!-- Metric Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
            <div class="glass-card p-5 rounded-xl">
                <p class="text-xs font-medium text-slate-400">Total Proyek</p>
                <p class="text-2xl font-bold text-white mt-1">8</p>
                <span class="text-xs text-emerald-400 font-semibold">Semua aktif</span>
            </div>
            <div class="glass-card p-5 rounded-xl">
                <p class="text-xs font-medium text-slate-400">API Requests (Bulan Ini)</p>
                <p class="text-2xl font-bold text-white mt-1">128,490</p>
                <span class="text-xs text-indigo-400 font-semibold">↑ 24% dari minggu lalu</span>
            </div>
            <div class="glass-card p-5 rounded-xl">
                <p class="text-xs font-medium text-slate-400">Penyimpanan Terpakai</p>
                <p class="text-2xl font-bold text-white mt-1">4.2 GB</p>
                <span class="text-xs text-slate-400">dari kuota 50 GB</span>
            </div>
            <div class="glass-card p-5 rounded-xl">
                <p class="text-xs font-medium text-slate-400">Status Server</p>
                <p class="text-2xl font-bold text-emerald-400 mt-1">99.99%</p>
                <span class="text-xs text-slate-400">Operasional normal</span>
            </div>
        </div>

        <!-- User Information Card -->
        <div class="glass-card rounded-2xl p-6 sm:p-8">
            <h2 class="text-lg font-bold text-white mb-4">Informasi Akun Anda</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-sm">
                <div class="bg-slate-900/60 p-4 rounded-xl border border-slate-800/80">
                    <span class="text-xs text-slate-400 block mb-1">Nama Lengkap</span>
                    <span class="font-semibold text-white">{{ $user->name }}</span>
                </div>
                <div class="bg-slate-900/60 p-4 rounded-xl border border-slate-800/80">
                    <span class="text-xs text-slate-400 block mb-1">Email Terdaftar</span>
                    <span class="font-semibold text-white">{{ $user->email }}</span>
                </div>
                <div class="bg-slate-900/60 p-4 rounded-xl border border-slate-800/80">
                    <span class="text-xs text-slate-400 block mb-1">Waktu Verifikasi Email</span>
                    <span class="font-semibold text-white">{{ $user->email_verified_at ? $user->email_verified_at->format('d M Y, H:i') : 'Belum Diverifikasi' }}</span>
                </div>
                <div class="bg-slate-900/60 p-4 rounded-xl border border-slate-800/80">
                    <span class="text-xs text-slate-400 block mb-1">Waktu Akun Dibuat</span>
                    <span class="font-semibold text-white">{{ $user->created_at ? $user->created_at->format('d M Y, H:i') : '-' }}</span>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-800/80 bg-[#070A12] py-6 text-xs text-slate-400 relative z-10 text-center">
        <span>© {{ date('Y') }} Nova Platform • Dashboard Terautentikasi</span>
    </footer>
</body>
</html>
