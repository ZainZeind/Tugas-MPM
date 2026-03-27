<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $userId = Auth::id();
    
    // Hitung Total Pemasukan
    $totalPemasukan = Transaction::where('user_id', $userId)
        ->where('type', 'income')
        ->sum('amount');
        
    // Hitung Total Pengeluaran
    $totalPengeluaran = Transaction::where('user_id', $userId)
        ->where('type', 'expense')
        ->sum('amount');
        
    // Hitung Saldo
    $saldo = $totalPemasukan - $totalPengeluaran;
    
    // Hitung Total Transaksi Bulan Ini
    $totalTransaksiBulanIni = Transaction::where('user_id', $userId)
        ->whereMonth('date', Carbon::now()->month)
        ->whereYear('date', Carbon::now()->year)
        ->count();
        
        
    // Data Chart Pemasukan Bulanan (Tahun Berjalan)
    $chartData = array_fill(0, 12, 0); // isi 0 untuk 12 bln
    $transaksiPendapatan = Transaction::where('user_id', $userId)
        ->where('type', 'income')
        ->whereYear('date', Carbon::now()->year)
        ->get();
        
    foreach ($transaksiPendapatan as $t) {
        $bulanIndex = Carbon::parse($t->date)->month - 1; 
        $chartData[$bulanIndex] += (float) $t->amount;
    }

    return view('dashboard', compact(
        'totalPemasukan',
        'totalPengeluaran',
        'saldo',
        'totalTransaksiBulanIni',
        'chartData'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('transactions', TransactionController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
