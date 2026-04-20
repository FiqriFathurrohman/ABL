@extends('layouts.app')

@section('content')
<div class="mb-10">
    <h1 class="text-4xl font-[900] text-slate-900 tracking-tight italic">Financial Report.</h1>
    <p class="text-slate-500 font-medium">Monitoring alokasi dana operasional dan tabungan kas tanam.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
    <div class="bg-slate-900 p-10 rounded-[3rem] text-white relative overflow-hidden shadow-2xl">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-emerald-500/20 rounded-full blur-3xl"></div>
        <div class="relative z-10">
            <div class="flex justify-between items-start mb-6">
                <span class="bg-emerald-500/20 text-emerald-400 px-4 py-1 rounded-full text-[10px] font-black uppercase tracking-widest">Revenue Admin (4%)</span>
                <svg class="w-8 h-8 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
            </div>
            <h2 class="text-5xl font-[900] tracking-tighter">Rp {{ number_format($adminFee, 0, ',', '.') }}</h2>
            <p class="text-slate-400 text-xs mt-4 font-medium italic">*Alokasi biaya maintenance & server</p>
        </div>
    </div>

    <div class="bg-white p-10 rounded-[3rem] border border-slate-200 shadow-sm relative overflow-hidden">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-blue-500/5 rounded-full blur-3xl"></div>
        <div class="relative z-10">
            <div class="flex justify-between items-start mb-6">
                <span class="bg-blue-50 text-blue-600 px-4 py-1 rounded-full text-[10px] font-black uppercase tracking-widest">Tabungan Kas Tanam (6%)</span>
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h2 class="text-5xl font-[900] text-slate-900 tracking-tighter">Rp {{ number_format($kasTanam, 0, ',', '.') }}</h2>
            <p class="text-slate-400 text-xs mt-4 font-medium italic">*Dana abadi untuk permodalan bibit</p>
        </div>
    </div>
</div>

<div class="bg-white rounded-[3.5rem] border border-slate-200 shadow-sm overflow-hidden">
    <div class="p-10 border-b border-slate-50 flex justify-between items-center bg-slate-50/30">
        <h3 class="font-black text-slate-900 uppercase tracking-widest text-xs italic underline decoration-emerald-500 decoration-4 underline-offset-8">Riwayat Transaksi Terkini</h3>
        <button class="bg-white border border-slate-200 px-6 py-2 rounded-2xl text-[10px] font-black uppercase hover:bg-slate-50 transition shadow-sm">Export Excel</button>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-slate-50/50">
                    <th class="px-10 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">ID Transaksi</th>
                    <th class="px-10 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">User / Petani</th>
                    <th class="px-10 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Total Bayar</th>
                    <th class="px-10 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-emerald-600">Admin (4%)</th>
                    <th class="px-10 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-blue-600">Kas (6%)</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @foreach($transactions as $t)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="px-10 py-6 font-black text-slate-400 text-xs uppercase">#{{ $t->trx_id }}</td>
                    <td class="px-10 py-6">
                        <p class="font-bold text-slate-900 text-sm italic">{{ $t->user->name }}</p>
                    </td>
                    <td class="px-10 py-6 font-bold text-slate-900 text-sm">Rp {{ number_format($t->total_amount, 0, ',', '.') }}</td>
                    <td class="px-10 py-6 font-black text-emerald-600 text-sm">Rp {{ number_format($t->fee_admin, 0, ',', '.') }}</td>
                    <td class="px-10 py-6 font-black text-blue-600 text-sm">Rp {{ number_format($t->dana_kas, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-8">
        {{ $transactions->links() }}
    </div>
</div>
@endsection