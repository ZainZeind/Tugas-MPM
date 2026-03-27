<x-guest-layout>
    <div class="text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Selamat Datang</h2>
        <p class="text-gray-600 mb-8 leading-relaxed">Platform pencatatan dan analisis keuangan pribadi Anda. Kelola transaksi Anda dengan mudah dan pintar.</p>
        
        <div class="space-y-4">
            @auth
                <a href="{{ url('/dashboard') }}" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-[#0066CC] hover:bg-[#0052a3] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0066CC] transition-colors">
                    Lanjut ke Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-[#0066CC] hover:bg-[#0052a3] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0066CC] transition-colors">
                    Masuk (Login)
                </a>
                
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="w-full flex justify-center py-3 px-4 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0066CC] mt-4 transition-colors">
                        Daftar Akun Baru
                    </a>
                @endif
            @endauth
        </div>

        <div class="mt-8">
            <p class="text-xs text-gray-400">&copy; {{ date('Y') }} Catat Keuangan</p>
        </div>
    </div>
</x-guest-layout>
