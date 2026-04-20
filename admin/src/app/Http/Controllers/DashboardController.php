<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $adminFee = Transaction::where('status', 'success')->sum('fee_admin');
        $kasTanam = Transaction::where('status', 'success')->sum('dana_kas');
        $totalPetani = User::where('role', 'petani')->where('status', 'active')->count();

        return view('admin.dashboard', compact('adminFee', 'kasTanam', 'totalPetani'));
    }
}