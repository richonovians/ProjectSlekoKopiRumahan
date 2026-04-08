@extends('layouts.app')

@section('content')

    <section class="relative h-[80vh] flex items-center bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1497935586351-b67a49e012bf?auto=format&fit=crop&q=80');">
        <div class="absolute inset-0 bg-black/40"></div>
        
        <div class="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12">
            <div class="max-w-xl text-white">
                <h1 class="font-serif text-5xl md:text-7xl font-bold leading-tight mb-4 shadow-sm">
                    Brewed to <br> Perfection,
                </h1>
                <p class="text-sm md:text-base font-light mb-8 opacity-90 leading-relaxed max-w-md">
                    Rasakan pengalaman minum kopi terbaik dari biji pilihan. Nikmati setiap tegukan yang dibuat dengan sepenuh hati.
                </p>
                <a href="{{ route('menu') }}" class="inline-block bg-coffee-dark hover:bg-[#5881c8] text-white font-semibold py-3 px-8 rounded-md transition duration-300 uppercase tracking-widest text-xs">
                    See All Menu
                </a>
            </div>
        </div>
    </section>

    <section class="relative pt-24 pb-20 px-6 md:px-12 max-w-7xl mx-auto">
        
        <div class="absolute -top-24 left-6 md:left-24 z-20 flex flex-col items-center">
            <div class="bg-white p-2 rounded-full shadow-lg mb-[-20px] relative z-30">
                <div class="bg-coffee-dark rounded-full w-12 h-12 flex items-center justify-center text-white">
                    <i class="fa-solid fa-croissant text-xl"></i>
                </div>
            </div>
            <div class="bg-coffee-dark text-white rounded-full w-48 h-48 flex flex-col items-center justify-center text-center p-6 shadow-xl">
                <h3 class="font-serif text-2xl font-bold leading-tight mb-1">Get 1 Free <br> Croissant</h3>
                <p class="text-xs font-light italic opacity-80">Today Only</p>
            </div>
        </div>

        <div class="flex flex-col items-center justify-center pt-12 md:pt-4 mb-10 group cursor-pointer">
            <span class="text-[10px] font-bold uppercase tracking-[0.3em] text-coffee-primary mb-4 opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-4 group-hover:translate-y-0">
                Scroll to Explore
            </span>

            <div class="relative flex items-center justify-center w-16 h-16 rounded-full bg-white shadow-md border border-[#d2d9eb] group-hover:border-coffee-primary group-hover:bg-coffee-primary transition-all duration-500 animate-bounce group-hover:animate-none group-hover:scale-110">
                <i class="fa-solid fa-mug-hot text-2xl text-coffee-dark group-hover:text-white transition-all duration-500 group-hover:-rotate-12"></i>
                
                <i class="fa-solid fa-star absolute -top-1 right-0 text-[#5881c8] group-hover:text-yellow-300 text-[10px] opacity-0 group-hover:opacity-100 transition-all duration-500 delay-100 animate-pulse"></i>
                <i class="fa-solid fa-star absolute top-2 -left-2 text-[#5881c8] group-hover:text-yellow-300 text-[8px] opacity-0 group-hover:opacity-100 transition-all duration-500 delay-200 animate-pulse"></i>
            </div>
            
            <div class="h-[2px] w-8 bg-coffee-primary/30 mt-6 group-hover:w-24 transition-all duration-500 rounded-full"></div>
        </div>
        
        <div class="text-center mb-16 mt-4">
            <h2 class="font-serif text-4xl font-bold text-coffee-dark mb-4">Featured Drinks</h2>
            <p class="text-xs md:text-sm text-gray-500 max-w-2xl mx-auto font-light leading-relaxed">
                Cari tahu menu andalan kami yang diroasting dengan sempurna. Setiap cangkir menceritakan kisah dari kebun hingga ke tangan Anda.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center flex flex-col items-center group">
                <div class="w-full h-48 mb-4 overflow-hidden rounded-2xl">
                    <img src="https://images.unsplash.com/photo-1572119865084-43c285814d63?auto=format&fit=crop&w=400&q=80" alt="Espresso" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <h3 class="font-serif text-xl font-bold text-coffee-dark mb-2">Espresso Masterclass</h3>
                <p class="text-[10px] text-gray-500 mb-4 px-2 line-clamp-2">Kopi pekat dengan crema yang sempurna untuk mengawali hari Anda.</p>
                <a href="{{ route('menu') }}" class="w-full bg-coffee-dark hover:bg-[#5881c8] text-white text-xs font-semibold py-2.5 rounded-lg transition text-center block">
                    Lihat Menu Lengkap
                </a>
            </div>

            <div class="text-center flex flex-col items-center group">
                <div class="w-full h-48 mb-4 overflow-hidden rounded-2xl">
                    <img src="https://images.unsplash.com/photo-1541167760496-1628856ab772?auto=format&fit=crop&w=400&q=80" alt="Iced" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <h3 class="font-serif text-xl font-bold text-coffee-dark mb-2">Iced Favorites</h3>
                <p class="text-[10px] text-gray-500 mb-4 px-2 line-clamp-2">Kesegaran kopi dingin berpadu dengan susu premium yang lembut.</p>
                <a href="{{ route('menu') }}" class="w-full bg-coffee-dark hover:bg-[#5881c8] text-white text-xs font-semibold py-2.5 rounded-lg transition text-center block">
                    Lihat Menu Lengkap
                </a>
            </div>

            <div class="text-center flex flex-col items-center group">
                <div class="w-full h-48 mb-4 overflow-hidden rounded-2xl">
                    <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=400&q=80" alt="Latte" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <h3 class="font-serif text-xl font-bold text-coffee-dark mb-2">Coffee Favorites</h3>
                <p class="text-[10px] text-gray-500 mb-4 px-2 line-clamp-2">Pilihan klasik yang tidak pernah salah, dinikmati selagi hangat.</p>
                <a href="{{ route('menu') }}" class="w-full bg-coffee-dark hover:bg-[#5881c8] text-white text-xs font-semibold py-2.5 rounded-lg transition text-center block">
                    Lihat Menu Lengkap
                </a>
            </div>

            <div class="text-center flex flex-col items-center group">
                <div class="w-full h-48 mb-4 overflow-hidden rounded-2xl">
                    <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=400&q=80" alt="Organic" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <h3 class="font-serif text-xl font-bold text-coffee-dark mb-2">Organic Beans</h3>
                <p class="text-[10px] text-gray-500 mb-4 px-2 line-clamp-2">Biji kopi organik murni yang diproses secara alami dan ramah lingkungan.</p>
                <a href="{{ route('menu') }}" class="w-full bg-coffee-dark hover:bg-[#5881c8] text-white text-xs font-semibold py-2.5 rounded-lg transition text-center block">
                    Lihat Menu Lengkap
                </a>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 md:px-12 pb-24">
        <div class="rounded-2xl overflow-hidden shadow-lg flex flex-col md:flex-row bg-[#EBE1D2]">
            
            <div class="flex-1 flex">
                <img src="https://images.unsplash.com/photo-1572442388796-11668a67e53d?auto=format&fit=crop&w=300&q=80" alt="Coffee" class="w-1/3 object-cover h-48 md:h-auto border-r border-white/20">
                <img src="https://images.unsplash.com/photo-1461023058943-07fcbe16d735?auto=format&fit=crop&w=300&q=80" alt="Frappe" class="w-1/3 object-cover h-48 md:h-auto border-r border-white/20">
                <img src="https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&w=300&q=80" alt="Croissant" class="w-1/3 object-cover h-48 md:h-auto">
            </div>

            <div class="flex-1 p-8 md:p-10 flex flex-col justify-center bg-coffee-primary text-white">
                <h3 class="font-serif text-2xl md:text-3xl font-bold mb-2">Tertarik dengan Kopi Kami?</h3>
                <p class="text-xs font-light mb-6 opacity-90 leading-relaxed">
                    Kunjungi kedai kami atau hubungi tim kami untuk menanyakan ketersediaan menu, reservasi tempat, maupun pemesanan dalam jumlah besar (katering acara).
                </p>
                <div class="mt-auto">
                    <a href="{{ route('contact') }}" class="inline-block bg-coffee-dark hover:bg-[#0251a0] text-white text-xs font-semibold py-3 px-8 rounded transition uppercase tracking-widest">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection