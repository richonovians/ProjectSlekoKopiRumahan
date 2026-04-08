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

{{-- FILTER --}}
<section class="bg-white pt-10">
    <div class="flex justify-center gap-4 flex-wrap text-xs uppercase tracking-widest" id="filter-container">
        <button data-filter="all" class="filter-btn px-4 py-2 bg-[#5881c8] text-white border border-[#5881c8] rounded-full transition">All</button>
        <button data-filter="drink" class="filter-btn px-4 py-2 bg-transparent text-[#5881c8] border border-[#5881c8] rounded-full hover:bg-[#5881c8] hover:text-white transition">Drink</button>
        <button data-filter="food" class="filter-btn px-4 py-2 bg-transparent text-[#5881c8] border border-[#5881c8] rounded-full hover:bg-[#5881c8] hover:text-white transition">Food</button>
        <button data-filter="interior" class="filter-btn px-4 py-2 bg-transparent text-[#5881c8] border border-[#5881c8] rounded-full hover:bg-[#5881c8] hover:text-white transition">Interior</button>
    </div>
</section>

{{-- GALLERY GRID --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" id="gallery-grid">

        {{-- DRINK --}}
        <div class="gallery-item relative overflow-hidden rounded-xl group transition-all duration-500 ease-in-out" data-category="drink">
            <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=600&q=80"
                 class="w-full h-60 object-cover group-hover:scale-110 transition duration-500">
            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                <span class="text-white text-sm uppercase tracking-widest">Coffee</span>
            </div>
        </div>

        {{-- INTERIOR --}}
        <div class="gallery-item relative overflow-hidden rounded-xl group transition-all duration-500 ease-in-out" data-category="interior">
            <img src="https://images.unsplash.com/photo-1511920170033-f8396924c348?auto=format&fit=crop&w=600&q=80"
                 class="w-full h-60 object-cover group-hover:scale-110 transition duration-500">
            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                <span class="text-white text-sm uppercase tracking-widest">Cafe</span>
            </div>
        </div>

        {{-- INTERIOR --}}
        <div class="gallery-item relative overflow-hidden rounded-xl group transition-all duration-500 ease-in-out" data-category="interior">
            <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=600&q=80"
                 class="w-full h-60 object-cover group-hover:scale-110 transition duration-500">
            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                <span class="text-white text-sm uppercase tracking-widest">Interior</span>
            </div>
        </div>

        {{-- DRINK --}}
        <div class="gallery-item relative overflow-hidden rounded-xl group transition-all duration-500 ease-in-out" data-category="drink">
            <img src="https://images.unsplash.com/photo-1461023058943-07fcbe16d735?auto=format&fit=crop&w=600&q=80"
                 class="w-full h-60 object-cover group-hover:scale-110 transition duration-500">
            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                <span class="text-white text-sm uppercase tracking-widest">Latte</span>
            </div>
        </div>

        {{-- FOOD --}}
        <div class="gallery-item relative overflow-hidden rounded-xl group transition-all duration-500 ease-in-out" data-category="food">
            <img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=600&q=80"
                 class="w-full h-60 object-cover group-hover:scale-110 transition duration-500">
            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                <span class="text-white text-sm uppercase tracking-widest">Pastry</span>
            </div>
        </div>

        {{-- INTERIOR --}}
        <div class="gallery-item relative overflow-hidden rounded-xl group transition-all duration-500 ease-in-out" data-category="interior">
            <img src="https://images.unsplash.com/photo-1521017432531-fbd92d768814?auto=format&fit=crop&w=600&q=80"
                 class="w-full h-60 object-cover group-hover:scale-110 transition duration-500">
            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                <span class="text-white text-sm uppercase tracking-widest">Barista</span>
            </div>
        </div>

        {{-- DRINK --}}
        <div class="gallery-item relative overflow-hidden rounded-xl group transition-all duration-500 ease-in-out" data-category="drink">
            <img src="https://images.unsplash.com/photo-1572119865084-43c285814d63?auto=format&fit=crop&w=600&q=80"
                 class="w-full h-60 object-cover group-hover:scale-110 transition duration-500">
            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                <span class="text-white text-sm uppercase tracking-widest">Espresso</span>
            </div>
        </div>

        {{-- DRINK --}}
        <div class="gallery-item relative overflow-hidden rounded-xl group transition-all duration-500 ease-in-out" data-category="drink">
            <img src="https://images.unsplash.com/photo-1541167760496-1628856ab772?auto=format&fit=crop&w=600&q=80"
                 class="w-full h-60 object-cover group-hover:scale-110 transition duration-500">
            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                <span class="text-white text-sm uppercase tracking-widest">Iced Coffee</span>
            </div>
        </div>

    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const galleryItems = document.querySelectorAll('.gallery-item');

        filterButtons.forEach(button => {
            button.addEventListener('click', function () {
                
                // 1. Ubah styling tombol yang sedang aktif
                filterButtons.forEach(btn => {
                    btn.classList.remove('bg-[#5881c8]', 'text-white');
                    btn.classList.add('bg-transparent', 'text-[#5881c8]');
                });
                
                // 2. Beri styling aktif pada tombol yang diklik
                this.classList.remove('bg-transparent', 'text-[#5881c8]');
                this.classList.add('bg-[#5881c8]', 'text-white');

                // 3. Ambil data kategori filter yang diklik
                const filterValue = this.getAttribute('data-filter');

                // 4. Sembunyikan atau tampilkan gambar berdasarkan kategori
                galleryItems.forEach(item => {
                    if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                });
            });
        });
    });
</script>

@endsection