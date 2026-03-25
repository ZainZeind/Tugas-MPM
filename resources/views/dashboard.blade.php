<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    
                    <hr class="my-6">
                    
                    <!-- =========================================================================
                         TEMPAT KERJA UNTUK ANGGOTA 2 & 3
                         (Silakan hapus baris komentar ini dan taruh kode Statistik / Tabel kalian
                         tepat di baris ini agar terjadi Git Conflict saat Pull Request nanti!)
                         ========================================================================= -->

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
