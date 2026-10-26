<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buat Laporan Baru — Nova Platform</title>

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
    <main class="relative z-10 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex-grow w-full space-y-8">

        <!-- Back Link & Header -->
        <div>
            <a href="{{ route('reports.index') }}" class="text-xs text-indigo-400 hover:text-indigo-300 inline-flex items-center gap-1 mb-3 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Kembali ke Daftar Laporan
            </a>
            <h1 class="text-3xl font-extrabold text-white">Formulir Laporan Baru</h1>
            <p class="text-slate-400 text-sm mt-1">Sampaikan keluhan, laporkan bug teknis, atau berikan saran perbaikan sistem secara terperinci.</p>
        </div>

        <!-- Form Card -->
        <div class="glass-card rounded-2xl p-6 sm:p-8 glow-effect">
            <form action="{{ route('reports.store') }}" method="POST" class="space-y-6" id="form-create-report">
                @csrf

                <!-- Title Input -->
                <div>
                    <label for="title" class="block text-sm font-medium text-slate-300 mb-2">Judul Laporan</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title') }}"
                        required
                        autofocus
                        placeholder="Contoh: Kesalahan saat memuat analitik server"
                        class="w-full px-4 py-3 rounded-xl bg-slate-900/80 border @error('title') border-rose-500 @else border-slate-700/80 @enderror text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all"
                    >
                    @error('title')
                        <p class="mt-1.5 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category Select -->
                <div>
                    <label for="category" class="block text-sm font-medium text-slate-300 mb-2">Kategori Laporan</label>
                    <select
                        name="category"
                        id="category"
                        required
                        class="w-full px-4 py-3 rounded-xl bg-slate-900/80 border @error('category') border-rose-500 @else border-slate-700/80 @enderror text-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all"
                    >
                        <option value="bug" {{ old('category') === 'bug' ? 'selected' : '' }}>Kendala / Bug Teknis</option>
                        <option value="layanan" {{ old('category') === 'layanan' ? 'selected' : '' }}>Keluhan Layanan</option>
                        <option value="saran" {{ old('category') === 'saran' ? 'selected' : '' }}>Saran & Masukan</option>
                        <option value="lainnya" {{ old('category') === 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    @error('category')
                        <p class="mt-1.5 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description Textarea -->
                <div>
                    <label for="description" class="block text-sm font-medium text-slate-300 mb-2">Detail Laporan</label>
                    <textarea
                        name="description"
                        id="description"
                        rows="6"
                        required
                        placeholder="Jelaskan secara rinci kronologi kejadian, langkah reproduksi bug, atau poin masukan Anda..."
                        class="w-full px-4 py-3 rounded-xl bg-slate-900/80 border @error('description') border-rose-500 @else border-slate-700/80 @enderror text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all"
                    >{{ old('description') }}</textarea>
                    <p class="mt-1 text-xs text-slate-500">Minimal 10 karakter.</p>
                    @error('description')
                        <p class="mt-1.5 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-800">
                    <a
                        href="{{ route('reports.index') }}"
                        class="px-5 py-2.5 rounded-xl text-sm font-medium text-slate-400 hover:text-white hover:bg-slate-800/80 transition-colors"
                    >
                        Batal
                    </a>
                    <button
                        type="submit"
                        id="btn-submit-report"
                        class="px-6 py-2.5 rounded-xl font-semibold text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 shadow-md shadow-indigo-600/30 transition-all text-sm"
                    >
                        Kirim Laporan
                    </button>
                </div>
            </form>
        </div>

    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-800/80 bg-[#070A12] py-6 text-xs text-slate-400 relative z-10 text-center">
        <span>© {{ date('Y') }} Nova Platform • Layanan Lapor Terintegrasi</span>
    </footer>
</body>
</html>
