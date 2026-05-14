<!DOCTYPE html>
<html lang="id" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar | Tera Tani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="h-full antialiased text-slate-900">
    <div class="flex min-h-full">
        <!-- Visual Section -->
        <div class="relative hidden w-0 flex-1 lg:block">
            <img class="absolute inset-0 h-full w-full object-cover" src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?auto=format&fit=crop&w=1920&q=80">
            <div class="absolute inset-0 bg-emerald-900/60 backdrop-blur-[2px]"></div>
            <div class="absolute inset-0 flex items-center justify-center p-12 text-white">
                <div class="max-w-md text-center">
                    <h3 class="text-4xl font-bold mb-6 leading-tight">Mulai Transformasi Digital Pertanian Anda</h3>
                    <p class="text-lg opacity-90">Bergabunglah dengan ribuan mitra untuk memajukan ekosistem pangan Indonesia.</p>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="flex flex-1 flex-col justify-center px-6 py-12 lg:flex-none lg:px-20 xl:px-24 bg-slate-50/50">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-600 shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </div>
                    <h2 class="mt-8 text-3xl font-bold tracking-tight text-slate-900">Buat Akun Baru</h2>
                    <p class="mt-2 text-sm text-slate-500">
                        Sudah punya akun? <a href="{{ route('login') }}" class="font-semibold text-emerald-600 hover:text-emerald-500 transition-colors">Masuk di sini</a>
                    </p>
                </div>

                <div class="mt-10">
                    <!-- Global Error Messages -->
                    @if($errors->any())
                        <div class="mb-4 p-3 rounded-lg bg-red-50 border border-red-200 text-red-600 text-sm">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('register.post') }}" method="POST" class="space-y-5">
                        @csrf
                        <div>
                            <label class="block text-sm font-semibold text-slate-900">Nama Lengkap</label>
                            <input name="name" type="text" required value="{{ old('name') }}" placeholder="Masukkan nama lengkap"
                                class="mt-2 block w-full rounded-lg border-0 py-2.5 px-4 ring-1 ring-slate-300 focus:ring-2 focus:ring-emerald-600 transition-all sm:text-sm @error('name') ring-red-500 @enderror">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-900">Alamat Email</label>
                            <input name="email" type="email" required value="{{ old('email') }}" placeholder="nama@perusahaan.com"
                                class="mt-2 block w-full rounded-lg border-0 py-2.5 px-4 ring-1 ring-slate-300 focus:ring-2 focus:ring-emerald-600 transition-all sm:text-sm @error('email') ring-red-500 @enderror">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-900">Kata Sandi</label>
                            <input name="password" type="password" required placeholder="Minimal 8 karakter"
                                class="mt-2 block w-full rounded-lg border-0 py-2.5 px-4 ring-1 ring-slate-300 focus:ring-2 focus:ring-emerald-600 transition-all sm:text-sm @error('password') ring-red-500 @enderror">
                        </div>

                        <div class="flex items-start">
                            <input id="terms" type="checkbox" required class="mt-1 h-4 w-4 text-emerald-600 border-slate-300 rounded cursor-pointer">
                            <label for="terms" class="ml-3 text-xs text-slate-600 leading-tight">
                                Saya setuju dengan <a href="#" class="text-emerald-600 underline">Syarat & Ketentuan</a> serta <a href="#" class="text-emerald-600 underline">Kebijakan Privasi</a>.
                            </label>
                        </div>

                        <button type="submit" class="w-full rounded-lg bg-emerald-600 py-3 text-sm font-bold text-white shadow-md hover:bg-emerald-700 transition-all active:scale-[0.98]">
                            DAFTAR SEKARANG
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>