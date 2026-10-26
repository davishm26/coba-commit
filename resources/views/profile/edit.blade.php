<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Profil — Nova Platform</title>

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
                        <a href="{{ route('reports.index') }}" class="hover:text-white px-3 py-1.5 rounded-lg transition-colors">Layanan Lapor</a>
                        <a href="{{ route('profile.edit') }}" class="text-white font-medium px-3 py-1.5 rounded-lg bg-slate-800/80">Kelola Profil</a>
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

        <!-- Page Header -->
        <div class="flex items-center justify-between">
            <div>
                <a href="{{ route('dashboard') }}" class="text-xs text-indigo-400 hover:text-indigo-300 flex items-center gap-1 mb-2">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    Kembali ke Dashboard
                </a>
                <h1 class="text-3xl font-extrabold text-white">Pengaturan Profil</h1>
                <p class="text-slate-400 text-sm mt-1">Perbarui data informasi akun dan keamanan kata sandi Anda.</p>
            </div>
        </div>

        <!-- Section 1: Informasi Profil -->
        <div class="glass-card rounded-2xl p-6 sm:p-8 glow-effect">
            <div class="mb-6 pb-6 border-b border-slate-800">
                <h2 class="text-lg font-bold text-white flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Informasi Profil
                </h2>
                <p class="text-slate-400 text-xs mt-1">Ubah nama tampilan dan alamat email akun Anda.</p>
            </div>

            <!-- Profile Updated Alert -->
            @if (session('status') === 'profile-updated')
                <div class="mb-6 p-4 rounded-xl bg-emerald-950/60 border border-emerald-500/30 text-emerald-300 text-sm flex items-center gap-3">
                    <svg class="w-5 h-5 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Profil berhasil diperbarui.</span>
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" class="space-y-5" id="form-update-profile">
                @csrf
                @method('PATCH')

                <!-- Name Input -->
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-300 mb-2">Nama Lengkap</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name', $user->name) }}"
                        required
                        autofocus
                        autocomplete="name"
                        class="w-full px-4 py-3 rounded-xl bg-slate-900/80 border @error('name') border-rose-500 @else border-slate-700/80 @enderror text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all"
                    >
                    @error('name')
                        <p class="mt-1.5 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-300 mb-2">Alamat Email</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email', $user->email) }}"
                        required
                        autocomplete="username"
                        class="w-full px-4 py-3 rounded-xl bg-slate-900/80 border @error('email') border-rose-500 @else border-slate-700/80 @enderror text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all"
                    >
                    @error('email')
                        <p class="mt-1.5 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end pt-2">
                    <button
                        type="submit"
                        id="btn-save-profile"
                        class="px-6 py-2.5 rounded-xl font-semibold text-white bg-indigo-600 hover:bg-indigo-500 transition-colors shadow-md shadow-indigo-600/30 text-sm"
                    >
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        <!-- Section 2: Perbarui Kata Sandi -->
        <div class="glass-card rounded-2xl p-6 sm:p-8 glow-effect">
            <div class="mb-6 pb-6 border-b border-slate-800">
                <h2 class="text-lg font-bold text-white flex items-center gap-2">
                    <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    Perbarui Kata Sandi
                </h2>
                <p class="text-slate-400 text-xs mt-1">Pastikan akun Anda menggunakan kata sandi yang panjang dan acak demi keamanan.</p>
            </div>

            <!-- Password Updated Alert -->
            @if (session('status') === 'password-updated')
                <div class="mb-6 p-4 rounded-xl bg-emerald-950/60 border border-emerald-500/30 text-emerald-300 text-sm flex items-center gap-3">
                    <svg class="w-5 h-5 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Kata sandi berhasil diperbarui.</span>
                </div>
            @endif

            <form action="{{ route('profile.password.update') }}" method="POST" class="space-y-5" id="form-update-password">
                @csrf
                @method('PUT')

                <!-- Current Password -->
                <div>
                    <label for="current_password" class="block text-sm font-medium text-slate-300 mb-2">Kata Sandi Saat Ini</label>
                    <input
                        type="password"
                        name="current_password"
                        id="current_password"
                        autocomplete="current-password"
                        required
                        class="w-full px-4 py-3 rounded-xl bg-slate-900/80 border @error('current_password') border-rose-500 @else border-slate-700/80 @enderror text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all"
                    >
                    @error('current_password')
                        <p class="mt-1.5 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- New Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-slate-300 mb-2">Kata Sandi Baru</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        autocomplete="new-password"
                        required
                        class="w-full px-4 py-3 rounded-xl bg-slate-900/80 border @error('password') border-rose-500 @else border-slate-700/80 @enderror text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all"
                    >
                    @error('password')
                        <p class="mt-1.5 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-slate-300 mb-2">Konfirmasi Kata Sandi Baru</label>
                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        autocomplete="new-password"
                        required
                        class="w-full px-4 py-3 rounded-xl bg-slate-900/80 border @error('password_confirmation') border-rose-500 @else border-slate-700/80 @enderror text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all"
                    >
                    @error('password_confirmation')
                        <p class="mt-1.5 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end pt-2">
                    <button
                        type="submit"
                        id="btn-save-password"
                        class="px-6 py-2.5 rounded-xl font-semibold text-white bg-purple-600 hover:bg-purple-500 transition-colors shadow-md shadow-purple-600/30 text-sm"
                    >
                        Perbarui Kata Sandi
                    </button>
                </div>
            </form>
        </div>

    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-800/80 bg-[#070A12] py-6 text-xs text-slate-400 relative z-10 text-center">
        <span>© {{ date('Y') }} Nova Platform • Pengaturan Profil</span>
    </footer>
</body>
</html>
