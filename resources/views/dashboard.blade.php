<x-app-layout>
    <div class="max-w-[1400px] mx-auto w-full space-y-6">
        
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h2>
            <div class="flex items-center space-x-2">

                <a href="{{ route('transactions.export') }}" class="inline-flex items-center justify-center rounded-md bg-[#0066CC] px-4 py-2.5 text-sm font-medium text-white shadow-sm transition-colors hover:bg-[#0052a3] focus:outline-none focus:ring-2 focus:ring-[#0066CC] focus:ring-offset-2">
                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Unduh Laporan
                </a>
            </div>
        </div>



        <!-- Metric Cards -->
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
            <!-- Card 1 -->
            <div class="rounded-xl border border-gray-200 bg-white text-gray-900 shadow-sm transition-all hover:shadow-md">
                <div class="p-6 flex flex-row items-center justify-between space-y-0 pb-2">
                    <h3 class="tracking-tight text-sm font-medium">Total Pemasukan</h3>
                    <svg class="h-5 w-5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="6" width="20" height="12" rx="2" />
                        <circle cx="12" cy="12" r="2" />
                        <path d="M18 12h.01M6 12h.01" />
                        <path d="M15 4l-3-3-3 3"/>
                        <path d="M12 1v6"/>
                    </svg>
                </div>
                <div class="p-6 pt-0">
                    <div class="text-2xl font-bold">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</div>
                    <p class="text-xs text-gray-500">Seluruh pemasukan Anda</p>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="rounded-xl border border-gray-200 bg-white text-gray-900 shadow-sm transition-all hover:shadow-md">
                <div class="p-6 flex flex-row items-center justify-between space-y-0 pb-2">
                    <h3 class="tracking-tight text-sm font-medium">Total Pengeluaran</h3>
                    <svg class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="6" width="20" height="12" rx="2" />
                        <circle cx="12" cy="12" r="2" />
                        <path d="M18 12h.01M6 12h.01" />
                        <path d="M15 20l-3 3-3-3"/>
                        <path d="M12 23v-6"/>
                    </svg>
                </div>
                <div class="p-6 pt-0">
                    <div class="text-2xl font-bold">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</div>
                    <p class="text-xs text-gray-500">Seluruh pengeluaran Anda</p>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="rounded-xl border border-gray-200 bg-white text-gray-900 shadow-sm transition-all hover:shadow-md">
                <div class="p-6 flex flex-row items-center justify-between space-y-0 pb-2">
                    <h3 class="tracking-tight text-sm font-medium">Saldo Saat Ini</h3>
                    <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                </div>
                <div class="p-6 pt-0">
                    <div class="text-2xl font-bold">Rp {{ number_format($saldo, 0, ',', '.') }}</div>
                    <p class="text-xs text-gray-500">Sisa saldo saat ini</p>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="rounded-xl border border-gray-200 bg-white text-gray-900 shadow-sm transition-all hover:shadow-md">
                <div class="p-6 flex flex-row items-center justify-between space-y-0 pb-2">
                    <h3 class="tracking-tight text-sm font-medium">Transaksi Bulan Ini</h3>
                    <svg class="h-5 w-5 text-indigo-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m11 17 2 2a1 1 0 1 0 3-3"/>
                        <path d="m14 14 2.5 2.5a2.12 2.12 0 1 0 3-3L15 9l-2-2-2-2c-.93-.93-2.61-.93-3.54 0L4 8.54a2.12 2.12 0 0 0 0 3l1.5 1.5"/>
                        <path d="M13 13 8 8"/>
                        <path d="m16 16 3-3"/>
                    </svg>
                </div>
                <div class="p-6 pt-0">
                    <div class="text-2xl font-bold">{{ $totalTransaksiBulanIni }}</div>
                    <p class="text-xs text-gray-500">Jumlah transaksi tercatat</p>
                </div>
            </div>
        </div>

        <!-- Main Charts Area -->
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-7">
            <!-- Overview Chart -->
            <div class="lg:col-span-4 rounded-xl border border-gray-200 bg-white text-gray-900 shadow-sm">
                <div class="flex flex-row items-center justify-between p-6 pb-4">
                    <h3 class="font-semibold leading-none tracking-tight">Statistik Keuangan</h3>
                    
                    <!-- Custom HTML Legend -->
                    <div class="flex items-center space-x-5">
                        <div class="flex items-center space-x-1.5 cursor-pointer hover:opacity-75 transition-opacity" onclick="toggleChartDataset(0, this)">
                            <div class="w-2.5 h-2.5 rounded-full bg-[#10B981]"></div>
                            <span class="text-xs text-gray-600 font-medium tracking-tight select-none">Pemasukan</span>
                        </div>
                        <div class="flex items-center space-x-1.5 cursor-pointer hover:opacity-75 transition-opacity" onclick="toggleChartDataset(1, this)">
                            <div class="w-2.5 h-2.5 rounded-full bg-[#0066CC]"></div>
                            <span class="text-xs text-gray-600 font-medium tracking-tight select-none">Saldo Bersih</span>
                        </div>
                        <div class="flex items-center space-x-1.5 cursor-pointer hover:opacity-75 transition-opacity" onclick="toggleChartDataset(2, this)">
                            <div class="w-2.5 h-2.5 rounded-full bg-[#EF4444]"></div>
                            <span class="text-xs text-gray-600 font-medium tracking-tight select-none">Pengeluaran</span>
                        </div>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-0 h-[350px]">
                    <!-- Chart Canvas -->
                    <canvas id="overviewChart"></canvas>
                </div>
            </div>

            <!-- Recent Sales -->
            <div class="lg:col-span-3 rounded-xl border border-gray-200 bg-white text-gray-900 shadow-sm">
                <div class="flex flex-col space-y-1.5 p-6 pb-4">
                    <h3 class="font-semibold leading-none tracking-tight">Transaksi Terakhir</h3>
                    <p class="text-sm text-gray-500">Menampilkan 5 transaksi terbaru.</p>
                </div>
                <div class="p-6 pt-0">
                    <div class="space-y-8">
                        @forelse($transaksiTerakhir as $trx)
                        <div class="flex items-center">
                            <span class="relative flex h-10 w-10 shrink-0 overflow-hidden rounded-full border border-gray-100 shadow-sm">
                                <span class="flex h-full w-full items-center justify-center bg-gray-50 text-[#0066CC] font-bold text-sm">
                                    {{ $trx->type == 'income' ? 'IN' : 'OT' }}
                                </span>
                            </span>
                            <div class="ml-4 space-y-1">
                                <p class="text-sm font-medium leading-none">{{ $trx->description }}</p>
                                <p class="text-sm text-gray-500 hidden sm:block">{{ \Carbon\Carbon::parse($trx->date)->translatedFormat('d F Y') }}</p>
                            </div>
                            <div class="ml-auto font-medium {{ $trx->type == 'income' ? 'text-green-600' : 'text-red-600' }}">
                                {{ $trx->type == 'income' ? '+' : '-' }}Rp {{ number_format($trx->amount, 0, ',', '.') }}
                            </div>
                        </div>
                        @empty
                        <div class="text-center text-sm text-gray-500 py-4">Belum ada transaksi</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <div class="py-4">
            <!-- =========================================================================
                 TEMPAT KERJA UNTUK ANGGOTA 2 & 3
                 (Silakan hapus baris komentar ini dan taruh kode Statistik / Tabel kalian
                 tepat di baris ini agar terjadi Git Conflict saat Pull Request nanti!)
                 ========================================================================= -->
        </div>

    </div>

    <!-- Chart Setup Code (Using Alpine to run when DOM is ready intuitively with Breeze features)-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Global toggle function for custom legend
        function toggleChartDataset(index, element) {
            const chart = window.overviewChart;
            if (!chart) return;
            
            const isVisible = chart.isDatasetVisible(index);
            if (isVisible) {
                chart.hide(index);
                element.classList.add('opacity-40');
                element.querySelector('span').classList.add('line-through');
            } else {
                chart.show(index);
                element.classList.remove('opacity-40');
                element.querySelector('span').classList.remove('line-through');
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            // Wait for Chart JS to load if needed in async environments
            setTimeout(() => {
                const canvas = document.getElementById('overviewChart');
                if(!canvas) return;
                
                const ctx = canvas.getContext('2d');
                const chartPemasukan = @json($chartPemasukan);
                const chartSaldo = @json($chartSaldo);
                const chartPengeluaran = @json($chartPengeluaran);
                
                window.overviewChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                        datasets: [
                            {
                                label: 'Pemasukan',
                                data: chartPemasukan,
                                backgroundColor: '#10B981', // emerald-500
                                hoverBackgroundColor: '#059669',
                                borderRadius: 0,
                                borderSkipped: false,
                            },
                            {
                                label: 'Saldo Bersih',
                                data: chartSaldo,
                                backgroundColor: '#0066CC', // blue
                                hoverBackgroundColor: '#0052a3',
                                borderRadius: 0,
                                borderSkipped: false,
                            },
                            {
                                label: 'Pengeluaran',
                                data: chartPengeluaran,
                                backgroundColor: '#EF4444', // red-500
                                hoverBackgroundColor: '#DC2626',
                                borderRadius: 0,
                                borderSkipped: false,
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: '#ffffff',
                                titleColor: '#0f172a',
                                bodyColor: '#475569',
                                borderColor: '#e2e8f0',
                                borderWidth: 1,
                                padding: 12,
                                displayColors: false,
                                callbacks: {
                                    label: function(context) {
                                        return 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                                    }
                                }
                            }
                        },
                        scales: {
                            x: {
                                grid: { display: false, drawBorder: false },
                                border: { display: false },
                                ticks: {
                                    color: '#64748b',
                                    font: { size: 12 }
                                }
                            },
                            y: {
                                grid: { 
                                    color: '#e2e8f0',
                                    drawBorder: false,
                                    drawTicks: false,
                                },
                                border: { display: false },
                                ticks: {
                                    color: '#64748b',
                                    font: { size: 12 },
                                    callback: function(value) {
                                        if (value === 0) return 'Rp 0';
                                        return 'Rp ' + (value/1000).toLocaleString('id-ID') + 'k';
                                    },
                                    padding: 10
                                }
                            }
                        }
                    }
                });
            }, 50);
        });
    </script>
</x-app-layout>
