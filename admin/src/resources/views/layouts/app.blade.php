<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TANIHUB Console — Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; letter-spacing: -0.02em; }
        .sidebar-active { background: #ecfdf5; color: #059669; font-weight: 800; border-right: 4px solid #059669; }
        .brand-logo { object-fit: contain; width: auto; height: 50px; }
    </style>
</head>
<body class="bg-[#F8FAFC] text-slate-900">

    <div class="flex min-h-screen">
        <aside class="w-80 bg-white border-r border-slate-200 fixed h-full z-50 flex flex-col">
            <div class="p-10">
                <div class="flex items-center gap-3 group cursor-pointer">
                    <img src="{{ asset('assets/logo.png') }}" alt="TANIHUB Logo" class="brand-logo group-hover:scale-105 transition-transform duration-300">
                    <div class="flex flex-col">
                        <span class="text-xl font-[900] text-slate-900 leading-none tracking-tighter uppercase">TANIHUB</span>
                        <span class="text-[9px] font-black text-emerald-600 tracking-[0.3em] uppercase mt-1">Console Hub</span>
                    </div>
                </div>
            </div>

            <nav class="flex-1 px-6 space-y-1 overflow-y-auto">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4 mb-4">Utama</p>
                
                <a href="{{ route('dashboard') }}" class="flex items-center gap-4 px-6 py-4 rounded-2xl transition-all duration-200 {{ request()->is('dashboard') ? 'sidebar-active' : 'text-slate-500 hover:bg-slate-50' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span class="text-sm">Dashboard</span>
                </a>

                <a href="{{ route('akun.index') }}" class="flex items-center gap-4 px-6 py-4 rounded-2xl transition-all duration-200 {{ request()->is('manajemen-akun*') ? 'sidebar-active' : 'text-slate-500 hover:bg-slate-50' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    <span class="text-sm">Pengguna & Verifikasi</span>
                </a>

                <a href="{{ route('finance.index') }}" class="flex items-center gap-4 px-6 py-4 rounded-2xl transition-all duration-200 {{ request()->is('laporan-keuangan*') ? 'sidebar-active' : 'text-slate-500 hover:bg-slate-50' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="text-sm">Laporan Keuangan</span>
                </a>

                <div class="pt-6">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4 mb-4">Data Master</p>
                    
                    <a href="#" class="flex items-center gap-4 px-6 py-4 rounded-2xl text-slate-500 hover:bg-slate-50 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path></svg>
                        <span class="text-sm">Kategori Komoditas</span>
                    </a>
                </div>
            </nav>

            <div class="p-8 border-t border-slate-100">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full py-4 bg-red-50 text-red-600 rounded-2xl text-sm font-[900] uppercase tracking-widest hover:bg-red-600 hover:text-white transition-all duration-300 shadow-lg shadow-red-100">
                        Logout System
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 ml-80 p-12">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>