<!DOCTYPE html>
<html lang="id" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | Tera Tani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="h-full antialiased text-slate-900">
    <div class="flex min-h-full">
        <div class="flex flex-1 flex-col justify-center px-6 py-12 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-600 shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h2 class="mt-8 text-3xl font-bold tracking-tight text-slate-900">Selamat Datang</h2>
                    <p class="mt-2 text-sm text-slate-500">
                        Belum punya akun? <a href="{{ route('register') }}" class="font-semibold text-emerald-600 hover:text-emerald-500 transition-colors">Daftar sekarang</a>
                    </p>
                </div>

                <div class="mt-10">
                    {{-- Alert Notifikasi Tunggu ACC --}}
                    @if(session('success'))
                        <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 flex gap-3 shadow-sm">
                            <svg class="h-5 w-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-sm text-emerald-800 font-medium leading-relaxed">{{ session('success') }}</p>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-sm font-semibold text-slate-900">Alamat Email</label>
                            <input name="email" type="email" required value="{{ old('email') }}"
                                class="mt-2 block w-full rounded-lg border-0 py-3 px-4 ring-1 ring-slate-300 focus:ring-2 focus:ring-emerald-600 sm:text-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-900">Kata Sandi</label>
                            <input name="password" type="password" required
                                class="mt-2 block w-full rounded-lg border-0 py-3 px-4 ring-1 ring-slate-300 focus:ring-2 focus:ring-emerald-600 sm:text-sm">
                        </div>

                        <button type="submit" class="w-full rounded-lg bg-emerald-600 py-3 text-sm font-bold text-white hover:bg-emerald-700 transition-all shadow-md">
                            MASUK
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="relative hidden w-0 flex-1 lg:block">
            <img class="absolute inset-0 h-full w-full object-cover" src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1920&q=80">
            <div class="absolute inset-0 bg-emerald-950/40 backdrop-blur-[1px]"></div>
        </div>
    </div>
</body>
</html>