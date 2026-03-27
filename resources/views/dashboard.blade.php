<x-app-layout>
    <div class="max-w-[1400px] mx-auto w-full space-y-6">
        
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h2>
            <div class="flex items-center space-x-2">
                <button class="inline-flex items-center justify-center rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 shadow-sm transition-colors hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#0066CC] focus:ring-offset-2">
                    <svg class="mr-2 h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ \Carbon\Carbon::now()->translatedFormat('d M Y') }}
                </button>
                <button class="inline-flex items-center justify-center rounded-md bg-[#0066CC] px-4 py-2.5 text-sm font-medium text-white shadow-sm transition-colors hover:bg-[#0052a3] focus:outline-none focus:ring-2 focus:ring-[#0066CC] focus:ring-offset-2">
                    Unduh Laporan
                </button>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <div class="inline-flex h-9 items-center justify-center rounded-lg bg-gray-100 p-1 text-gray-500 text-sm">
            <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md bg-white px-3 py-1 font-medium text-gray-900 shadow-sm ring-offset-white transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                Ringkasan
            </button>
            <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 font-medium transition-all hover:bg-white/50 hover:text-gray-900 focus-visible:outline-none focus-visible:ring-2 disabled:pointer-events-none disabled:opacity-50">
                Analitik
            </button>
            <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 font-medium transition-all hover:bg-white/50 hover:text-gray-900 focus-visible:outline-none focus-visible:ring-2 disabled:pointer-events-none disabled:opacity-50">
                Laporan
            </button>
            <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 font-medium transition-all hover:bg-white/50 hover:text-gray-900 focus-visible:outline-none focus-visible:ring-2 disabled:pointer-events-none disabled:opacity-50">
                Notifikasi
            </button>
        </div>

        <!-- Metric Cards -->
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
            <!-- Card 1 -->
            <div class="rounded-xl border border-gray-200 bg-white text-gray-900 shadow-sm transition-all hover:shadow-md">
                <div class="p-6 flex flex-row items-center justify-between space-y-0 pb-2">
                    <h3 class="tracking-tight text-sm font-medium">Total Pemasukan</h3>
                    <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2v20m-7-7h14"></path></svg>
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
                    <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
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
                    <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
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
                <div class="flex flex-col space-y-1.5 p-6 pb-4">
                    <h3 class="font-semibold leading-none tracking-tight">Ringkasan Pendapatan</h3>
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
        document.addEventListener("DOMContentLoaded", function () {
            // Wait for Chart JS to load if needed in async environments
            setTimeout(() => {
                const canvas = document.getElementById('overviewChart');
                if(!canvas) return;
                
                const ctx = canvas.getContext('2d');
                const chartData = @json($chartData);
                
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                        datasets: [{
                            label: 'Pendapatan',
                            data: chartData,
                            backgroundColor: '#0066CC', // Primary brand color
                            hoverBackgroundColor: '#0052a3',
                            borderRadius: 6,
                            borderSkipped: false,
                        }]
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
                                    color: '#f1f5f9',
                                    drawBorder: false,
                                    drawTicks: false,
                                },
                                border: { display: false, dash: [4, 4] },
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
