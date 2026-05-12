@extends('layouts.app')

@section('content')

{{-- HERO --}}
<section class="relative pt-32 pb-20 bg-[#d6e5f3] text-center overflow-hidden">
    <div class="absolute top-0 left-0 w-72 h-72 bg-[#E8DFD1] rounded-full blur-3xl opacity-50 -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-[#E8DFD1] rounded-full blur-3xl opacity-50 translate-x-1/3 translate-y-1/3"></div>

    <div class="relative z-10 max-w-3xl mx-auto px-6">
        <span class="text-[#5881c8] uppercase tracking-[0.3em] text-xs font-bold">Our Gallery</span>
        <h1 class="font-serif text-5xl md:text-6xl font-bold text-[#023A73] mt-4 mb-4">
            Coffee Moments
        </h1>
        <p class="text-gray-600 text-sm md:text-base">
            Lihat suasana, menu, dan pengalaman terbaik dari coffee shop kami.
        </p>
    </div>
</section>

{{-- FILTER (Diubah menjadi Link <a> agar memproses data di server) --}}
<section class="bg-white pt-10">
    <div class="flex justify-center gap-4 flex-wrap text-xs uppercase tracking-widest">
        
        @php $kategoriAktif = request('kategori', 'all'); @endphp

        <a href="{{ route('gallery', ['kategori' => 'all']) }}" 
           class="px-4 py-2 rounded-full transition border border-[#5881c8] {{ $kategoriAktif == 'all' ? 'bg-[#5881c8] text-white' : 'bg-transparent text-[#5881c8] hover:bg-[#5881c8] hover:text-white' }}">
           All
        </a>
        <a href="{{ route('gallery', ['kategori' => 'drink']) }}" 
           class="px-4 py-2 rounded-full transition border border-[#5881c8] {{ $kategoriAktif == 'drink' ? 'bg-[#5881c8] text-white' : 'bg-transparent text-[#5881c8] hover:bg-[#5881c8] hover:text-white' }}">
           Drink
        </a>
        <a href="{{ route('gallery', ['kategori' => 'food']) }}" 
           class="px-4 py-2 rounded-full transition border border-[#5881c8] {{ $kategoriAktif == 'food' ? 'bg-[#5881c8] text-white' : 'bg-transparent text-[#5881c8] hover:bg-[#5881c8] hover:text-white' }}">
           Food
        </a>
        <a href="{{ route('gallery', ['kategori' => 'interior']) }}" 
           class="px-4 py-2 rounded-full transition border border-[#5881c8] {{ $kategoriAktif == 'interior' ? 'bg-[#5881c8] text-white' : 'bg-transparent text-[#5881c8] hover:bg-[#5881c8] hover:text-white' }}">
           Interior
        </a>
    </div>
</section>

{{-- GALLERY GRID --}}
<section class="py-16 bg-white min-h-[40vh]">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse($galleries as $foto)
                <div class="relative overflow-hidden rounded-xl group transition-all duration-500 ease-in-out">
                    <img src="{{ asset('storage/' . $foto->image_path) }}"
                         alt="{{ $foto->nama_gambar }}"
                         class="w-full h-60 object-cover group-hover:scale-110 transition duration-500">
                    
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center p-4 text-center">
                        <span class="text-white text-sm uppercase tracking-widest line-clamp-2">{{ $foto->nama_gambar }}</span>
                    </div>
                </div>
            @empty
                <div class="col-span-full flex flex-col items-center justify-center py-16 text-gray-400">
                    <i class="fa-solid fa-camera text-4xl mb-3 opacity-30"></i>
                    <p class="text-sm font-medium">Belum ada foto untuk kategori ini.</p>
                </div>
            @endforelse
        </div>

        {{-- PAGINASI LARAVEL (Akan muncul otomatis jika foto > 12) --}}
        <div class="mt-12 flex justify-center">
            {{ $galleries->appends(request()->query())->links() }}
        </div>

    </div>
</section>

@endsection