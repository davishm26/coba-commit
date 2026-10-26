<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nova — Platform Modern untuk Membangun & Mengembangkan Produk Digital</title>
    <meta name="description" content="Platform terintegrasi all-in-one untuk mempercepat workflow pengembangan aplikasi web, kolaborasi tim, dan infrastruktur cloud modern.">

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
        .bg-grid-pattern {
            background-size: 40px 40px;
            background-image: 
                linear-gradient(to right, rgba(255, 255, 255, 0.05) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
        }
        .glass-card {
            background: rgba(18, 24, 38, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .glow-effect {
            box-shadow: 0 0 50px -10px rgba(99, 102, 241, 0.35);
        }
    </style>
</head>
<body class="bg-[#0B0F19] text-slate-100 antialiased selection:bg-indigo-500 selection:text-white overflow-x-hidden min-h-screen flex flex-col justify-between">

    <!-- Ambient Glow / Background Orbs -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden z-0" aria-hidden="true">
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-indigo-600/25 rounded-full blur-[128px]"></div>
        <div class="absolute top-1/3 -right-40 w-96 h-96 bg-purple-600/20 rounded-full blur-[128px]"></div>
        <div class="absolute -bottom-20 left-1/2 -translate-x-1/2 w-[600px] h-60 bg-blue-600/15 rounded-full blur-[120px]"></div>
    </div>

    <!-- Header / Navbar -->
    <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 backdrop-blur-md bg-[#0B0F19]/80 border-b border-slate-800/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Logo -->
                <a href="#" class="flex items-center gap-3 group" id="brand-logo">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-indigo-500 via-purple-500 to-pink-500 p-0.5 shadow-lg shadow-indigo-500/30 group-hover:scale-105 transition-transform duration-300">
                        <div class="w-full h-full bg-[#0B0F19] rounded-[10px] flex items-center justify-center">
                            <svg class="w-5 h-5 text-indigo-400 group-hover:text-white transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                        </div>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-white group-hover:text-indigo-300 transition-colors">
                        Nova<span class="text-indigo-400">.</span>
                    </span>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex items-center gap-8" aria-label="Main Navigation">
                    <a href="#fitur" class="text-sm font-medium text-slate-300 hover:text-white hover:underline underline-offset-8 transition-colors">Fitur</a>
                    <a href="#cara-kerja" class="text-sm font-medium text-slate-300 hover:text-white hover:underline underline-offset-8 transition-colors">Cara Kerja</a>
                    <a href="#harga" class="text-sm font-medium text-slate-300 hover:text-white hover:underline underline-offset-8 transition-colors">Harga</a>
                    <a href="#faq" class="text-sm font-medium text-slate-300 hover:text-white hover:underline underline-offset-8 transition-colors">FAQ</a>
                </nav>

                <!-- Action Buttons -->
                <div class="hidden md:flex items-center gap-4">
                    @auth
                        <a href="{{ route('dashboard') }}" id="btn-dashboard-desktop" class="relative group inline-flex items-center justify-center px-5 py-2.5 text-sm font-semibold text-white transition-all bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl hover:from-indigo-400 hover:to-purple-500 shadow-md shadow-indigo-500/25 hover:shadow-indigo-500/40 hover:-translate-y-0.5">
                            <span>Buka Dashboard</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('login') }}" id="btn-login-desktop" class="text-sm font-semibold text-slate-300 hover:text-white px-4 py-2 rounded-lg transition-colors">
                            Masuk
                        </a>
                        <a href="{{ route('login') }}" id="btn-register-desktop" class="relative group inline-flex items-center justify-center px-5 py-2.5 text-sm font-semibold text-white transition-all bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl hover:from-indigo-400 hover:to-purple-500 shadow-md shadow-indigo-500/25 hover:shadow-indigo-500/40 hover:-translate-y-0.5">
                            <span>Coba Gratis</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button type="button" id="mobile-menu-button" class="p-2 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/80 focus:outline-none focus:ring-2 focus:ring-indigo-500" aria-label="Toggle menu">
                        <svg id="menu-icon-open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                        <svg id="menu-icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden md:hidden border-b border-slate-800 bg-[#0B0F19]/95 backdrop-blur-xl px-4 pt-3 pb-6 space-y-3">
            <a href="#fitur" class="block px-3 py-2 rounded-md text-base font-medium text-slate-300 hover:text-white hover:bg-slate-800">Fitur</a>
            <a href="#cara-kerja" class="block px-3 py-2 rounded-md text-base font-medium text-slate-300 hover:text-white hover:bg-slate-800">Cara Kerja</a>
            <a href="#harga" class="block px-3 py-2 rounded-md text-base font-medium text-slate-300 hover:text-white hover:bg-slate-800">Harga</a>
            <a href="#faq" class="block px-3 py-2 rounded-md text-base font-medium text-slate-300 hover:text-white hover:bg-slate-800">FAQ</a>
            <div class="pt-4 border-t border-slate-800 flex flex-col gap-2">
                @auth
                    <a href="{{ route('dashboard') }}" class="text-center px-4 py-2.5 rounded-lg text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-500">Buka Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-center px-4 py-2.5 rounded-lg text-sm font-medium text-slate-300 bg-slate-800 hover:bg-slate-700">Masuk</a>
                    <a href="{{ route('login') }}" class="text-center px-4 py-2.5 rounded-lg text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-500">Coba Gratis Sekarang</a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="relative z-10 pt-28 sm:pt-36 flex-grow">

        <!-- Hero Section -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center pb-20">
            <!-- Pill Announcement Badge -->
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full border border-indigo-500/30 bg-indigo-950/40 text-indigo-300 text-xs sm:text-sm font-medium mb-8 hover:border-indigo-400 transition-colors cursor-pointer">
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                </span>
                <span>Nova v2.0 Telah Rilis — Lihat Apa yang Baru</span>
                <svg class="w-3.5 h-3.5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </div>

            <!-- Main Heading -->
            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight text-white max-w-4xl mx-auto leading-tight sm:leading-none">
                Bangun Produk Digital Impian dengan
                <span class="bg-gradient-to-r from-indigo-400 via-purple-300 to-pink-400 bg-clip-text text-transparent">
                    Kecepatan Penuh.
                </span>
            </h1>

            <!-- Subtitle -->
            <p class="mt-6 text-lg sm:text-xl text-slate-300 max-w-2xl mx-auto leading-relaxed">
                Kelola proyek, otomatisasi alur kerja, dan percepat peluncuran aplikasi Anda dengan platform cerdas terpadu generasi terbaru.
            </p>

            <!-- Call to Action Buttons -->
            <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ auth()->check() ? route('dashboard') : route('login') }}" id="hero-cta-primary" class="w-full sm:w-auto px-8 py-4 rounded-xl text-base font-semibold text-white bg-gradient-to-r from-indigo-600 via-indigo-500 to-purple-600 hover:from-indigo-500 hover:to-purple-500 shadow-lg shadow-indigo-600/30 hover:shadow-indigo-600/50 hover:-translate-y-0.5 transition-all">
                    {{ auth()->check() ? 'Buka Dashboard' : 'Mulai Uji Coba Gratis' }}
                </a>
                <a href="#demo" id="hero-cta-secondary" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 rounded-xl text-base font-semibold text-slate-200 bg-slate-900/80 hover:bg-slate-800 border border-slate-700/80 hover:border-slate-600 transition-all">
                    <svg class="w-5 h-5 text-indigo-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                    </svg>
                    Lihat Video Demo (2 Menit)
                </a>
            </div>

            <!-- Social Proof Avatars -->
            <div class="mt-12 flex flex-col sm:flex-row items-center justify-center gap-4 text-sm text-slate-400">
                <div class="flex -space-x-2 overflow-hidden">
                    <span class="inline-block h-9 w-9 rounded-full ring-2 ring-[#0B0F19] bg-gradient-to-tr from-amber-400 to-orange-500 flex items-center justify-center font-bold text-xs text-slate-900">JD</span>
                    <span class="inline-block h-9 w-9 rounded-full ring-2 ring-[#0B0F19] bg-gradient-to-tr from-indigo-500 to-cyan-400 flex items-center justify-center font-bold text-xs text-white">SK</span>
                    <span class="inline-block h-9 w-9 rounded-full ring-2 ring-[#0B0F19] bg-gradient-to-tr from-pink-500 to-rose-400 flex items-center justify-center font-bold text-xs text-white">MR</span>
                    <span class="inline-block h-9 w-9 rounded-full ring-2 ring-[#0B0F19] bg-gradient-to-tr from-emerald-400 to-teal-500 flex items-center justify-center font-bold text-xs text-slate-900">AL</span>
                </div>
                <div class="flex items-center gap-1">
                    <div class="flex text-amber-400">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <span class="font-semibold text-slate-200">4.9/5</span> dari 10.000+ tim inovatif
                </div>
            </div>

            <!-- Product Dashboard Preview Mockup -->
            <div class="mt-16 max-w-5xl mx-auto relative">
                <div class="rounded-2xl p-1 bg-gradient-to-b from-slate-700/60 via-indigo-500/20 to-transparent shadow-2xl glow-effect">
                    <div class="bg-[#0D1322] rounded-[15px] overflow-hidden border border-slate-800">
                        <!-- Window Chrome Bar -->
                        <div class="h-10 bg-slate-900/90 border-b border-slate-800 flex items-center px-4 gap-2">
                            <span class="w-3 h-3 rounded-full bg-rose-500/80 inline-block"></span>
                            <span class="w-3 h-3 rounded-full bg-amber-500/80 inline-block"></span>
                            <span class="w-3 h-3 rounded-full bg-emerald-500/80 inline-block"></span>
                            <div class="mx-auto text-xs text-slate-400 font-mono flex items-center gap-1.5 bg-slate-950/70 px-4 py-1 rounded-md border border-slate-800/80">
                                <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                https://app.nova.id/dashboard/analytics
                            </div>
                        </div>

                        <!-- Dashboard Mock Content -->
                        <div class="p-6 sm:p-8 grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
                            <div class="md:col-span-2 space-y-6">
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                    <div class="bg-slate-900/60 p-4 rounded-xl border border-slate-800/80">
                                        <p class="text-xs text-slate-400">Total Deployment</p>
                                        <p class="text-2xl font-bold text-white mt-1">14,289</p>
                                        <span class="text-xs font-semibold text-emerald-400">↑ +18.4% bulan ini</span>
                                    </div>
                                    <div class="bg-slate-900/60 p-4 rounded-xl border border-slate-800/80">
                                        <p class="text-xs text-slate-400">Rata-rata Waktu Respons</p>
                                        <p class="text-2xl font-bold text-white mt-1">42ms</p>
                                        <span class="text-xs font-semibold text-emerald-400">⚡ 3x lebih gesit</span>
                                    </div>
                                    <div class="bg-slate-900/60 p-4 rounded-xl border border-slate-800/80">
                                        <p class="text-xs text-slate-400">System Health</p>
                                        <p class="text-2xl font-bold text-emerald-400 mt-1">99.99%</p>
                                        <span class="text-xs text-slate-400">Normal di 24 Region</span>
                                    </div>
                                </div>

                                <!-- Visual Graph Mock -->
                                <div class="bg-slate-900/60 p-5 rounded-xl border border-slate-800/80">
                                    <div class="flex items-center justify-between mb-4">
                                        <h2 class="text-sm font-semibold text-slate-200">Aktivitas Server & Traffic</h2>
                                        <span class="text-xs bg-indigo-500/20 text-indigo-300 px-2.5 py-0.5 rounded-full font-medium">Real-time Live</span>
                                    </div>
                                    <div class="h-32 flex items-end gap-2 pt-6">
                                        <div class="w-full bg-indigo-500/20 hover:bg-indigo-500/40 transition-colors rounded-t h-[40%]"></div>
                                        <div class="w-full bg-indigo-500/20 hover:bg-indigo-500/40 transition-colors rounded-t h-[65%]"></div>
                                        <div class="w-full bg-indigo-500/20 hover:bg-indigo-500/40 transition-colors rounded-t h-[50%]"></div>
                                        <div class="w-full bg-indigo-500/20 hover:bg-indigo-500/40 transition-colors rounded-t h-[85%]"></div>
                                        <div class="w-full bg-indigo-500/30 hover:bg-indigo-500/50 transition-colors rounded-t h-[70%]"></div>
                                        <div class="w-full bg-indigo-500/40 hover:bg-indigo-500/60 transition-colors rounded-t h-[90%]"></div>
                                        <div class="w-full bg-gradient-to-t from-indigo-500 to-purple-500 rounded-t h-[100%]"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Mock Side Panel / Terminal Feed -->
                            <div class="bg-slate-900/90 rounded-xl p-4 border border-slate-800/80 font-mono text-xs text-slate-300 space-y-3">
                                <div class="flex items-center justify-between pb-2 border-b border-slate-800 text-slate-400">
                                    <span>Deployment Logs</span>
                                    <span class="text-emerald-400 flex items-center gap-1">● Active</span>
                                </div>
                                <div class="text-slate-400">[08:42:11] Init git repository...</div>
                                <div class="text-slate-400">[08:42:12] Build Vite bundle: <span class="text-emerald-400">OK</span></div>
                                <div class="text-slate-400">[08:42:14] Migrate database schema: <span class="text-emerald-400">OK</span></div>
                                <div class="text-indigo-400">[08:42:15] Deploying edge containers...</div>
                                <div class="bg-emerald-950/60 border border-emerald-500/30 text-emerald-300 p-2.5 rounded-lg mt-4">
                                    ✓ Build #482 sukses terdeploy dalam 4.2 detik.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Logo Cloud / Partner Brands -->
        <section class="border-y border-slate-800/80 bg-slate-950/40 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <p class="text-xs uppercase tracking-widest text-slate-300 font-semibold mb-8">
                    Dipercaya oleh tim teknologi dan startup terdepan di Indonesia
                </p>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-8 items-center justify-center opacity-70">
                    <span class="text-xl font-bold tracking-tight text-slate-300 hover:text-white transition-colors">VERTEX</span>
                    <span class="text-xl font-bold tracking-tight text-slate-300 hover:text-white transition-colors">ACME CORP</span>
                    <span class="text-xl font-bold tracking-tight text-slate-300 hover:text-white transition-colors">SYNERGY</span>
                    <span class="text-xl font-bold tracking-tight text-slate-300 hover:text-white transition-colors">ORION LABS</span>
                    <span class="text-xl font-bold tracking-tight text-slate-300 hover:text-white transition-colors">KINETIC</span>
                    <span class="text-xl font-bold tracking-tight text-slate-300 hover:text-white transition-colors">NEXUS AI</span>
                </div>
            </div>
        </section>

        <!-- Features Grid Section -->
        <section id="fitur" class="py-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-indigo-400 text-sm font-semibold tracking-wide uppercase">Fitur Unggulan</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-extrabold text-white">Semua Alat yang Anda Butuhkan untuk Sukses</h2>
                <p class="mt-4 text-base sm:text-lg text-slate-400">Dirancang khusus dari awal untuk efisiensi maksimal, performa tinggi, dan pengalaman pengembang tanpa hambatan.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="glass-card p-8 rounded-2xl hover:border-indigo-500/40 hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center text-indigo-400 mb-6 group-hover:scale-110 group-hover:bg-indigo-500 group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Performa Ekstrem</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">Eksekusi super cepat dengan global edge caching dan optimasi runtime generasi terbaru.</p>
                </div>

                <!-- Feature 2 -->
                <div class="glass-card p-8 rounded-2xl hover:border-purple-500/40 hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-purple-500/10 border border-purple-500/20 flex items-center justify-center text-purple-400 mb-6 group-hover:scale-110 group-hover:bg-purple-500 group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Keamanan Standar Bank</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">Enkripsi data otomatis, isolasi container, dan perlindungan DDoS pintar 24/7.</p>
                </div>

                <!-- Feature 3 -->
                <div class="glass-card p-8 rounded-2xl hover:border-pink-500/40 hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-pink-500/10 border border-pink-500/20 flex items-center justify-center text-pink-400 mb-6 group-hover:scale-110 group-hover:bg-pink-500 group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Automasi & AI Terpadu</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">Hemat waktu hingga 70% dengan asisten pintar yang mengotomasi tugas repetitif tim.</p>
                </div>

                <!-- Feature 4 -->
                <div class="glass-card p-8 rounded-2xl hover:border-emerald-500/40 hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400 mb-6 group-hover:scale-110 group-hover:bg-emerald-500 group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Analitik Mendalam</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">Pelacakan log real-time, pantauan metrik performa, dan laporan kesehatan sistem.</p>
                </div>

                <!-- Feature 5 -->
                <div class="glass-card p-8 rounded-2xl hover:border-cyan-500/40 hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-cyan-400 mb-6 group-hover:scale-110 group-hover:bg-cyan-500 group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">API & Ekosistem Terbuka</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">Terhubung mulus dengan GitHub, GitLab, Slack, database SQL, dan ratusan tools favorit Anda.</p>
                </div>

                <!-- Feature 6 -->
                <div class="glass-card p-8 rounded-2xl hover:border-amber-500/40 hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-400 mb-6 group-hover:scale-110 group-hover:bg-amber-500 group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Bantuan Ahli 24/7</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">Dukungan teknis prioritas dari tim engineer berpengalaman setiap saat Anda membutuhkan.</p>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section id="cara-kerja" class="py-20 bg-slate-950/60 border-t border-slate-800/80">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto mb-16">
                    <span class="text-indigo-400 text-sm font-semibold tracking-wide uppercase">Alur Kerja</span>
                    <h2 class="mt-2 text-3xl sm:text-4xl font-extrabold text-white">Mulai Hanya Dalam 3 Langkah</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
                    <div class="p-6 rounded-2xl bg-slate-900/40 border border-slate-800 relative">
                        <span class="text-5xl font-black text-indigo-500/20 absolute top-4 right-6">01</span>
                        <div class="w-10 h-10 rounded-lg bg-indigo-600/20 text-indigo-400 flex items-center justify-center font-bold mb-4">1</div>
                        <h3 class="text-lg font-bold text-white mb-2">Buat Akun Anda</h3>
                        <p class="text-slate-400 text-sm">Daftar dalam 30 detik tanpa memerlukan kartu kredit. Langsung aktif seketika.</p>
                    </div>

                    <div class="p-6 rounded-2xl bg-slate-900/40 border border-slate-800 relative">
                        <span class="text-5xl font-black text-purple-500/20 absolute top-4 right-6">02</span>
                        <div class="w-10 h-10 rounded-lg bg-purple-600/20 text-purple-400 flex items-center justify-center font-bold mb-4">2</div>
                        <h3 class="text-lg font-bold text-white mb-2">Hubungkan Repositori</h3>
                        <p class="text-slate-400 text-sm">Integrasikan repository GitHub Anda atau gunakan template starter modern kami.</p>
                    </div>

                    <div class="p-6 rounded-2xl bg-slate-900/40 border border-slate-800 relative">
                        <span class="text-5xl font-black text-pink-500/20 absolute top-4 right-6">03</span>
                        <div class="w-10 h-10 rounded-lg bg-pink-600/20 text-pink-400 flex items-center justify-center font-bold mb-4">3</div>
                        <h3 class="text-lg font-bold text-white mb-2">Luncurkan ke Dunia</h3>
                        <p class="text-slate-400 text-sm">Tekan satu tombol deploy dan nikmati aplikasi yang tayang secara global dengan latensi rendah.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pricing Section -->
        <section id="harga" class="py-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-indigo-400 text-sm font-semibold tracking-wide uppercase">Pilihan Paket</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-extrabold text-white">Investasi Terjangkau untuk Pertumbuhan Anda</h2>
                <p class="mt-4 text-base sm:text-lg text-slate-400">Pilih paket yang paling sesuai dengan kebutuhan tim Anda saat ini.</p>

                <!-- Billing Toggle -->
                <div class="mt-8 inline-flex items-center gap-3 p-1 rounded-xl bg-slate-900 border border-slate-800">
                    <button type="button" id="billing-monthly" class="px-4 py-2 rounded-lg text-sm font-medium bg-indigo-600 text-white transition-all">Bulanan</button>
                    <button type="button" id="billing-annual" class="px-4 py-2 rounded-lg text-sm font-medium text-slate-400 hover:text-white transition-all">Tahunan <span class="text-xs text-emerald-400 font-semibold">(Hemat 20%)</span></button>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">
                <!-- Free / Starter Tier -->
                <div class="glass-card rounded-2xl p-8 flex flex-col justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-white">Starter</h3>
                        <p class="text-slate-400 text-sm mt-1">Cocok untuk proyek sampingan & hobi.</p>
                        <div class="mt-6">
                            <span class="text-4xl font-extrabold text-white">Rp 0</span>
                            <span class="text-slate-400 text-sm"> / selamanya</span>
                        </div>
                        <ul class="mt-8 space-y-4 text-sm text-slate-300">
                            <li class="flex items-center gap-3"><svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Hingga 3 proyek aktif</li>
                            <li class="flex items-center gap-3"><svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Bandwidth 100 GB / bulan</li>
                            <li class="flex items-center gap-3"><svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> SSL Otomatis & Custom Domain</li>
                            <li class="flex items-center gap-3 text-slate-500"><svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Dukungan prioritas 24/7</li>
                        </ul>
                    </div>
                    <a href="#mulai" class="mt-8 block w-full py-3 px-4 text-center rounded-xl font-semibold text-slate-200 bg-slate-800 hover:bg-slate-700 transition-colors">
                        Mulai Gratis
                    </a>
                </div>

                <!-- Pro Tier (Popular) -->
                <div class="relative glass-card rounded-2xl p-8 flex flex-col justify-between border-2 border-indigo-500/80 shadow-2xl shadow-indigo-500/20">
                    <span class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-gradient-to-r from-indigo-500 to-purple-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                        Paling Populer
                    </span>
                    <div>
                        <h3 class="text-xl font-bold text-white">Professional</h3>
                        <p class="text-slate-400 text-sm mt-1">Solusi komprehensif untuk tim dan bisnis bertumbuh.</p>
                        <div class="mt-6">
                            <span id="pro-price" class="text-4xl font-extrabold text-white">Rp 149.000</span>
                            <span class="text-slate-400 text-sm"> / bulan</span>
                        </div>
                        <ul class="mt-8 space-y-4 text-sm text-slate-300">
                            <li class="flex items-center gap-3"><svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Proyek aktif tanpa batas</li>
                            <li class="flex items-center gap-3"><svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Bandwidth 1 TB / bulan</li>
                            <li class="flex items-center gap-3"><svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Akses AI Assistant Cerdas</li>
                            <li class="flex items-center gap-3"><svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Analitik real-time canggih</li>
                            <li class="flex items-center gap-3"><svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Dukungan prioritas 24/7</li>
                        </ul>
                    </div>
                    <a href="#mulai" class="mt-8 block w-full py-3.5 px-4 text-center rounded-xl font-semibold text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 shadow-md shadow-indigo-600/30 transition-all">
                        Coba 14 Hari Gratis
                    </a>
                </div>

                <!-- Enterprise Tier -->
                <div class="glass-card rounded-2xl p-8 flex flex-col justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-white">Enterprise</h3>
                        <p class="text-slate-400 text-sm mt-1">Keamanan tingkat lanjut dan SLA kustom.</p>
                        <div class="mt-6">
                            <span class="text-4xl font-extrabold text-white">Kustom</span>
                            <span class="text-slate-400 text-sm"> / kontak kami</span>
                        </div>
                        <ul class="mt-8 space-y-4 text-sm text-slate-300">
                            <li class="flex items-center gap-3"><svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Semua fitur Pro</li>
                            <li class="flex items-center gap-3"><svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Dedicated Virtual Cloud</li>
                            <li class="flex items-center gap-3"><svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> SLA Uptime 99.99% bergaransi</li>
                            <li class="flex items-center gap-3"><svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Dedicated Account Manager</li>
                        </ul>
                    </div>
                    <a href="#kontak" class="mt-8 block w-full py-3 px-4 text-center rounded-xl font-semibold text-slate-200 bg-slate-800 hover:bg-slate-700 transition-colors">
                        Hubungi Tim Sales
                    </a>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section id="faq" class="py-20 bg-slate-950/40 border-t border-slate-800/80">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <span class="text-indigo-400 text-sm font-semibold tracking-wide uppercase">Pertanyaan Umum</span>
                    <h2 class="mt-2 text-3xl sm:text-4xl font-extrabold text-white">Sering Ditanyakan (FAQ)</h2>
                </div>

                <div class="space-y-4" id="faq-accordion">
                    <!-- FAQ Item 1 -->
                    <div class="glass-card rounded-xl overflow-hidden border border-slate-800">
                        <button type="button" class="faq-toggle w-full p-6 text-left flex items-center justify-between font-semibold text-white focus:outline-none">
                            <span>Apakah saya memerlukan kartu kredit untuk mendaftar paket gratis?</span>
                            <svg class="w-5 h-5 text-slate-400 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="faq-content hidden px-6 pb-6 text-sm text-slate-400 leading-relaxed">
                            Sama sekali tidak! Anda dapat mendaftar dan menggunakan paket Starter selamanya tanpa memasukkan detail kartu kredit atau pembayaran apa pun.
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="glass-card rounded-xl overflow-hidden border border-slate-800">
                        <button type="button" class="faq-toggle w-full p-6 text-left flex items-center justify-between font-semibold text-white focus:outline-none">
                            <span>Berapa lama proses deployment aplikasi berlangsung?</span>
                            <svg class="w-5 h-5 text-slate-400 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="faq-content hidden px-6 pb-6 text-sm text-slate-400 leading-relaxed">
                            Rata-rata proses build dan deployment di jaringan global kami hanya memakan waktu 3 hingga 10 detik berkat sistem caching dan layer container pintar kami.
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="glass-card rounded-xl overflow-hidden border border-slate-800">
                        <button type="button" class="faq-toggle w-full p-6 text-left flex items-center justify-between font-semibold text-white focus:outline-none">
                            <span>Apakah saya bisa meng-upgrade atau membatalkan langganan kapan saja?</span>
                            <svg class="w-5 h-5 text-slate-400 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="faq-content hidden px-6 pb-6 text-sm text-slate-400 leading-relaxed">
                            Ya, Anda dapat menaikkan atau menurunkan paket kapan pun melalui dashboard tanpa kontrak yang mengikat dan tanpa denda pembatalan.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Final Call to Action -->
        <section class="py-20 relative overflow-hidden">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="rounded-3xl p-8 sm:p-14 bg-gradient-to-r from-indigo-900/60 via-purple-900/60 to-slate-900/80 border border-indigo-500/30 text-center shadow-2xl relative overflow-hidden">
                    <div class="absolute -right-20 -top-20 w-64 h-64 bg-indigo-500/20 rounded-full blur-3xl" aria-hidden="true"></div>
                    <h2 class="text-3xl sm:text-5xl font-extrabold text-white max-w-2xl mx-auto">
                        Siap Memulai Transformasi Digital Anda?
                    </h2>
                    <p class="mt-4 text-base sm:text-lg text-indigo-200/80 max-w-xl mx-auto">
                        Bergabunglah bersama ribuan developer dan bisnis yang telah menghemat waktu dan meningkatkan efisiensi produk mereka.
                    </p>
                    <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="{{ auth()->check() ? route('dashboard') : route('login') }}" id="final-cta" class="w-full sm:w-auto px-8 py-4 rounded-xl text-base font-semibold text-slate-900 bg-white hover:bg-slate-100 shadow-xl hover:-translate-y-0.5 transition-all">
                            {{ auth()->check() ? 'Buka Dashboard' : 'Mulai Sekarang — Gratis' }}
                        </a>
                        <a href="#kontak" class="w-full sm:w-auto px-8 py-4 rounded-xl text-base font-semibold text-white bg-white/10 hover:bg-white/20 border border-white/20 transition-all">
                            Konsultasi dengan Kami
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-800/80 bg-[#070A12] py-12 text-sm text-slate-400 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-3">
                <div class="w-7 h-7 rounded-lg bg-gradient-to-tr from-indigo-500 to-purple-500 flex items-center justify-center text-white font-bold text-xs">
                    N
                </div>
                <span class="font-bold text-white text-base">Nova Platform</span>
                <span class="text-slate-600">|</span>
                <span>© {{ date('Y') }} Nova. Hak Cipta Dilindungi.</span>
            </div>

            <div class="flex items-center gap-6 text-slate-400">
                <a href="#privasi" class="hover:text-white transition-colors">Kebijakan Privasi</a>
                <a href="#syarat" class="hover:text-white transition-colors">Syarat & Ketentuan</a>
                <a href="#status" class="hover:text-white transition-colors flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span> Sistem Beroperasi Normal
                </a>
            </div>
        </div>
    </footer>

    <!-- Interactive Vanilla JS Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Mobile Menu Toggle
            const menuBtn = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const iconOpen = document.getElementById('menu-icon-open');
            const iconClose = document.getElementById('menu-icon-close');

            if (menuBtn && mobileMenu) {
                menuBtn.addEventListener('click', () => {
                    const isHidden = mobileMenu.classList.toggle('hidden');
                    iconOpen.classList.toggle('hidden', !isHidden);
                    iconClose.classList.toggle('hidden', isHidden);
                });
            }

            // FAQ Accordion
            const faqToggles = document.querySelectorAll('.faq-toggle');
            faqToggles.forEach(toggle => {
                toggle.addEventListener('click', () => {
                    const content = toggle.nextElementSibling;
                    const icon = toggle.querySelector('svg');
                    const isOpen = !content.classList.contains('hidden');

                    // Close all
                    document.querySelectorAll('.faq-content').forEach(c => c.classList.add('hidden'));
                    document.querySelectorAll('.faq-toggle svg').forEach(i => i.classList.remove('rotate-180'));

                    // Toggle clicked one
                    if (!isOpen) {
                        content.classList.remove('hidden');
                        icon.classList.add('rotate-180');
                    }
                });
            });

            // Pricing Toggle
            const btnMonthly = document.getElementById('billing-monthly');
            const btnAnnual = document.getElementById('billing-annual');
            const proPrice = document.getElementById('pro-price');

            if (btnMonthly && btnAnnual && proPrice) {
                btnMonthly.addEventListener('click', () => {
                    btnMonthly.classList.add('bg-indigo-600', 'text-white');
                    btnMonthly.classList.remove('text-slate-400');
                    btnAnnual.classList.remove('bg-indigo-600', 'text-white');
                    btnAnnual.classList.add('text-slate-400');
                    proPrice.textContent = 'Rp 149.000';
                });

                btnAnnual.addEventListener('click', () => {
                    btnAnnual.classList.add('bg-indigo-600', 'text-white');
                    btnAnnual.classList.remove('text-slate-400');
                    btnMonthly.classList.remove('bg-indigo-600', 'text-white');
                    btnMonthly.classList.add('text-slate-400');
                    proPrice.textContent = 'Rp 119.000';
                });
            }
        });
    </script>
</body>
</html>
