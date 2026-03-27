<x-guest-layout>
    <div class="text-center mb-10">
        <h2 class="text-3xl font-bold text-gray-900">Daftar Akun</h2>
        <p class="text-sm text-gray-500 mt-2">Buat akun untuk mulai mengelola keuangan Anda</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
            <input id="name" class="block mt-1 w-full rounded-md border-gray-200 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm px-4 py-2 border" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Nama Anda" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-semibold text-gray-700">Email Address</label>
            <input id="email" class="block mt-1 w-full rounded-md border-gray-200 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm px-4 py-2 border" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="you@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
            <input id="password" class="block mt-1 w-full rounded-md border-gray-200 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm px-4 py-2 border"
                            type="password"
                            name="password"
                            required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-semibold text-gray-700">Konfirmasi Password</label>
            <input id="password_confirmation" class="block mt-1 w-full rounded-md border-gray-200 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm px-4 py-2 border"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#0066CC] hover:bg-[#0052a3] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0066CC]">
                Register
            </button>
        </div>
        
        <div class="text-center pt-4">
            <p class="text-sm text-gray-500">
                Sudah punya akun? <a href="{{ route('login') }}" class="font-medium text-[#0066CC] hover:underline">Masuk di sini</a>
            </p>
        </div>
    </form>
</x-guest-layout>
