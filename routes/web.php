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
        
    // 5 Transaksi Terakhir
    $transaksiTerakhir = Transaction::where('user_id', $userId)
        ->orderBy('date', 'desc')
        ->orderBy('id', 'desc')
        ->take(5)
        ->get();
        
    // Data Chart Bulanan (Tahun Berjalan)
    $chartPemasukan = array_fill(0, 12, 0);
    $chartPengeluaran = array_fill(0, 12, 0);
    $chartSaldo = array_fill(0, 12, 0);

    $allTransactions = Transaction::where('user_id', $userId)
        ->whereYear('date', Carbon::now()->year)
        ->get();
        
    foreach ($allTransactions as $t) {
        $bulanIndex = Carbon::parse($t->date)->month - 1;
        if ($t->type == 'income') {
            $chartPemasukan[$bulanIndex] += (float) $t->amount;
        } else {
            $chartPengeluaran[$bulanIndex] += (float) $t->amount;
        }
    }

    for ($i = 0; $i < 12; $i++) {
        $chartSaldo[$i] = $chartPemasukan[$i] - $chartPengeluaran[$i];
    }

    return view('dashboard', compact(
        'totalPemasukan',
        'totalPengeluaran',
        'saldo',
        'totalTransaksiBulanIni',
        'transaksiTerakhir',
        'chartPemasukan',
        'chartPengeluaran',
        'chartSaldo'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('transactions/export', [TransactionController::class, 'export'])->name('transactions.export');
    Route::post('transactions/batch-destroy', [TransactionController::class, 'batchDestroy'])->name('transactions.batchDestroy');
    Route::resource('transactions', TransactionController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
