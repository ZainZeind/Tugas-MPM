<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl mt-2 text-gray-800 leading-tight">
            {{ __('Catat Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100/60 overflow-hidden">
                
                <div class="p-8 sm:p-10">
                    <form method="POST" action="{{ route('transactions.store') }}">
                        @csrf

                        <!-- Tipe Transaksi (Tombol Kotak Pilihan Besar) -->
                        <div class="mb-8">
                            <label class="block font-semibold text-sm text-gray-700 mb-3">Jenis Transaksi</label>
                            <div class="grid grid-cols-2 gap-4">
                                <label class="cursor-pointer">
                                    <input type="radio" name="type" value="income" class="peer sr-only" {{ old('type') == 'income' ? 'checked' : '' }} required>
                                    <div class="rounded-2xl border-2 border-gray-100 bg-white px-5 py-4 hover:bg-emerald-50 peer-checked:border-emerald-500 peer-checked:bg-emerald-50 peer-checked:shadow-sm transition-all text-center">
                                        <div class="text-emerald-600 font-bold tracking-wide">Pemasukan</div>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="type" value="expense" class="peer sr-only" {{ old('type') == 'expense' ? 'checked' : '' }}>
                                    <div class="rounded-2xl border-2 border-gray-100 bg-white px-5 py-4 hover:bg-rose-50 peer-checked:border-rose-500 peer-checked:bg-rose-50 peer-checked:shadow-sm transition-all text-center">
                                        <div class="text-rose-600 font-bold tracking-wide">Pengeluaran</div>
                                    </div>
                                </label>
                            </div>
                            <x-input-error :messages="$errors->get('type')" class="mt-2" />
                        </div>

                        <!-- Nominal -->
                        <div class="mb-8">
                            <x-input-label for="amount_display" :value="__('Nominal Uang')" class="mb-2 font-semibold" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="text-gray-400 font-bold text-lg">Rp</span>
                                </div>
                                <input id="amount_display" class="block w-full pl-12 pr-4 py-3 rounded-2xl border-gray-200 bg-gray-50 focus:bg-white focus:border-[#0066CC] focus:ring focus:ring-[#0066CC]/20 transition-all font-semibold text-gray-800 text-lg" type="text" required placeholder="0" />
                                <input type="hidden" name="amount" id="amount_value" value="{{ old('amount') }}" />
                            </div>
                            <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                        </div>

                        <!-- Tanggal & Keterangan (Grid) -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                            <div>
                                <x-input-label for="date" :value="__('Tanggal')" class="mb-2 font-semibold" />
                                <input id="date" class="block w-full px-4 py-3 rounded-2xl border-gray-200 bg-gray-50 focus:bg-white focus:border-[#0066CC] focus:ring focus:ring-[#0066CC]/20 transition-all text-gray-700 font-medium" type="date" name="date" value="{{ old('date', date('Y-m-d')) }}" required />
                                <x-input-error :messages="$errors->get('date')" class="mt-2" />
                            </div>
                            
                            <div>
                                <x-input-label for="description" :value="__('Deskripsi')" class="mb-2 font-semibold" />
                                <input id="description" class="block w-full px-4 py-3 rounded-2xl border-gray-200 bg-gray-50 focus:bg-white focus:border-[#0066CC] focus:ring focus:ring-[#0066CC]/20 transition-all text-gray-700 font-medium" type="text" name="description" value="{{ old('description') }}" required placeholder="Makan siang / Gaji" />
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex items-center justify-end pt-6 border-t border-gray-100">
                            <a href="{{ route('transactions.index') }}" class="text-sm font-semibold text-gray-500 hover:text-gray-800 mr-6 transition-colors">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center px-8 py-3.5 bg-[#0066CC] border border-transparent rounded-full font-bold text-sm text-white hover:bg-[#0052a3] focus:bg-[#0052a3] active:bg-[#004080] focus:outline-none focus:ring-4 focus:ring-[#0066CC]/30 transition-all shadow-md hover:shadow-lg">
                                Simpan Transaksi
                            </button>
                        </div>
                    </form>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const amountDisplay = document.getElementById('amount_display');
                        const amountValue = document.getElementById('amount_value');

                        function formatRupiah(number) {
                            if (!number) return '';
                            return new Intl.NumberFormat('id-ID').format(number);
                        }

                        amountDisplay.addEventListener('input', function(e) {
                            let value = this.value.replace(/\D/g, '');
                            
                            if (value) {
                                amountValue.value = value;
                                this.value = formatRupiah(value);
                            } else {
                                amountValue.value = '';
                                this.value = '';
                            }
                        });

                        // Set initial formatting if verification fails and old value exists
                        if (amountValue.value) {
                            amountDisplay.value = formatRupiah(amountValue.value);
                        }
                    });
                </script>
                
            </div>
        </div>
    </div>
</x-app-layout>
