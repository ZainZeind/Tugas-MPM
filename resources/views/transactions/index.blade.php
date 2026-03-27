<x-app-layout>
    <!-- Flatpickr CSS & JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    @php
        $totalPemasukan = $transactions->where('type', 'income')->sum('amount');
        $totalPengeluaran = $transactions->where('type', 'expense')->sum('amount');
        $selisih = $totalPemasukan - $totalPengeluaran;
    @endphp

    <div class="space-y-6">
        <!-- Section Header -->
        <div class="flex items-end justify-between mt-2 pt-2">
            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Riwayat Transaksi</h2>
            </div>
            <div class="flex items-center space-x-3">
                <button type="button" id="btn-hapus-terpilih" class="hidden items-center space-x-1.5 px-4 py-2.5 bg-rose-50 border border-rose-100 rounded-lg font-semibold text-[13px] text-rose-600 shadow-sm hover:bg-rose-100 focus:outline-none transition-colors">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    <span>Hapus Terpilih</span>
                </button>
                <a href="{{ route('transactions.create') }}" class="inline-flex items-center space-x-1.5 px-4 py-2.5 bg-[#0066CC] rounded-lg font-semibold text-[13px] text-white shadow-sm hover:bg-[#0052a3] focus:outline-none transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Catat Transaksi</span>
                </a>
            </div>
        </div>

        <!-- Filter Row -->
        <div class="bg-white rounded-xl shadow-[0_1px_3px_0_rgba(0,0,0,0.05)] border border-gray-100 p-5">
            <p class="text-xs text-gray-500 font-medium mb-3">Filter by:</p>
            <form method="GET" action="{{ route('transactions.index') }}" class="flex flex-wrap items-center gap-3">
                <div class="relative w-64">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    </div>
                    <input name="search" value="{{ request('search') }}" class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg text-[13px] placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-[#0066CC] focus:border-[#0066CC] transition-colors" placeholder="Cari deskripsi transaksi" type="text" />
                </div>
                
                <div class="flex items-center space-x-2">
                    <span class="text-xs text-gray-500 font-medium">Dari</span>
                    <input type="text" name="start_date" value="{{ request('start_date') }}" class="datepicker-input border border-gray-200 rounded-lg text-[13px] py-2 px-3 focus:outline-none focus:ring-1 focus:ring-[#0066CC] focus:border-[#0066CC] transition-colors text-gray-600 bg-white" placeholder="dd/mm/yyyy" title="Tanggal Mulai">
                    <span class="text-xs text-gray-500 font-medium mx-1">Sampai</span>
                    <input type="text" name="end_date" value="{{ request('end_date') }}" class="datepicker-input border border-gray-200 rounded-lg text-[13px] py-2 px-3 focus:outline-none focus:ring-1 focus:ring-[#0066CC] focus:border-[#0066CC] transition-colors text-gray-600 bg-white" placeholder="dd/mm/yyyy" title="Tanggal Sampai">
                </div>
                
                <select name="type" class="border border-gray-200 rounded-lg text-[13px] py-2 pl-3.5 pr-8 focus:outline-none focus:ring-1 focus:ring-[#0066CC] focus:border-[#0066CC] transition-colors text-gray-600 bg-white">
                    <option value="">Semua Tipe</option>
                    <option value="income" {{ request('type') == 'income' ? 'selected' : '' }}>Pemasukan</option>
                    <option value="expense" {{ request('type') == 'expense' ? 'selected' : '' }}>Pengeluaran</option>
                </select>

                <div class="ml-auto flex items-center space-x-2">
                    <button type="submit" class="flex items-center space-x-1.5 px-4 py-2 bg-[#0066CC] text-white rounded-lg text-[13px] font-medium shadow-sm hover:bg-[#0052a3] transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                        <span>Cari</span>
                    </button>
                    <a href="{{ route('transactions.index') }}" class="flex items-center space-x-1.5 px-4 py-2 border border-gray-200 rounded-lg text-[13px] font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors bg-white shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        <span>Reset Filter</span>
                    </a>
                </div>
            </form>
        </div>

        <!-- Table Container -->
        <div class="bg-white rounded-xl shadow-[0_1px_3px_0_rgba(0,0,0,0.05)] border border-gray-100 overflow-hidden">

            <form id="bulk-delete-form" method="POST" action="{{ route('transactions.batchDestroy') }}">
                @csrf
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse whitespace-nowrap">
                        <thead>
                            <tr class="text-gray-900 font-semibold text-[13px] border-b border-gray-100">
                                <th class="px-5 py-4 w-12 text-center border-r border-gray-50">
                                    <input type="checkbox" id="select-all" class="w-4 h-4 text-[#0066CC] bg-white border-gray-300 rounded focus:ring-[#0066CC] focus:ring-2 cursor-pointer">
                                </th>
                                <th class="px-5 py-4">ID Transaksi</th>
                                <th class="px-5 py-4">Deskripsi</th>
                                <th class="px-5 py-4">Tanggal</th>
                                <th class="px-5 py-4">Tipe</th>
                                <th class="px-5 py-4 text-right">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody class="text-[13px] divide-y divide-gray-100 bg-white">
                            @forelse($transactions as $index => $transaction)
                                <tr class="hover:bg-gray-50/80 transition duration-150">
                                    <td class="px-5 py-4 text-center border-r border-gray-50">
                                        <input type="checkbox" name="ids[]" value="{{ $transaction->id }}" class="transaction-checkbox w-4 h-4 text-[#0066CC] bg-white border-gray-300 rounded focus:ring-[#0066CC] focus:ring-2 cursor-pointer">
                                    </td>
                                    <td class="px-5 py-4 font-mono text-xs text-[#0066CC] font-medium tracking-tight hover:underline cursor-pointer">
                                        {{ substr(md5($transaction->id), 0, 8) }}-{{ substr(md5($transaction->description), 0, 4) }}
                                    </td>
                                    <td class="px-5 py-4 text-gray-900 font-medium">{{ $transaction->description }}</td>
                                    <td class="px-5 py-4 text-gray-600">{{ \Carbon\Carbon::parse($transaction->date)->format('d/m/Y') }}</td>
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
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-5 py-16 text-center text-gray-500">
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
            </form>

            @if(session('success'))
            <!-- Success Modal -->
            <div id="success-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900/50 backdrop-blur-sm transition-opacity">
                <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm overflow-hidden transform transition-all duration-300 scale-100 opacity-100" id="success-modal-panel">
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 rounded-full bg-emerald-50 text-emerald-500 mx-auto flex items-center justify-center mb-4 border border-emerald-100">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Berhasil!</h3>
                        <p class="text-[13px] text-gray-500 mb-6">{{ session('success') }}</p>
                        <button type="button" id="btn-close-success" class="w-full py-2.5 bg-[#0066CC] text-white rounded-xl font-bold text-sm hover:bg-[#0052a3] transition-colors shadow-sm focus:ring-2 focus:ring-[#0066CC]/50">
                            Oke
                        </button>
                    </div>
                </div>
            </div>
            @endif

            <!-- Custom Delete Confirmation Modal -->
            <div id="delete-modal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-900/50 backdrop-blur-sm transition-opacity">
                <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="delete-modal-panel">
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 rounded-full bg-amber-50 text-amber-500 mx-auto flex items-center justify-center mb-4 border border-amber-100">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Yakin ingin menghapus?</h3>
                        <p class="text-[13px] text-gray-500 mb-6">Data transaksi yang dipilih akan dihapus secara permanen dan tidak dapat dikembalikan.</p>
                        <div class="flex space-x-3">
                            <button type="button" id="btn-cancel-delete" class="flex-1 py-2.5 border-2 border-rose-500 text-rose-600 rounded-xl font-bold text-sm hover:bg-rose-50 hover:text-rose-700 transition-colors">
                                Tidak
                            </button>
                            <button type="button" id="btn-confirm-delete" class="flex-1 py-2.5 bg-emerald-500 text-white rounded-xl font-bold text-sm hover:bg-emerald-600 transition-colors shadow-sm focus:ring-2 focus:ring-emerald-200">
                                Iya
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const selectAll = document.getElementById('select-all');
                    const checkboxes = document.querySelectorAll('.transaction-checkbox');
                    const btnHapus = document.getElementById('btn-hapus-terpilih');
                    const deleteModal = document.getElementById('delete-modal');
                    const modalPanel = document.getElementById('delete-modal-panel');
                    const btnCancel = document.getElementById('btn-cancel-delete');
                    const btnConfirm = document.getElementById('btn-confirm-delete');
                    const formDelete = document.getElementById('bulk-delete-form');
                    
                    const successModal = document.getElementById('success-modal');
                    const successModalPanel = document.getElementById('success-modal-panel');
                    const btnCloseSuccess = document.getElementById('btn-close-success');

                    function updateDeleteButton() {
                        const checkedCount = document.querySelectorAll('.transaction-checkbox:checked').length;
                        if (checkedCount > 0) {
                            btnHapus.classList.remove('hidden');
                            btnHapus.classList.add('inline-flex');
                        } else {
                            btnHapus.classList.add('hidden');
                            btnHapus.classList.remove('inline-flex');
                        }
                    }

                    if (selectAll) {
                        selectAll.addEventListener('change', function() {
                            checkboxes.forEach(cb => cb.checked = this.checked);
                            updateDeleteButton();
                        });
                    }

                    checkboxes.forEach(cb => {
                        cb.addEventListener('change', function() {
                            const allChecked = document.querySelectorAll('.transaction-checkbox:checked').length === checkboxes.length;
                            selectAll.checked = allChecked;
                            updateDeleteButton();
                        });
                    });

                    btnHapus.addEventListener('click', function() {
                        deleteModal.classList.remove('hidden');
                        setTimeout(() => {
                            modalPanel.classList.remove('scale-95', 'opacity-0');
                            modalPanel.classList.add('scale-100', 'opacity-100');
                        }, 10);
                    });

                    function closeModal() {
                        modalPanel.classList.remove('scale-100', 'opacity-100');
                        modalPanel.classList.add('scale-95', 'opacity-0');
                        setTimeout(() => {
                            deleteModal.classList.add('hidden');
                        }, 300);
                    }

                    btnCancel.addEventListener('click', closeModal);
                    
                    deleteModal.addEventListener('click', function(e) {
                        if(e.target === deleteModal) closeModal();
                    });

                    btnConfirm.addEventListener('click', function() {
                        formDelete.submit();
                    });

                    // Initialize Flatpickr
                    flatpickr(".datepicker-input", {
                        dateFormat: "Y-m-d",         // Value sent to the backend
                        altInput: true,              // Creates a hidden input for the backend
                        altFormat: "d/m/Y",          // The format visually displayed to the user
                        allowInput: true             // Allows manual typing
                    });

                    // Success modal logic
                    if (successModal && btnCloseSuccess) {
                        function closeSuccessModal() {
                            successModalPanel.classList.remove('scale-100', 'opacity-100');
                            successModalPanel.classList.add('scale-95', 'opacity-0');
                            setTimeout(() => {
                                successModal.classList.add('hidden');
                            }, 300);
                        }

                        btnCloseSuccess.addEventListener('click', closeSuccessModal);
                        successModal.addEventListener('click', function(e) {
                            if(e.target === successModal) closeSuccessModal();
                        });
                    }
                });
            </script>

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
