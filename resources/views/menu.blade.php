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
                
                <div class="bg-[#f5f7fd] relative rounded-t-full rounded-b-2xl overflow-hidden shadow-sm flex flex-col border border-[#5881c8]/60 transform hover:-translate-y-2 transition duration-300">
                    <div class="absolute top-4 right-4 z-10 bg-[#5881c8] text-white text-[8px] font-bold uppercase tracking-wider py-1 px-2 rounded-full shadow-md">
                        Best Seller
                    </div>
                    <div class="h-52 w-full overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1541167760496-1628856ab772?auto=format&fit=crop&w=600&q=80" alt="Latte Artisan" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 flex flex-col items-center text-center flex-grow pt-6">
                        <h3 class="font-serif text-lg font-bold text-[#023A73] mb-2">Latte Artisan</h3>
                        <p class="text-[10px] text-[#55627a] mb-4 leading-relaxed font-light line-clamp-3">
                            Perpaduan espresso premium dengan susu steamed yang lembut, menghasilkan rasa manis alami dengan art yang indah.
                        </p>
                        <button class="mt-auto px-4 py-1.5 border border-[#5881c8]/50 text-[#5881c8] hover:bg-[#5881c8] hover:text-white transition rounded-full text-[9px] font-bold tracking-widest uppercase">
                            Rp 35.000
                        </button>
                    </div>
                </div>

                <div class="bg-[#f5f7fd] relative rounded-t-full rounded-b-2xl overflow-hidden shadow-sm flex flex-col border border-[#5881c8]/60 transform hover:-translate-y-2 transition duration-300">
                    <div class="h-52 w-full overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1559525839-b184a4d698c7?auto=format&fit=crop&w=600&q=80" alt="Vanilla Macchiato" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 flex flex-col items-center text-center flex-grow pt-6">
                        <h3 class="font-serif text-lg font-bold text-[#023A73] mb-2">Vanilla Macchiato</h3>
                        <p class="text-[10px] text-[#55627a] mb-4 leading-relaxed font-light line-clamp-3">
                            Kombinasi sempurna antara espresso, sirup vanilla asli, dan busa susu yang tebal untuk menemani waktu santai.
                        </p>
                        <button class="mt-auto px-4 py-1.5 border border-[#5881c8]/50 text-[#5881c8] hover:bg-[#5881c8] hover:text-white transition rounded-full text-[9px] font-bold tracking-widest uppercase">
                            Rp 32.000
                        </button>
                    </div>
                </div>

                <div class="bg-[#f5f7fd] relative rounded-t-full rounded-b-2xl overflow-hidden shadow-sm flex flex-col border border-[#5881c8]/60 transform hover:-translate-y-2 transition duration-300">
                    <div class="absolute top-4 right-4 z-10 bg-[#5881c8] text-white text-[8px] font-bold uppercase tracking-wider py-1 px-2 rounded-full shadow-md">
                        Best Seller
                    </div>
                    <div class="h-52 w-full overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1572119865084-43c285814d63?auto=format&fit=crop&w=600&q=80" alt="Espresso Shot" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 flex flex-col items-center text-center flex-grow pt-6">
                        <h3 class="font-serif text-lg font-bold text-[#023A73] mb-2">Espresso Shot</h3>
                        <p class="text-[10px] text-[#55627a] mb-4 leading-relaxed font-light line-clamp-3">
                            Espresso klasik dengan krema tebal, pekat, dan aroma kuat khas biji kopi pilihan terbaik dari barista kami.
                        </p>
                        <button class="mt-auto px-4 py-1.5 border border-[#5881c8]/50 text-[#5881c8] hover:bg-[#5881c8] hover:text-white transition rounded-full text-[9px] font-bold tracking-widest uppercase">
                            Rp 22.000
                        </button>
                    </div>
                </div>

                <div class="bg-[#f5f7fd] relative rounded-t-full rounded-b-2xl overflow-hidden shadow-sm flex flex-col border border-[#5881c8]/60 transform hover:-translate-y-2 transition duration-300">
                    <div class="h-52 w-full overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1461023058943-07fcbe16d735?auto=format&fit=crop&w=600&q=80" alt="Iced Caramel" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 flex flex-col items-center text-center flex-grow pt-6">
                        <h3 class="font-serif text-lg font-bold text-[#023A73] mb-2">Iced Caramel</h3>
                        <p class="text-[10px] text-[#55627a] mb-4 leading-relaxed font-light line-clamp-3">
                            Kopi susu dingin dengan sentuhan saus karamel lezat yang memberikan kesegaran di siang hari.
                        </p>
                        <button class="mt-auto px-4 py-1.5 border border-[#5881c8]/50 text-[#5881c8] hover:bg-[#5881c8] hover:text-white transition rounded-full text-[9px] font-bold tracking-widest uppercase">
                            Rp 38.000
                        </button>
                    </div>
                </div>

                <div class="bg-[#f5f7fd] relative rounded-t-full rounded-b-2xl overflow-hidden shadow-sm flex flex-col border border-[#5881c8]/60 transform hover:-translate-y-2 transition duration-300">
                    <div class="h-52 w-full overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?auto=format&fit=crop&w=600&q=80" alt="Mocha Frappe" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 flex flex-col items-center text-center flex-grow pt-6">
                        <h3 class="font-serif text-lg font-bold text-[#023A73] mb-2">Mocha Frappe</h3>
                        <p class="text-[10px] text-[#55627a] mb-4 leading-relaxed font-light line-clamp-3">
                            Paduan kopi dan cokelat yang diblend bersama es batu, diakhiri dengan whipped cream dan taburan cokelat.
                        </p>
                        <button class="mt-auto px-4 py-1.5 border border-[#5881c8]/50 text-[#5881c8] hover:bg-[#5881c8] hover:text-white transition rounded-full text-[9px] font-bold tracking-widest uppercase">
                            Rp 40.000
                        </button>
                    </div>
                </div>

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
                
                <div class="bg-[#f5f7fd] relative rounded-t-full rounded-b-2xl overflow-hidden shadow-sm flex flex-col border border-[#5881c8]/60 transform hover:-translate-y-2 transition duration-300">
                    <div class="absolute top-4 right-4 z-10 bg-[#5881c8] text-white text-[8px] font-bold uppercase tracking-wider py-1 px-2 rounded-full shadow-md">
                        Best Seller
                    </div>
                    <div class="h-52 w-full overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1509365465985-25d11c17e812?auto=format&fit=crop&w=600&q=80" alt="Butter Croissant" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 flex flex-col items-center text-center flex-grow pt-6">
                        <h3 class="font-serif text-lg font-bold text-[#023A73] mb-2">Butter Croissant</h3>
                        <p class="text-[10px] text-[#55627a] mb-4 leading-relaxed font-light line-clamp-3">
                            Croissant klasik bergaya Prancis dengan tekstur flaky di luar dan lapisan mentega lembut di dalam.
                        </p>
                        <button class="mt-auto px-4 py-1.5 border border-[#5881c8]/50 text-[#5881c8] hover:bg-[#5881c8] hover:text-white transition rounded-full text-[9px] font-bold tracking-widest uppercase">
                            Rp 25.000
                        </button>
                    </div>
                </div>

                <div class="bg-[#f5f7fd] relative rounded-t-full rounded-b-2xl overflow-hidden shadow-sm flex flex-col border border-[#5881c8]/60 transform hover:-translate-y-2 transition duration-300">
                    <div class="h-52 w-full overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1509365465985-25d11c17e812?auto=format&fit=crop&w=600&q=80" alt="Avocado Toast" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 flex flex-col items-center text-center flex-grow pt-6">
                        <h3 class="font-serif text-lg font-bold text-[#023A73] mb-2">Avocado Toast</h3>
                        <p class="text-[10px] text-[#55627a] mb-4 leading-relaxed font-light line-clamp-3">
                            Roti sourdough panggang dengan alpukat segar, taburan biji wijen, dan siraman olive oil untuk sarapan sehat.
                        </p>
                        <button class="mt-auto px-4 py-1.5 border border-[#5881c8]/50 text-[#5881c8] hover:bg-[#5881c8] hover:text-white transition rounded-full text-[9px] font-bold tracking-widest uppercase">
                            Rp 45.000
                        </button>
                    </div>
                </div>

                <div class="bg-[#f5f7fd] relative rounded-t-full rounded-b-2xl overflow-hidden shadow-sm flex flex-col border border-[#5881c8]/60 transform hover:-translate-y-2 transition duration-300">
                    <div class="h-52 w-full overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1509365465985-25d11c17e812?auto=format&fit=crop&w=600&q=80" alt="Choco Brownie" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 flex flex-col items-center text-center flex-grow pt-6">
                        <h3 class="font-serif text-lg font-bold text-[#023A73] mb-2">Choco Brownie</h3>
                        <p class="text-[10px] text-[#55627a] mb-4 leading-relaxed font-light line-clamp-3">
                            Brownies cokelat fudge yang pekat, cocok untuk Anda yang menyukai rasa manis dan tekstur lembut.
                        </p>
                        <button class="mt-auto px-4 py-1.5 border border-[#5881c8]/50 text-[#5881c8] hover:bg-[#5881c8] hover:text-white transition rounded-full text-[9px] font-bold tracking-widest uppercase">
                            Rp 28.000
                        </button>
                    </div>
                </div>

                <div class="bg-[#f5f7fd] relative rounded-t-full rounded-b-2xl overflow-hidden shadow-sm flex flex-col border border-[#5881c8]/60 transform hover:-translate-y-2 transition duration-300">
                    <div class="h-52 w-full overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1612203985729-70726954388c?auto=format&fit=crop&w=600&q=80" alt="Almond Danish" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 flex flex-col items-center text-center flex-grow pt-6">
                        <h3 class="font-serif text-lg font-bold text-[#023A73] mb-2">Almond Danish</h3>
                        <p class="text-[10px] text-[#55627a] mb-4 leading-relaxed font-light line-clamp-3">
                            Pastry manis dengan isian krim almond yang gurih dan taburan kacang almond panggang di atasnya.
                        </p>
                        <button class="mt-auto px-4 py-1.5 border border-[#5881c8]/50 text-[#5881c8] hover:bg-[#5881c8] hover:text-white transition rounded-full text-[9px] font-bold tracking-widest uppercase">
                            Rp 32.000
                        </button>
                    </div>
                </div>

                <div class="bg-[#f5f7fd] relative rounded-t-full rounded-b-2xl overflow-hidden shadow-sm flex flex-col border border-[#5881c8]/60 transform hover:-translate-y-2 transition duration-300">
                    <div class="h-52 w-full overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1550617931-e17a7b70dce2?auto=format&fit=crop&w=600&q=80" alt="Cupcake Vanilla" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 flex flex-col items-center text-center flex-grow pt-6">
                        <h3 class="font-serif text-lg font-bold text-[#023A73] mb-2">Vanilla Cupcake</h3>
                        <p class="text-[10px] text-[#55627a] mb-4 leading-relaxed font-light line-clamp-3">
                            Kue cangkir mungil dengan topping krim vanilla yang sangat lembut dan lumer saat digigit.
                        </p>
                        <button class="mt-auto px-4 py-1.5 border border-[#5881c8]/50 text-[#5881c8] hover:bg-[#5881c8] hover:text-white transition rounded-full text-[9px] font-bold tracking-widest uppercase">
                            Rp 20.000
                        </button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection