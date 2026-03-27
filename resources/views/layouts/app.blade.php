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
    <body class="font-sans antialiased text-gray-900 bg-white">
        <!-- New Dashboard Container -->
        <div class="flex h-screen overflow-hidden">
            
            <!-- Sidebar -->
            <aside class="w-64 border-r border-gray-100 bg-white flex flex-col hidden lg:flex shrink-0 z-20 relative">
                @include('layouts.navigation')
            </aside>

            <!-- Main Content Area -->
            <div class="flex-1 flex flex-col min-w-0 overflow-hidden bg-[#FAFBFC]">
                
                <!-- Topbar -->
                <header class="h-16 border-b border-gray-100 bg-white flex items-center justify-between px-6 shrink-0 z-10">
                    <!-- Left part: Search bar equivalent -->
                    <div class="flex flex-1 items-center">
                        <div class="relative w-full max-w-sm hidden sm:block">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input class="block w-full pl-10 pr-3 py-1.5 border border-transparent rounded-lg leading-5 bg-gray-50 text-gray-600 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-gray-200 focus:ring-0 sm:text-sm transition duration-150 ease-in-out" placeholder="Search ⌘J" type="search" />
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-gray-400 text-xs border border-gray-200 rounded px-1.5 bg-white shadow-sm">⌘J</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right part: Actions & Profile -->
                    <div class="ml-4 flex items-center space-x-3 sm:space-x-4 shrink-0">
                        <button class="w-9 h-9 flex items-center justify-center rounded-lg bg-[#0066CC] text-white hover:bg-[#0052a3] shadow-sm transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        </button>
                        
                        <div class="h-6 w-px bg-gray-200 mx-1"></div>

                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center space-x-2 focus:outline-none bg-white border border-gray-100 px-2 py-1.5 rounded-xl hover:bg-gray-50 transition-colors shadow-sm">
                                    <div class="w-7 h-7 rounded-full bg-[#0066CC] text-white flex items-center justify-center text-xs font-bold leading-none tracking-wider">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                                    </div>
                                    <div class="text-sm font-semibold text-gray-700 hidden sm:block truncate max-w-[120px]">
                                        {{ Auth::user()->name }}
                                    </div>
                                    <svg class="w-4 h-4 text-gray-500 hidden sm:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')" class="text-sm">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-sm text-rose-600 hover:text-rose-700">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </header>

                <!-- Scrollable Main Content -->
                <main class="flex-1 overflow-y-auto px-4 sm:px-6 lg:px-8 py-6 relative">
                    {{ $slot }}
                </main>
                
            </div>
        </div>
    </body>
</html>
