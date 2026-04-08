@extends('layouts.auth')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-[#Fdfaf5] relative overflow-hidden px-6">

    <!-- Background Effect -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-[#C88A58]/30 rounded-full blur-3xl opacity-40 -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-[#4A3024]/20 rounded-full blur-3xl opacity-40 translate-x-1/3 translate-y-1/3"></div>

    <div class="w-full max-w-md bg-white/70 backdrop-blur-xl rounded-3xl shadow-2xl border border-[#E8DFD1] p-8 md:p-10">

        <!-- Title -->
        <div class="text-center mb-6">
            <h1 class="font-serif text-2xl font-bold text-[#4A3024]">
                Confirm Password 🔐
            </h1>
            <p class="text-xs text-gray-500 mt-2 leading-relaxed">
                Demi keamanan akunmu, silakan masukkan kembali password untuk melanjutkan.
            </p>
        </div>

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
            @csrf

            <!-- Password -->
            <div>
                <label class="text-xs font-semibold text-gray-600">Password</label>
                <input type="password" name="password"
                    class="w-full mt-1 px-4 py-3 rounded-xl border border-[#E8DFD1] focus:ring-2 focus:ring-[#C88A58]/40 focus:border-[#C88A58] outline-none transition"
                    required autocomplete="current-password">

                @error('password')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Button -->
            <button
                class="w-full bg-[#C88A58] hover:bg-[#b57a4a] text-white py-3 rounded-xl font-semibold transition shadow-md hover:shadow-lg">
                Confirm Password
            </button>
        </form>

    </div>

</div>

@endsection