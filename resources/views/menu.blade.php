@extends('layouts.app')

@section('content')

<section class="bg-[#f5f7fd] pt-32 pb-16 relative overflow-hidden">
    <div class="absolute top-0 left-0 w-64 h-64 bg-[#E8DFD1] rounded-full mix-blend-multiply filter blur-3xl opacity-50 transform -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-[#E8DFD1] rounded-full mix-blend-multiply filter blur-3xl opacity-50 transform translate-x-1/3 translate-y-1/3"></div>

    <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
        <span class="text-[#5881c8] uppercase tracking-[0.3em] text-xs font-bold mb-4 block">Taste the Perfection</span>
        <h1 class="font-serif text-6xl md:text-7xl font-bold text-[#023A73] mb-6">Our Menu</h1>
        <p class="text-[#55627a] text-sm md:text-base max-w-2xl mx-auto font-light leading-relaxed">
            Jelajahi pilihan racikan kopi terbaik dan camilan lezat yang dibuat dengan bahan-bahan premium. Setiap sajian adalah cerita dari dapur kami untuk Anda.
        </p>
    </div>
</section>

<section class="bg-[#d6e5f3] min-h-screen py-20">
    <div class="max-w-[90rem] mx-auto px-4 md:px-8">
        
        <div class="mb-24">
            <div class="flex items-center justify-center gap-4 mb-16">
                <div class="h-[1px] w-12 bg-[#5881c8]/50"></div>
                <h2 class="text-center font-serif text-4xl font-bold text-[#023A73] tracking-wide">
                    Signature Drinks
                </h2>
                <div class="h-[1px] w-12 bg-[#5881c8]/50"></div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 md:gap-6 mx-auto w-full">

                @forelse($drinks as $menu)
                    <div class="bg-[#f5f7fd] relative rounded-t-full rounded-b-2xl overflow-hidden shadow-sm flex flex-col border border-[#5881c8]/60 transform hover:-translate-y-2 transition duration-300">
                        
                        {{-- Gambar --}}
                        <div class="h-52 w-full overflow-hidden">
                            <img src="{{ asset('storage/' . $menu->gambar) }}" 
                                alt="{{ $menu->nama_menu }}" 
                                class="w-full h-full object-cover">
                        </div>

                        {{-- Konten --}}
                        <div class="p-4 flex flex-col items-center text-center flex-grow pt-6">
                            <h3 class="font-serif text-lg font-bold text-[#023A73] mb-2">
                                {{ $menu->nama_menu }}
                            </h3>

                            <p class="text-[10px] text-[#55627a] mb-4 leading-relaxed font-light line-clamp-3">
                                {{ $menu->deskripsi }}
                            </p>

                            <button class="mt-auto px-4 py-1.5 border border-[#5881c8]/50 text-[#5881c8] hover:bg-[#5881c8] hover:text-white transition rounded-full text-[9px] font-bold tracking-widest uppercase">
                                Rp {{ number_format($menu->harga, 0, ',', '.') }}
                            </button>
                        </div>
                    </div>
                @empty
                    <p class="text-center col-span-full text-gray-500 text-sm">
                        Menu minuman belum tersedia
                    </p>
                @endforelse

            </div>
        </div>

        <div>
            <div class="flex items-center justify-center gap-4 mb-16">
                <div class="h-[1px] w-12 bg-[#5881c8]/50"></div>
                <h2 class="text-center font-serif text-4xl font-bold text-[#023A73] tracking-wide">
                    Pastries & Bites
                </h2>
                <div class="h-[1px] w-12 bg-[#5881c8]/50"></div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 md:gap-6 mx-auto w-full">
                
                @forelse($foods as $menu)
                    <div class="bg-[#f5f7fd] relative rounded-t-full rounded-b-2xl overflow-hidden shadow-sm flex flex-col border border-[#5881c8]/60 transform hover:-translate-y-2 transition duration-300">
                        
                        <div class="h-52 w-full overflow-hidden">
                            <img src="{{ asset('storage/' . $menu->gambar) }}" 
                                alt="{{ $menu->nama_menu }}" 
                                class="w-full h-full object-cover">
                        </div>

                        <div class="p-4 flex flex-col items-center text-center flex-grow pt-6">
                            <h3 class="font-serif text-lg font-bold text-[#023A73] mb-2">
                                {{ $menu->nama_menu }}
                            </h3>

                            <p class="text-[10px] text-[#55627a] mb-4 leading-relaxed font-light line-clamp-3">
                                {{ $menu->deskripsi }}
                            </p>

                            <button class="mt-auto px-4 py-1.5 border border-[#5881c8]/50 text-[#5881c8] hover:bg-[#5881c8] hover:text-white transition rounded-full text-[9px] font-bold tracking-widest uppercase">
                                Rp {{ number_format($menu->harga, 0, ',', '.') }}
                            </button>
                        </div>
                    </div>

                @empty
                    <p class="text-center col-span-full text-gray-500 text-sm">
                        Menu makanan belum tersedia
                    </p>
                @endforelse

            </div>
        </div>

    </div>
</section>

@endsection