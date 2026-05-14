<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Petani — Agri Service</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .bg-pattern { background-image: url('https://www.transparenttextures.com/patterns/leaf.png'); }
    </style>
    {!! NoCaptcha::renderJs() !!}
</head>
<body class="bg-slate-50 bg-pattern">
    <div class="min-h-screen flex items-center justify-center p-6">
        <div class="bg-white w-full max-w-4xl rounded-[3rem] shadow-2xl shadow-slate-200/60 overflow-hidden flex flex-col md:flex-row">
            
            <div class="hidden md:flex md:w-1/3 bg-emerald-700 p-12 flex-col justify-between text-white">
                <div>
                    <h2 class="text-2xl font-bold leading-tight">Langkah Awal Digitalisasi Lahan.</h2>
                    <p class="mt-4 text-emerald-100/80 text-sm">Data yang Anda masukkan membantu kami menghitung potensi bagi hasil dan tabungan modal masa depan Anda.</p>
                </div>
                
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="bg-emerald-600 p-2 rounded-lg text-xl">📋</div>
                        <div>
                            <p class="font-bold text-sm">Data Akurat</p>
                            <p class="text-xs text-emerald-100/60">Membantu sistem verifikasi otomatis.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="bg-emerald-600 p-2 rounded-lg text-xl">📈</div>
                        <div>
                            <p class="font-bold text-sm">Estimasi Panen</p>
                            <p class="text-xs text-emerald-100/60">Prediksi pendapatan tahunan otomatis.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-2/3 p-10 md:p-14">
                <div class="mb-10">
                    <h1 class="text-3xl font-extrabold text-slate-800">Daftar Akun</h1>
                    <p class="text-slate-500 mt-2">Lengkapi profil pertanian Anda untuk mulai bergabung.</p>
                </div>

                <form action="{{ route('register') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="role" value="petani">
                    <input type="hidden" name="status" value="active">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Nama Lengkap</label>
                            <input type="text" name="name" class="w-full px-5 py-4 bg-slate-50 border-transparent rounded-2xl focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all" placeholder="Budi Santoso" value="{{ old('name') }}" required>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Email</label>
                            <input type="email" name="email" class="w-full px-5 py-4 bg-slate-50 border-transparent rounded-2xl focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all" placeholder="budi@email.com" value="{{ old('email') }}" required>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">No. WhatsApp</label>
                            <input type="tel" name="phone" class="w-full px-5 py-4 bg-slate-50 border-transparent rounded-2xl focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all" placeholder="0812xxxx" value="{{ old('phone') }}" required>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Komoditas Utama</label>
                            <select name="commodity" class="w-full px-5 py-4 bg-slate-50 border-transparent rounded-2xl focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all">
                                <option value="Padi">Padi</option>
                                <option value="Cabai">Cabai</option>
                                <option value="Jagung">Jagung</option>
                                <option value="Bawang">Bawang</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Luas Tanah (m²)</label>
                            <input type="number" name="land_area" class="w-full px-5 py-4 bg-slate-50 border-transparent rounded-2xl focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all" placeholder="1000" value="{{ old('land_area') }}" required>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Kata Sandi</label>
                            <input type="password" name="password" class="w-full px-5 py-4 bg-slate-50 border-transparent rounded-2xl focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all" required>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Konfirmasi</label>
                            <input type="password" name="password_confirmation" class="w-full px-5 py-4 bg-slate-50 border-transparent rounded-2xl focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all" required>
                        </div>
                    </div>

                    <div class="flex flex-col items-center py-2">
                        {!! NoCaptcha::display() !!}
                        @error('g-recaptcha-response')
                            <span class="text-red-500 text-xs mt-2 font-semibold italic">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-5 rounded-[2rem] shadow-xl shadow-emerald-100 transition-all transform active:scale-[0.98]">
                            Daftarkan Lahan Sekarang
                        </button>
                    </div>
                </form>

                <div class="mt-10 text-center">
                    <p class="text-slate-500 text-sm">
                        Sudah punya akun? <a href="{{ route('login') }}" class="text-emerald-600 font-bold hover:underline">Masuk di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>