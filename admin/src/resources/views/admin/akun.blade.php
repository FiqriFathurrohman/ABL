@extends('layouts.app')

@section('content')
<div class="mb-10">
    <h1 class="text-4xl font-[900] text-slate-900 tracking-tight italic">User Central.</h1>
    <p class="text-slate-500 font-medium">Otorisasi mitra petani dan manajemen basis data pelanggan.</p>
</div>

<div class="flex gap-8 border-b border-slate-200 mb-8">
    <button onclick="mainTab('verifikasi')" id="btn-v" class="pb-4 text-sm font-black border-b-4 border-emerald-600 text-emerald-600 transition-all">
        PERLU VERIFIKASI
    </button>
    <button onclick="mainTab('database')" id="btn-d" class="pb-4 text-sm font-bold text-slate-400 border-b-4 border-transparent hover:text-slate-600 transition-all">
        DATABASE PENGGUNA
    </button>
</div>

<div id="section-verifikasi" class="space-y-8 block">
    <div class="grid grid-cols-1 gap-8">
        <div class="bg-white rounded-[3rem] border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-8 border-b border-slate-50 flex justify-between items-center bg-slate-50/30">
                <h3 class="font-black text-slate-900 uppercase tracking-widest text-xs">Antrean Verifikasi Petani</h3>
                <span class="bg-amber-100 text-amber-700 px-3 py-1 rounded-full text-[10px] font-black">{{ $pendingPetani->count() }} Menunggu</span>
            </div>
            <table class="w-full text-left">
                <tbody class="divide-y divide-slate-50">
                    @forelse($pendingPetani as $p)
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="px-8 py-6">
                            <p class="font-bold text-slate-900">{{ $p->name }}</p>
                            <p class="text-[10px] text-slate-400 font-medium italic">Mitra Tani Baru</p>
                        </td>
                        <td class="px-8 py-6 text-sm text-slate-500">{{ $p->email }}</td>
                        <td class="px-8 py-6 text-right">
                            <div class="flex justify-end gap-2">
                                <form action="{{ route('akun.approve', $p->id) }}" method="POST">
                                    @csrf
                                    <button class="bg-emerald-600 text-white px-5 py-2.5 rounded-2xl text-[10px] font-black uppercase shadow-lg shadow-emerald-100 hover:bg-emerald-700 transition">Setujui</button>
                                </form>
                                <form action="{{ route('akun.reject', $p->id) }}" method="POST">
                                    @csrf
                                    <button class="bg-white border border-slate-200 text-slate-400 px-5 py-2.5 rounded-2xl text-[10px] font-black uppercase hover:bg-red-50 hover:text-red-600 hover:border-red-100 transition">Tolak</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="p-10 text-center text-slate-400 font-medium italic text-sm italic">Belum ada mitra tani yang mendaftar.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="bg-white rounded-[3rem] border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-8 border-b border-slate-50 flex justify-between items-center bg-slate-50/30">
                <h3 class="font-black text-slate-900 uppercase tracking-widest text-xs text-blue-600">Verifikasi Akun Customer</h3>
                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-[10px] font-black">{{ $pendingUsers->count() }} Baru</span>
            </div>
            <table class="w-full text-left">
                <tbody class="divide-y divide-slate-50">
                    @forelse($pendingUsers as $u)
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="px-8 py-6">
                            <p class="font-bold text-slate-900">{{ $u->name }}</p>
                            <p class="text-[10px] text-slate-400 font-medium italic text-blue-400">Regular Customer</p>
                        </td>
                        <td class="px-8 py-6 text-sm text-slate-500">{{ $u->email }}</td>
                        <td class="px-8 py-6 text-right">
                            <form action="{{ route('akun.approve', $u->id) }}" method="POST">
                                @csrf
                                <button class="bg-slate-900 text-white px-5 py-2.5 rounded-2xl text-[10px] font-black uppercase shadow-lg shadow-slate-100 hover:bg-black transition">Aktifkan Akun</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="p-10 text-center text-slate-400 font-medium italic text-sm italic text-sm">Semua akun customer sudah diverifikasi.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="section-database" class="space-y-8 hidden">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-white rounded-[3rem] border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-8 border-b border-slate-50 bg-slate-50/50">
                <h3 class="font-black text-slate-900 uppercase tracking-widest text-[10px] italic text-emerald-600 underline">List Petani Aktif</h3>
            </div>
            <div class="max-h-[500px] overflow-y-auto">
                <table class="w-full text-left border-collapse">
                    @foreach($activePetanis as $ap)
                    <tr class="border-b border-slate-50 hover:bg-slate-50 transition">
                        <td class="px-8 py-5">
                            <p class="font-bold text-slate-900 text-sm">{{ $ap->name }}</p>
                            <div class="flex items-center gap-2">
                                <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span>
                                <p class="text-[9px] text-emerald-600 font-black tracking-widest uppercase">ID: TNH-{{ str_pad($ap->id, 4, '0', STR_PAD_LEFT) }}</p>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <button class="w-8 h-8 rounded-full border border-slate-100 flex items-center justify-center text-slate-300 hover:text-emerald-600 hover:border-emerald-100 transition shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="bg-white rounded-[3rem] border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-8 border-b border-slate-50 bg-slate-50/50">
                <h3 class="font-black text-slate-900 uppercase tracking-widest text-[10px] italic text-blue-600 underline">Database Customer</h3>
            </div>
            <div class="max-h-[500px] overflow-y-auto">
                <table class="w-full text-left border-collapse">
                    @foreach($activeCustomers as $ac)
                    <tr class="border-b border-slate-50 hover:bg-slate-50 transition">
                        <td class="px-8 py-5">
                            <p class="font-bold text-slate-900 text-sm">{{ $ac->name }}</p>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest leading-none mt-1">{{ $ac->email }}</p>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <span class="text-[9px] font-black text-slate-400 bg-slate-100 px-2 py-1 rounded-md uppercase">Verified User</span>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function mainTab(type) {
        const secV = document.getElementById('section-verifikasi');
        const secD = document.getElementById('section-database');
        const btnV = document.getElementById('btn-v');
        const btnD = document.getElementById('btn-d');

        if(type === 'verifikasi') {
            secV.classList.remove('hidden');
            secV.classList.add('block');
            secD.classList.remove('block');
            secD.classList.add('hidden');
            btnV.className = "pb-4 text-sm font-black border-b-4 border-emerald-600 text-emerald-600 transition-all";
            btnD.className = "pb-4 text-sm font-bold text-slate-400 border-b-4 border-transparent hover:text-slate-600 transition-all";
        } else {
            secD.classList.remove('hidden');
            secD.classList.add('block');
            secV.classList.remove('block');
            secV.classList.add('hidden');
            btnD.className = "pb-4 text-sm font-black border-b-4 border-emerald-600 text-emerald-600 transition-all";
            btnV.className = "pb-4 text-sm font-bold text-slate-400 border-b-4 border-transparent hover:text-slate-600 transition-all";
        }
    }
</script>
@endpush
@endsection