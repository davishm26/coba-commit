<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Layanan Lapor & Bantuan — Nova Platform</title>

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
    <main class="relative z-10 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex-grow w-full space-y-8">

        <!-- Page Header & Action -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <span class="inline-flex items-center gap-1.5 text-xs font-medium text-indigo-400 bg-indigo-500/10 px-2.5 py-1 rounded-full mb-2 border border-indigo-500/20">
                    <span class="w-1.5 h-1.5 rounded-full bg-indigo-400"></span> Layanan Bantuan & Aspirasi
                </span>
                <h1 class="text-3xl font-extrabold text-white">Daftar Laporan Anda</h1>
                <p class="text-slate-400 text-sm mt-1">Pantau status laporan kendala teknis, saran, atau keluhan layanan Anda secara berkala.</p>
            </div>
            <a
                href="{{ route('reports.create') }}"
                id="btn-create-report"
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-semibold text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 shadow-md shadow-indigo-600/30 transition-all text-sm"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Buat Laporan Baru
            </a>
        </div>

        <!-- Flash Status Alert -->
        @if (session('status'))
            <div class="p-4 rounded-xl bg-emerald-950/60 border border-emerald-500/30 text-emerald-300 text-sm flex items-center gap-3">
                <svg class="w-5 h-5 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        <!-- Reports List -->
        @if ($reports->isEmpty())
            <div class="glass-card rounded-2xl p-12 text-center border border-slate-800">
                <div class="w-16 h-16 mx-auto rounded-2xl bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center text-indigo-400 mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-white">Belum Ada Laporan</h3>
                <p class="text-slate-400 text-sm max-w-md mx-auto mt-1 mb-6">
                    Apakah Anda mengalami kendala teknis atau memiliki saran untuk pengembangan Nova? Sampaikan langsung melalui formulir laporan.
                </p>
                <a
                    href="{{ route('reports.create') }}"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-500 transition-colors shadow-md shadow-indigo-600/30"
                >
                    + Buat Laporan Pertama
                </a>
            </div>
        @else
            <div class="space-y-4" id="reports-list">
                @foreach ($reports as $report)
                    <div class="glass-card rounded-2xl p-6 hover:border-indigo-500/40 transition-all duration-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="space-y-2 flex-grow">
                            <div class="flex flex-wrap items-center gap-2.5">
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold border {{ $report->status_badge['bg'] }}">
                                    {{ $report->status_badge['label'] }}
                                </span>
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-800 text-slate-300 border border-slate-700/80">
                                    {{ $report->category_label }}
                                </span>
                                <span class="text-xs text-slate-500">
                                    {{ $report->created_at->format('d M Y, H:i') }}
                                </span>
                            </div>
                            <h2 class="text-lg font-bold text-white hover:text-indigo-300 transition-colors">
                                <a href="{{ route('reports.show', $report) }}">{{ $report->title }}</a>
                            </h2>
                            <p class="text-slate-400 text-sm line-clamp-2 leading-relaxed">
                                {{ Str::limit($report->description, 160) }}
                            </p>
                        </div>
                        <div class="shrink-0">
                            <a
                                href="{{ route('reports.show', $report) }}"
                                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs font-semibold text-slate-200 bg-slate-800/80 hover:bg-slate-700 border border-slate-700/80 transition-colors"
                            >
                                <span>Lihat Detail</span>
                                <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-800/80 bg-[#070A12] py-6 text-xs text-slate-400 relative z-10 text-center">
        <span>© {{ date('Y') }} Nova Platform • Layanan Lapor Terintegrasi</span>
    </footer>
</body>
</html>
