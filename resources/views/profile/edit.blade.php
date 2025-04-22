<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-purple-700 leading-tight tracking-wide">
            {{ __('Profil Saya') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-purple-50 via-white to-blue-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">
            {{-- Update Profile Info --}}
            <div class="p-6 sm:p-8 bg-white border border-purple-100 shadow-lg rounded-xl transition-default hover:shadow-xl">
                <div class="max-w-xl">
                    <h3 class="text-xl font-semibold text-purple-600 mb-4">Informasi Profil</h3>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Update Password --}}
            <div class="p-6 sm:p-8 bg-white border border-blue-100 shadow-lg rounded-xl transition-default hover:shadow-xl">
                <div class="max-w-xl">
                    <h3 class="text-xl font-semibold text-blue-600 mb-4">Ubah Password</h3>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Delete User --}}
            <div class="p-6 sm:p-8 bg-white border border-red-100 shadow-lg rounded-xl transition-default hover:shadow-xl">
                <div class="max-w-xl">
                    <h3 class="text-xl font-semibold text-red-600 mb-4">Hapus Akun</h3>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
