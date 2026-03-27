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
    <body class="font-sans text-gray-900 antialiased overflow-hidden">
        <div class="h-screen flex">
            <!-- Left Side (Blue Background) -->
            <div class="hidden lg:flex lg:w-1/3 bg-[#0066CC] text-white flex-col justify-between p-12 relative overflow-hidden">
                <!-- Striped overlay pattern mimicking the image -->
                <div class="absolute top-0 inset-x-0 h-12 flex opacity-10">
                   <div style="width: 100%; background: repeating-linear-gradient(45deg, transparent, transparent 10px, #000 10px, #000 20px);"></div>
                </div>
                
                <div class="relative z-10 flex flex-col items-start mt-4">
                    <!-- Icon placeholder mimicking the image -->
                    <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-6 shadow-sm">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                    </div>
                    
                    <h1 class="text-4xl font-bold mb-4 tracking-tight">Catat Keuangan</h1>
                    <p class="text-sm text-blue-100 mb-8 max-w-sm leading-relaxed">
                        Aplikasi pencatatan keuangan sederhana. Kelola pemasukan dan pengeluaran harian Anda dengan presisi.
                    </p>
                    
                    <div class="flex flex-col space-y-4 text-sm font-medium text-blue-50">
                        <span class="flex items-center"><span class="w-1.5 h-1.5 bg-blue-300 rounded-full mr-3"></span> Manajemen Pemasukan</span>
                        <span class="flex items-center"><span class="w-1.5 h-1.5 bg-blue-300 rounded-full mr-3"></span> Catat Pengeluaran</span>
                    </div>
                </div>

                <div class="relative z-10 mt-auto">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center text-blue-100 hover:text-white transition-colors group">
                        <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Dashboard Utama
                    </a>
                </div>
            </div>

            <!-- Right Side (Content Area) -->
            <div class="w-full lg:w-2/3 flex flex-col bg-gray-50 h-screen overflow-y-auto">
                <!-- Top Nav inside Right Pane -->
                <div class="bg-white border-b border-gray-100 px-6 sm:px-8 py-4 flex justify-between items-center sticky top-0 z-20 shadow-sm">
                    <div class="flex items-center lg:hidden">
                        <!-- Mobile Title -->
                        <h1 class="text-xl font-bold text-[#0066CC]">Catat Keuangan</h1>
                    </div>
                    
                    <!-- Include Header Slot -->
                    @if (isset($header))
                        <div class="hidden lg:flex-1 lg:block w-full">
                            {{ $header }}
                        </div>
                    @else
                        <div class="hidden lg:block flex-1"></div>
                    @endif

                    <div class="flex items-center space-x-2 sm:space-x-4 lg:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out px-2 py-1">
                                    <div class="hidden sm:block">{{ Auth::user()->name }}</div>
                                    <div class="sm:hidden">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    </div>
                                    <div class="ml-1 hidden sm:block">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('dashboard')">
                                    Dashboard Utama
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>

                <!-- Main Content -->
                <main class="p-6 sm:p-8">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
