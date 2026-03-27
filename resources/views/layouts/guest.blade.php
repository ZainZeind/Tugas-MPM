<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex">
            <!-- Left Side (Green Background) -->
            <div class="hidden lg:flex lg:w-1/2 bg-[#0066CC] text-white flex-col justify-center items-center p-12 relative overflow-hidden">
                <!-- Striped overlay pattern mimicking the image -->
                <div class="absolute top-0 inset-x-0 h-12 flex opacity-10">
                   <div style="width: 100%; background: repeating-linear-gradient(45deg, transparent, transparent 10px, #000 10px, #000 20px);"></div>
                </div>
                
                <div class="relative z-10 text-center">
                    <!-- Icon placeholder mimicking the image -->
                    <div class="w-16 h-16 bg-white/20 backdrop-blur-sm mx-auto rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                    </div>
                    
                    <h1 class="text-4xl font-bold mb-4 tracking-tight">Catat Keuangan</h1>
                    <p class="text-lg text-blue-100 mb-8 max-w-sm mx-auto leading-relaxed">
                        Aplikasi pencatatan keuangan sederhana. Kelola pemasukan dan pengeluaran harian Anda dengan presisi.
                    </p>
                    
                    <div class="flex items-center justify-center space-x-4 text-sm font-medium text-blue-50">
                        <span class="flex items-center"><span class="w-1.5 h-1.5 bg-blue-300 rounded-full mr-2"></span> Manajemen Pemasukan</span>
                        <span class="flex items-center"><span class="w-1.5 h-1.5 bg-blue-300 rounded-full mr-2"></span> Catat Pengeluaran</span>
                    </div>
                </div>
            </div>

            <!-- Right Side (Form Area) -->
            <div class="w-full lg:w-1/2 flex flex-col justify-center items-center bg-white p-8">
                <div class="w-full max-w-md">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
