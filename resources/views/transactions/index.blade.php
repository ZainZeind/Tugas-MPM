<x-app-layout>
    @php
        $totalPemasukan = $transactions->where('type', 'income')->sum('amount');
        $totalPengeluaran = $transactions->where('type', 'expense')->sum('amount');
        $selisih = $totalPemasukan - $totalPengeluaran;
    @endphp

    <div class="space-y-6">
        <!-- Top Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Card 1 -->
            <div class="bg-blue-50/50 rounded-2xl p-5 border border-blue-100 flex items-center space-x-4 shadow-sm">
                <div class="w-11 h-11 rounded-xl bg-blue-100/50 text-[#0066CC] flex flex-shrink-0 items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-medium mb-0.5">Saldo Rekap (Akumulatif)</p>
                    <p class="text-[17px] font-bold text-emerald-600">Rp {{ number_format($selisih, 0, ',', '.') }}</p>
                </div>
            </div>
            
            <!-- Card 2 -->
            <div class="bg-white rounded-2xl p-5 border border-gray-200/60 flex items-center space-x-4 shadow-sm">
                <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-500 flex flex-shrink-0 items-center justify-center border border-emerald-100/50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-medium mb-0.5">Total Pemasukan</p>
                    <p class="text-[17px] font-bold text-emerald-600">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-2xl p-5 border border-gray-200/60 flex items-center space-x-4 shadow-sm">
                <div class="w-11 h-11 rounded-xl bg-rose-50 text-rose-500 flex flex-shrink-0 items-center justify-center border border-rose-100/50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path></svg>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-medium mb-0.5">Total Pengeluaran</p>
                    <p class="text-[17px] font-bold text-rose-600">-Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</p>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white rounded-2xl p-5 border border-gray-200/60 flex items-center space-x-4 shadow-sm">
                <div class="w-11 h-11 rounded-xl bg-[#0066CC]/5 text-[#0066CC] flex flex-shrink-0 items-center justify-center border border-[#0066CC]/10">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-medium mb-0.5">Jumlah Transaksi</p>
                    <p class="text-[17px] font-bold text-gray-800">{{ $transactions->count() }} Data</p>
                </div>
            </div>
        </div>

        <!-- Filter Row -->
        <div class="pt-2">
            <p class="text-xs text-gray-500 font-medium mb-2.5">Filter by:</p>
            <div class="flex flex-wrap items-center gap-3">
                <div class="relative w-64">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    </div>
                    <input class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg text-[13px] placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-[#0066CC] focus:border-[#0066CC] transition-colors" placeholder="Cari data rekapan" type="text" />
                </div>
                
                <select class="border border-gray-200 rounded-lg text-[13px] py-2 pl-3.5 pr-8 focus:outline-none focus:ring-1 focus:ring-[#0066CC] focus:border-[#0066CC] transition-colors text-gray-600 bg-white">
                    <option>Semua Waktu</option>
                </select>
                
                <select class="border border-gray-200 rounded-lg text-[13px] py-2 pl-3.5 pr-8 focus:outline-none focus:ring-1 focus:ring-[#0066CC] focus:border-[#0066CC] transition-colors text-gray-600 bg-white">
                    <option>Semua Tipe</option>
                    <option>Pemasukan</option>
                    <option>Pengeluaran</option>
                </select>

                <select class="border border-gray-200 rounded-lg text-[13px] py-2 pl-3.5 pr-8 focus:outline-none focus:ring-1 focus:ring-[#0066CC] focus:border-[#0066CC] transition-colors text-gray-600 bg-white">
                    <option>1-10</option>
                </select>

                <button class="flex items-center space-x-1.5 px-4 py-2 border border-gray-200 rounded-lg text-[13px] font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors bg-white shadow-sm ml-auto">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    <span>Reset Filter</span>
                </button>
            </div>
        </div>

        <!-- Section Header -->
        <div class="flex items-end justify-between mt-8 mb-4">
            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Riwayat Transaksi</h2>
                <div class="flex items-center space-x-4 mt-1 text-[13px] font-medium">
                    <span class="text-gray-500">Total pemasukan: <span class="text-emerald-500 font-semibold">Rp{{ number_format($totalPemasukan, 0, ',', '.') }}</span></span>
                    <span class="text-gray-500">Total pengeluaran: <span class="text-rose-500 font-semibold">-Rp{{ number_format($totalPengeluaran, 0, ',', '.') }}</span></span>
                    <span class="text-gray-500">Selisih: <span class="text-emerald-500 font-semibold">Rp{{ number_format($selisih, 0, ',', '.') }}</span></span>
                </div>
            </div>
            <a href="{{ route('transactions.create') }}" class="inline-flex items-center space-x-1.5 px-4 py-2.5 bg-[#0066CC] rounded-lg font-semibold text-[13px] text-white shadow-sm hover:bg-[#0052a3] focus:outline-none transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                <span>Catat Transaksi</span>
            </a>
        </div>

        <!-- Table Container -->
        <div class="bg-white rounded-xl shadow-[0_1px_3px_0_rgba(0,0,0,0.05)] border border-gray-100 overflow-hidden">
            @if(session('success'))
                <div class="px-5 py-3 border-b border-emerald-100 bg-emerald-50 text-emerald-800 flex items-center">
                    <svg class="w-4 h-4 mr-2 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-medium text-[13px]">{{ session('success') }}</span>
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse whitespace-nowrap">
                    <thead>
                        <tr class="text-gray-900 font-semibold text-[13px] border-b border-gray-100">
                            <th class="px-5 py-4 w-12 text-center border-r border-gray-50">
                                <input type="checkbox" class="w-4 h-4 text-[#0066CC] bg-white border-gray-300 rounded focus:ring-[#0066CC] focus:ring-2" disabled>
                            </th>
                            <th class="px-5 py-4 w-16 text-center">No</th>
                            <th class="px-5 py-4">ID Transaksi</th>
                            <th class="px-5 py-4">Deskripsi</th>
                            <th class="px-5 py-4">Tanggal</th>
                            <th class="px-5 py-4">Rekening</th>
                            <th class="px-5 py-4">Tipe</th>
                            <th class="px-5 py-4 text-right">Jumlah</th>
                            <th class="px-5 py-4 w-16 text-center border-l border-gray-50"></th>
                        </tr>
                    </thead>
                    <tbody class="text-[13px] divide-y divide-gray-100 bg-white">
                        @forelse($transactions as $index => $transaction)
                            <tr class="hover:bg-gray-50/80 transition duration-150">
                                <td class="px-5 py-4 text-center border-r border-gray-50">
                                    <input type="checkbox" class="w-4 h-4 text-[#0066CC] bg-white border-gray-300 rounded focus:ring-[#0066CC] focus:ring-2 cursor-pointer">
                                </td>
                                <td class="px-5 py-4 text-center font-semibold text-gray-900">{{ $index + 1 }}</td>
                                <td class="px-5 py-4 font-mono text-xs text-[#0066CC] font-medium tracking-tight hover:underline cursor-pointer">
                                    {{ substr(md5($transaction->id), 0, 8) }}-{{ substr(md5($transaction->description), 0, 4) }}
                                </td>
                                <td class="px-5 py-4 text-gray-900 font-medium">{{ $transaction->description }}</td>
                                <td class="px-5 py-4 text-gray-600">{{ \Carbon\Carbon::parse($transaction->date)->translatedFormat('d F Y') }}</td>
                                <td class="px-5 py-4 text-gray-600">Dompet Tunai</td>
                                <td class="px-5 py-4">
                                    @if($transaction->type === 'income')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-md border border-emerald-100 bg-emerald-50 text-emerald-600 text-[11px] font-semibold tracking-wide">
                                            Pemasukan
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-md border border-rose-100 bg-rose-50 text-rose-600 text-[11px] font-semibold tracking-wide">
                                            Pengeluaran
                                        </span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 text-right font-medium {{ $transaction->type === 'income' ? 'text-emerald-500' : 'text-rose-500' }}">
                                    {{ $transaction->type === 'income' ? 'Rp ' : '-Rp ' }}{{ number_format($transaction->amount, 0, ',', '.') }}
                                </td>
                                <td class="px-5 py-4 text-center border-l border-gray-50">
                                    <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-gray-400 hover:text-rose-600 hover:bg-rose-50 rounded-md transition duration-200" title="Hapus Transaksi">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="px-5 py-16 text-center text-gray-500">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="w-16 h-16 rounded-full bg-gray-50 flex items-center justify-center mb-4">
                                            <svg class="w-8 h-8 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        </div>
                                        <p class="font-medium text-gray-900">Belum ada rekapan transaksi.</p>
                                        <p class="text-[13px] text-gray-400 mt-1">Mulai catat transaksi untuk melihat riwayat.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination Placeholder (Match design) -->
            @if($transactions->count() > 0)
            <div class="px-5 py-4 border-t border-gray-100 bg-white flex flex-col sm:flex-row items-center justify-between">
                <p class="text-[13px] text-gray-500 mb-4 sm:mb-0">Menampilkan 1 sampai {{ $transactions->count() }} dari {{ $transactions->count() }} data</p>
                <div class="flex space-x-1">
                    <button class="px-3 py-1.5 border border-gray-200 bg-gray-50 text-gray-400 rounded-md text-[13px] font-medium cursor-not-allowed transition-colors">Seb</button>
                    <button class="px-3 py-1.5 border border-[#0066CC] bg-[#0066CC] text-white rounded-md text-[13px] font-semibold transition-colors">1</button>
                    <button class="px-3 py-1.5 border border-gray-200 bg-gray-50 text-gray-400 rounded-md text-[13px] font-medium cursor-not-allowed transition-colors">Sel</button>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
