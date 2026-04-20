@extends('layouts.app')

@section('content')
<div class="flex justify-between items-end mb-12">
    <div>
        <h1 class="text-5xl font-[900] text-slate-900 tracking-tight italic">Console Hub.</h1>
        <p class="text-slate-500 font-medium mt-2 text-lg">Monitoring sistem tanpa hutang & distribusi nasional.</p>
    </div>
    <div class="flex items-center gap-4">
        <div class="text-right">
            <p class="text-[10px] font-black text-slate-400 uppercase">Waktu Server</p>
            <p class="text-sm font-bold text-slate-900">{{ now()->format('d M Y, H:i') }}</p>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-white border border-slate-200 flex items-center justify-center shadow-sm">
            <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
    <div class="group relative bg-white p-10 rounded-[3.5rem] border border-slate-200 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 overflow-hidden">
        <div class="absolute -right-6 -bottom-6 w-32 h-32 bg-emerald-50 rounded-full group-hover:scale-150 transition-all duration-700"></div>
        <div class="relative z-10">
            <div class="w-12 h-12 bg-emerald-600 rounded-2xl flex items-center justify-center text-white mb-6 shadow-lg shadow-emerald-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <p class="text-slate-400 text-xs font-black uppercase tracking-[0.2em] mb-2">Revenue Hub (4%)</p>
            <h2 class="text-4xl font-[900] text-slate-900">Rp {{ number_format($adminFee, 0, ',', '.') }}</h2>
            <p class="text-emerald-600 text-[10px] font-bold mt-4 flex items-center gap-1 uppercase">
                <span class="w-1.5 h-1.5 bg-emerald-600 rounded-full"></span> Operasional Aktif
            </p>
        </div>
    </div>

    <div class="group relative bg-white p-10 rounded-[3.5rem] border border-slate-200 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 overflow-hidden">
        <div class="absolute -right-6 -bottom-6 w-32 h-32 bg-blue-50 rounded-full group-hover:scale-150 transition-all duration-700"></div>
        <div class="relative z-10">
            <div class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center text-white mb-6 shadow-lg shadow-blue-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path></svg>
            </div>
            <p class="text-slate-400 text-xs font-black uppercase tracking-[0.2em] mb-2">Dana Kas Tanam (6%)</p>
            <h2 class="text-4xl font-[900] text-slate-900">Rp {{ number_format($kasTanam, 0, ',', '.') }}</h2>
            <p class="text-blue-600 text-[10px] font-bold mt-4 flex items-center gap-1 uppercase">
                <span class="w-1.5 h-1.5 bg-blue-600 rounded-full"></span> Modal Aman
            </p>
        </div>
    </div>

    <div class="group relative bg-white p-10 rounded-[3.5rem] border border-slate-200 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 overflow-hidden">
        <div class="absolute -right-6 -bottom-6 w-32 h-32 bg-slate-50 rounded-full group-hover:scale-150 transition-all duration-700"></div>
        <div class="relative z-10">
            <div class="w-12 h-12 bg-slate-900 rounded-2xl flex items-center justify-center text-white mb-6 shadow-lg shadow-slate-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <p class="text-slate-400 text-xs font-black uppercase tracking-[0.2em] mb-2">Mitra Terdaftar</p>
            <h2 class="text-4xl font-[900] text-slate-900">{{ $totalPetani }} <span class="text-sm font-bold text-slate-400">PETANI</span></h2>
            <p class="text-slate-500 text-[10px] font-bold mt-4 flex items-center gap-1 uppercase underline cursor-pointer">
                Verifikasi Menunggu (0)
            </p>
        </div>
    </div>
</div>

<div class="bg-white p-4 rounded-[4rem] border border-slate-200 shadow-sm">
    <div class="bg-slate-50 p-12 rounded-[3.5rem]">
        <div class="flex justify-between items-center mb-10">
            <div>
                <h3 class="text-2xl font-[900] text-slate-900 tracking-tight">Sebaran Komoditas Nasional</h3>
                <p class="text-slate-500 text-sm font-medium">Data real-time dari seluruh titik pengepul mitra.</p>
            </div>
            <div class="flex gap-3">
                <button class="bg-white border border-slate-200 px-6 py-3 rounded-2xl text-xs font-black text-slate-600 hover:bg-white transition shadow-sm">Export PDF</button>
                <button class="bg-emerald-600 text-white px-6 py-3 rounded-2xl text-xs font-black hover:bg-emerald-700 shadow-xl shadow-emerald-200 transition-all">Update Peta</button>
            </div>
        </div>
        
        <div id="container-map" class="w-full" style="height:550px;"></div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/id/id-all.js"></script>
<script>
    Highcharts.mapChart('container-map', {
        chart: { map: 'countries/id/id-all', backgroundColor: 'transparent' },
        title: { text: '' },
        credits: { enabled: false },
        colorAxis: { 
            min: 0, 
            minColor: '#F0FDF4', 
            maxColor: '#059669',
            labels: { style: { fontWeight: 'bold' } }
        },
        plotOptions: {
            map: {
                states: {
                    hover: { color: '#059669' }
                }
            }
        },
        series: [{
            data: [['id-jr', 100], ['id-jt', 500], ['id-ji', 300]], // Dummy data sebaran
            name: 'Stok Komoditas (Ton)',
            dataLabels: {
                enabled: true,
                format: '{point.name}',
                style: { fontSize: '9px', fontWeight: 'bold', textOutline: 'none' }
            }
        }]
    });
</script>
@endpush