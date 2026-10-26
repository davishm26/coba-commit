<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $report->title }} — Detail Laporan Nova</title>

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
            background: rgba(18, 24, 38, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .glow-effect {
            box-shadow: 0 0 50px -10px rgba(99, 102, 241, 0.25);
        }
    </style>
</head>
<body class="bg-[#0B0F19] text-slate-100 antialiased min-h-screen flex flex-col justify-between">

    <!-- Ambient Glow Orbs -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden z-0" aria-hidden="true">
        <div class="absolute -top-40 right-1/4 w-96 h-96 bg-indigo-600/15 rounded-full blur-[128px]"></div>
        <div class="absolute bottom-1/4 left-1/4 w-96 h-96 bg-purple-600/15 rounded-full blur-[128px]"></div>
    </div>

    <!-- Top Navigation -->
    <nav class="relative z-10 border-b border-slate-800 bg-[#0B0F19]/80 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Brand & Links -->
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
                        <a href="{{ route('dashboard') }}" class="hover:text-white px-3 py-1.5 rounded-lg transition-colors">Ringkasan</a>
                        <a href="{{ route('reports.index') }}" class="text-white font-medium px-3 py-1.5 rounded-lg bg-slate-800/80">Layanan Lapor</a>
                        <a href="{{ route('profile.edit') }}" class="hover:text-white px-3 py-1.5 rounded-lg transition-colors">Kelola Profil</a>
                        <a href="{{ route('home') }}" class="hover:text-white px-3 py-1.5 rounded-lg transition-colors">Landing Page</a>
                    </div>
                </div>

                <!-- User profile & Logout -->
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-500 flex items-center justify-center font-bold text-xs text-white">
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        </div>
                        <div class="hidden md:block text-left text-xs">
                            <p class="font-semibold text-white">{{ Auth::user()->name }}</p>
                            <p class="text-slate-400">{{ Auth::user()->email }}</p>
                        </div>
                    </div>

                    <form action="{{ route('logout') }}" method="POST">
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
    <main class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex-grow w-full space-y-8">

        <!-- Back Link & Header -->
        <div class="flex items-center justify-between">
            <a href="{{ route('reports.index') }}" class="text-xs text-indigo-400 hover:text-indigo-300 inline-flex items-center gap-1.5 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Kembali ke Daftar Laporan
            </a>
            <span class="text-xs text-slate-500 font-mono">
                Tiket #RPR-{{ str_pad($report->id, 5, '0', STR_PAD_LEFT) }}
            </span>
        </div>

        <!-- Detail Card -->
        <div class="glass-card rounded-2xl p-6 sm:p-8 glow-effect space-y-6">
            <!-- Header Info -->
            <div class="pb-6 border-b border-slate-800 space-y-4">
                <div class="flex flex-wrap items-center gap-2.5">
                    <span class="px-3 py-1 rounded-full text-xs font-semibold border {{ $report->status_badge['bg'] }}">
                        {{ $report->status_badge['label'] }}
                    </span>
                    <span class="px-3 py-1 rounded-full text-xs font-medium bg-slate-800 text-slate-300 border border-slate-700/80">
                        {{ $report->category_label }}
                    </span>
                    <span class="text-xs text-slate-500">
                        Dikirim pada: {{ $report->created_at->format('d M Y, H:i') }} WIB
                    </span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white leading-tight">
                    {{ $report->title }}
                </h1>
            </div>

            <!-- Content -->
            <div class="space-y-3">
                <h2 class="text-xs font-semibold uppercase tracking-wider text-slate-400">Rincian Deskripsi</h2>
                <div class="p-5 rounded-xl bg-slate-900/60 border border-slate-800/80 text-slate-200 text-sm whitespace-pre-line leading-relaxed">
                    {{ $report->description }}
                </div>
            </div>

            <!-- Status Tracking Flow -->
            <div class="pt-6 border-t border-slate-800">
                <h2 class="text-xs font-semibold uppercase tracking-wider text-slate-400 mb-4">Alur Penanganan Laporan</h2>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
                    <div class="p-3.5 rounded-xl border {{ $report->status === 'menunggu' ? 'bg-amber-500/10 border-amber-500/30 text-amber-300' : 'bg-slate-900/40 border-slate-800 text-slate-400' }}">
                        <span class="font-bold block mb-1">1. Diterima</span>
                        <span>Laporan tercatat di sistem kami dan menunggu ditinjau tim.</span>
                    </div>
                    <div class="p-3.5 rounded-xl border {{ $report->status === 'diproses' ? 'bg-indigo-500/10 border-indigo-500/30 text-indigo-300' : 'bg-slate-900/40 border-slate-800 text-slate-400' }}">
                        <span class="font-bold block mb-1">2. Investigasi</span>
                        <span>Tim teknis sedang mendalami dan mencari solusi perbaikan.</span>
                    </div>
                    <div class="p-3.5 rounded-xl border {{ $report->status === 'selesai' ? 'bg-emerald-500/10 border-emerald-500/30 text-emerald-300' : 'bg-slate-900/40 border-slate-800 text-slate-400' }}">
                        <span class="font-bold block mb-1">3. Terselesaikan</span>
                        <span>Tindakan perbaikan telah diterapkan secara tuntas.</span>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-800/80 bg-[#070A12] py-6 text-xs text-slate-400 relative z-10 text-center">
        <span>© {{ date('Y') }} Nova Platform • Layanan Lapor Terintegrasi</span>
    </footer>
</body>
</html>
