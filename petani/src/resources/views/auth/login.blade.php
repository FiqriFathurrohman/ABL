<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Petani Hub — Agri Service</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass-effect {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .bg-pattern {
            background-image: url('https://www.transparenttextures.com/patterns/leaf.png');
        }
    </style>
</head>
<body class="bg-slate-50">
    <div class="min-h-screen flex">
        
        <div class="hidden lg:flex w-1/2 bg-emerald-700 relative overflow-hidden items-center justify-center p-12">
            <div class="absolute top-0 -left-20 w-96 h-96 bg-emerald-600 rounded-full opacity-50 blur-3xl"></div>
            <div class="absolute bottom-0 -right-20 w-96 h-96 bg-emerald-800 rounded-full opacity-50 blur-3xl"></div>
            
            <div class="relative z-10 text-center max-w-md">
                <div class="inline-block bg-emerald-500/30 p-4 rounded-3xl backdrop-blur-md mb-8">
                    <svg class="w-16 h-16 text-emerald-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h1 class="text-4xl font-extrabold text-white leading-tight">Digitalisasi Panen Lebih <span class="text-emerald-300">Mudah.</span></h1>
                <p class="text-emerald-100/80 mt-6 text-lg">Pantau tabungan Kas Tanam 6% Anda dan kelola bagi hasil secara transparan setiap musim.</p>
                
                <div class="mt-12 flex justify-center gap-4">
                    <div class="bg-white/10 px-4 py-2 rounded-full text-xs text-white border border-white/20">#PetaniModern</div>
                    <div class="bg-white/10 px-4 py-2 rounded-full text-xs text-white border border-white/20">#AgriService</div>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-pattern">
            <div class="w-full max-w-md">
                <div class="lg:hidden text-center mb-8">
                    <h1 class="text-3xl font-bold text-emerald-900">Petani Hub</h1>
                </div>

                <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/60 p-10 border border-slate-100">
                    <div class="mb-10">
                        <h2 class="text-2xl font-bold text-slate-800">Selamat Datang</h2>
                        <p class="text-slate-500 mt-2 text-sm">Silakan masuk untuk mengelola lahan Anda</p>
                    </div>

                    <form action="{{ route('login') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Alamat Email</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206"></path></svg>
                                </span>
                                <input type="email" name="email" class="w-full pl-11 pr-5 py-4 bg-slate-50 border-transparent rounded-2xl focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all text-slate-700" placeholder="contoh@petani.com" required>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between mb-2 ml-1">
                                <label class="text-xs font-bold text-slate-400 uppercase tracking-widest">Kata Sandi</label>
                                <a href="#" class="text-xs font-bold text-emerald-600 hover:text-emerald-700">Lupa?</a>
                            </div>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                </span>
                                <input type="password" name="password" class="w-full pl-11 pr-5 py-4 bg-slate-50 border-transparent rounded-2xl focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all text-slate-700" placeholder="••••••••" required>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-4 rounded-2xl shadow-lg shadow-emerald-200 transition-all transform active:scale-[0.98]">
                            Masuk Sekarang
                        </button>
                    </form>

                    <div class="mt-8 pt-8 border-t border-slate-100">
                        <p class="text-center text-slate-500 text-sm">
                            Belum terdaftar? <a href="{{ route('register') }}" class="text-emerald-600 font-bold hover:underline underline-offset-4">Daftar Lahan Baru</a>
                        </p>
                    </div>
                </div>
                
                <p class="text-center mt-10 text-slate-400 text-xs tracking-wide uppercase">
                    &copy; 2026 Agri Service Hub • Tangerang
                </p>
            </div>
        </div>

    </div>
</body>
</html>