<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class FinanceController extends Controller
{
    public function index()
    {
        // Statistik Utama
        $totalRevenue = Transaction::where('status', 'success')->sum('total_amount');
        $adminFee = Transaction::where('status', 'success')->sum('fee_admin'); // 4%
        $kasTanam = Transaction::where('status', 'success')->sum('dana_kas'); // 6%
        
        // Riwayat Transaksi Terbaru
        $transactions = Transaction::latest()->paginate(10);

        return view('admin.keuangan', compact('totalRevenue', 'adminFee', 'kasTanam', 'transactions'));
    }
}