<div class="h-full flex flex-col items-stretch pt-2">
    <!-- Brand / Logo Area -->
    <div class="h-16 flex items-center px-6 shrink-0 mb-4 border-b border-gray-100">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 w-full">
            <div class="w-8 h-8 bg-[#0066CC] rounded-xl flex items-center justify-center shadow-sm flex-shrink-0">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
            </div>
            <span class="font-extrabold text-lg tracking-tight text-gray-900 ml-1">Catat Keuangan</span>
        </a>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 overflow-y-auto px-4 py-2 space-y-2 w-full">
        @php
            $navItems = [
                ['name' => 'Dashboard', 'route' => 'dashboard', 'icon' => 'M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z', 'active' => request()->routeIs('dashboard')],
                ['name' => 'Riwayat Transaksi', 'route' => 'transactions.index', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01', 'active' => request()->routeIs('transactions.*')],
            ];
        @endphp

        @foreach($navItems as $item)
            <a href="{{ route($item['route']) }}" class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 {{ $item['active'] ? 'bg-[#0066CC] bg-opacity-10 text-[#0066CC] font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 font-medium' }}">
                <svg class="flex-shrink-0 w-5 h-5 mr-3 {{ $item['active'] ? 'text-[#0066CC]' : 'text-gray-400 group-hover:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"></path>
                </svg>
                <span class="text-sm leading-tight">{{ $item['name'] }}</span>
            </a>
        @endforeach
    </nav>
</div>
