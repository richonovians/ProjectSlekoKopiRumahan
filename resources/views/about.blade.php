@extends('layouts.app')

@section('content')

<!-- HERO ABOUT -->
<section class="relative h-[60vh] flex items-center bg-cover bg-center" 
    style="background-image: url('https://images.unsplash.com/photo-1509042239860-f550ce710b93');">
    
    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative z-10 max-w-4xl mx-auto text-center text-white px-6">
        <h1 class="font-serif text-5xl md:text-6xl font-bold mb-4">
            About Our Coffee
        </h1>
        <p class="text-sm md:text-base opacity-90">
            Cerita di balik setiap cangkir kopi yang kami sajikan.
        </p>
    </div>
</section>

<!-- ABOUT STORY -->
<section class="py-24 bg-[#f5f7fd]">
    <div class="max-w-6xl mx-auto px-6 md:px-12 grid md:grid-cols-2 gap-12 items-center">

        <div>
            <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085" 
                class="rounded-2xl shadow-lg w-full" alt="Coffee Story">
        </div>

        <div>
            <h2 class="font-serif text-4xl font-bold text-[#023A73] mb-6">
                Our Story
            </h2>
            <p class="text-sm text-gray-600 leading-relaxed mb-4">
                Kami memulai perjalanan ini dari kecintaan terhadap kopi berkualitas tinggi. 
                Setiap biji kopi dipilih dengan teliti dari petani terbaik dan diproses 
                dengan teknik roasting modern untuk menghasilkan rasa yang sempurna.
            </p>
            <p class="text-sm text-gray-600 leading-relaxed">
                Dari espresso hingga latte, kami percaya bahwa kopi bukan sekadar minuman, 
                tetapi pengalaman yang membawa kehangatan dan inspirasi.
            </p>
        </div>

    </div>
</section>

<!-- WHY CHOOSE US -->
<section class="py-20 bg-[#d6e5f3]">
    <div class="max-w-7xl mx-auto px-6 md:px-12 text-center">

        <h2 class="font-serif text-4xl font-bold text-[#023A73] mb-12">
            Why Choose Us
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <div class="p-6 bg-white rounded-xl shadow-sm hover:shadow-lg transition">
                <i class="fa-solid fa-mug-hot text-3xl text-[#02356a] mb-4"></i>
                <h3 class="font-bold mb-2 text-[#023A73]">Premium Beans</h3>
                <p class="text-sm text-gray-500">
                    Kami hanya menggunakan biji kopi terbaik dengan kualitas premium.
                </p>
            </div>

            <div class="p-6 bg-white rounded-xl shadow-sm hover:shadow-lg transition">
                <i class="fa-solid fa-fire text-3xl text-[#02356a] mb-4"></i>
                <h3 class="font-bold mb-2 text-[#023A73]">Perfect Roasting</h3>
                <p class="text-sm text-gray-500">
                    Proses roasting yang presisi untuk menghasilkan rasa maksimal.
                </p>
            </div>

            <div class="p-6 bg-white rounded-xl shadow-sm hover:shadow-lg transition">
                <i class="fa-solid fa-heart text-3xl text-[#02356a] mb-4"></i>
                <h3 class="font-bold mb-2 text-[#023A73]">Made With Love</h3>
                <p class="text-sm text-gray-500">
                    Setiap minuman dibuat dengan sepenuh hati oleh barista kami.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- TEAM / BARISTA -->
<section class="py-24 bg-[#f5f7fd]">
    <div class="max-w-6xl mx-auto px-6 md:px-12 text-center">

        <h2 class="font-serif text-4xl font-bold text-[#023A73] mb-12">
            Meet Our Barista
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <div class="group">
                <img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e" 
                    class="rounded-xl mb-4 w-full h-72 object-cover">
                <h4 class="font-bold text-[#023A73]">John Doe</h4>
                <p class="text-sm text-gray-500">Head Barista</p>
            </div>

            <div class="group">
                <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2" 
                    class="rounded-xl mb-4 w-full h-72 object-cover">
                <h4 class="font-bold text-[#023A73]" >Jane Smith</h4>
                <p class="text-sm text-gray-500">Coffee Specialist</p>
            </div>

            <div class="group">
                <img src="https://images.unsplash.com/photo-1547425260-76bcadfb4f2c" 
                    class="rounded-xl mb-4 w-full h-72 object-cover">
                <h4 class="font-bold text-[#023A73]">Michael Lee</h4>
                <p class="text-sm text-gray-500">Roasting Expert</p>
            </div>

        </div>
    </div>
</section>

@endsection