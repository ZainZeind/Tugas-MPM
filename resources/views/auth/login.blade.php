<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center mb-10">
        <h2 class="text-3xl font-bold text-gray-900">Login</h2>
        <p class="text-sm text-gray-500 mt-2">Silakan masuk ke dashboard Anda</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-semibold text-gray-700">Email Address</label>
            <input id="email" class="block mt-1 w-full rounded-md border-gray-200 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm px-4 py-2 border" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="you@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
            <input id="password" class="block mt-1 w-full rounded-md border-gray-200 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm px-4 py-2 border"
                            type="password"
                            name="password"
                            required autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                <span class="ms-2 text-sm text-gray-500">Ingat saya selama 30 hari</span>
            </label>
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#0066CC] hover:bg-[#0052a3] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0066CC]">
                Login
            </button>
        </div>

        <div class="text-center pt-8">
            <p class="text-xs text-gray-500">
                Belum punya akun? <a href="{{ route('register') }}" class="font-medium text-[#0066CC] hover:underline">Daftar di sini</a>
            </p>
        </div>
    </form>
</x-guest-layout>
