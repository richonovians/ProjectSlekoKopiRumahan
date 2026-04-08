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
                Reset Password 🔑
            </h1>
            <p class="text-xs text-gray-500 mt-2 leading-relaxed">
                Masukkan email kamu, kami akan mengirimkan link untuk reset password.
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 text-sm text-green-600 text-center" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label class="text-xs font-semibold text-gray-600">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full mt-1 px-4 py-3 rounded-xl border border-[#E8DFD1] focus:ring-2 focus:ring-[#C88A58]/40 focus:border-[#C88A58] outline-none transition"
                    required autofocus>

                @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Button -->
            <button
                class="w-full bg-[#C88A58] hover:bg-[#b57a4a] text-white py-3 rounded-xl font-semibold transition shadow-md hover:shadow-lg">
                Kirim Link Reset
            </button>

            <!-- Back to Login -->
            <p class="text-center text-xs text-gray-500 mt-4">
                Sudah ingat password?
                <a href="{{ route('login') }}" class="text-[#C88A58] font-semibold hover:underline">
                    Login
                </a>
            </p>

        </form>

    </div>

</div>

@endsection