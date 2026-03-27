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
                    <!-- Left part: Placeholder for flex alignment -->
                    <div class="flex flex-1 items-center"></div>

                    <!-- Right part: Actions & Profile -->
                    <div class="ml-4 flex items-center space-x-3 sm:space-x-4 shrink-0">


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
