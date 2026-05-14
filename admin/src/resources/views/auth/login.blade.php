<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | TANIHUB</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-white antialiased">
    <div class="flex min-h-screen">
        <div class="hidden lg:flex lg:w-1/2 bg-emerald-900 relative items-center justify-center overflow-hidden">
            <div class="absolute inset-0 opacity-30">
                <img src="https://images.unsplash.com/photo-1523348837708-15d4a09cfac2?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover">
            </div>
            <div class="relative z-10 text-center p-12">
                <img src="{{ asset('assets/logo.png') }}" class="h-24 w-auto mx-auto mb-6 drop-shadow-2xl">
                <h1 class="text-4xl font-bold text-white tracking-tight">Modernizing Agriculture.</h1>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-12">
            <div class="w-full max-w-sm">
                <div class="mb-10">
                    <h2 class="text-3xl font-extrabold text-slate-900 mb-2">Sign In</h2>
                    <p class="text-slate-500 font-medium">Masuk ke sistem manajemen TANIHUB</p>
                </div>

                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2 text-left">Email Address</label>
                        <input type="email" name="email" required autofocus class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none" placeholder="admin@tanihub.com">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2 text-left">Password</label>
                        <input type="password" name="password" required class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none" placeholder="••••••••">
                    </div>
                    <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-emerald-600/20 transition-all">Sign In</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>