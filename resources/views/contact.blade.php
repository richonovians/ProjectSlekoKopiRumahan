@extends('layouts.app')

@section('content')

{{-- HERO --}}
<section class="relative pt-32 pb-20 bg-[#d6e5f3] text-center overflow-hidden">
    <div class="absolute top-0 left-0 w-72 h-72 bg-[#E8DFD1] rounded-full blur-3xl opacity-50 -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-[#E8DFD1] rounded-full blur-3xl opacity-50 translate-x-1/3 translate-y-1/3"></div>

    <div class="relative z-10 max-w-3xl mx-auto px-6">
        <span class="text-[#5881c8] uppercase tracking-[0.3em] text-xs font-bold">Contact Us</span>
        <h1 class="font-serif text-5xl md:text-6xl font-bold text-[#023A73] mt-4 mb-4">
            Let’s Talk Coffee
        </h1>
        <p class="text-gray-600 text-sm md:text-base">
            Punya pertanyaan, reservasi, atau ingin bekerja sama? Hubungi kami kapan saja.
        </p>
    </div>
</section>

{{-- CONTACT --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12">

        {{-- LEFT INFO --}}
        <div class="bg-[#02356a] text-white rounded-2xl p-10 shadow-xl flex flex-col justify-between relative overflow-hidden">
            
            <div class="z-10 relative">
                <h2 class="text-2xl font-bold mb-6 font-serif">Informasi Kontak</h2>

                <div class="space-y-6 text-sm">
                    <div class="flex items-start gap-4">
                        <i class="fa-solid fa-phone text-[#5881c8] mt-1"></i>
                        <span>0812-1111-8456</span>
                    </div>

                    <div class="flex items-start gap-4">
                        <i class="fa-solid fa-envelope text-[#5881c8] mt-1"></i>
                        <span>slekokopirumahan@gmail.com</span>
                    </div>

                    <div class="flex items-start gap-4">
                        <i class="fa-solid fa-location-dot text-[#5881c8] mt-1"></i>
                        <span>
                            Jl. Serayu Barat No. 44 <br>
                            Madiun, Jawa Timur
                        </span>
                    </div>
                </div>

                {{-- SOCIAL --}}
                <div class="flex gap-4 mt-10">
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-[#C88A58] transition">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-[#C88A58] transition">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-[#C88A58] transition">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                </div>
            </div>

            {{-- DECOR --}}
            <div class="absolute -bottom-20 -right-20 w-72 h-72 bg-white/10 rounded-full"></div>
        </div>

        {{-- FORM --}}
        <div class="bg-[#d6e5f3] p-10 rounded-2xl shadow-md">
            <h2 class="text-2xl font-bold text-[#023A73] mb-6 font-serif">
                Kirim Pesan
            </h2>

            <form class="space-y-5">
                @csrf

                <div>
                    <input type="text" placeholder="Nama"
                        class="w-full px-4 py-3 rounded-lg border border-[#5881c8] focus:ring-2 focus:ring-[#5881c8]/40 outline-none bg-white">
                </div>

                <div>
                    <input type="email" placeholder="Email"
                        class="w-full px-4 py-3 rounded-lg border border-[#5881c8] focus:ring-2 focus:ring-[#5881c8]/40 outline-none bg-white">
                </div>

                <div>
                    <input type="tel" placeholder="No HP"
                        class="w-full px-4 py-3 rounded-lg border border-[#5881c8] focus:ring-2 focus:ring-[#5881c8]/40 outline-none bg-white">
                </div>

                <div>
                    <textarea rows="5" placeholder="Pesan"
                        class="w-full px-4 py-3 rounded-lg border border-[#5881c8] focus:ring-2 focus:ring-[#5881c8]/40 outline-none bg-white"></textarea>
                </div>

                <button type="submit"
                    class="w-full bg-[#023A73] hover:bg-[#5881c8] text-white font-semibold py-3 rounded-lg transition">
                    Kirim Pesan
                </button>
            </form>
        </div>

    </div>
</section>

{{-- MAP --}}
<section class="pb-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-12">
            <h2 class="font-serif text-3xl md:text-4xl font-bold text-[#023A73] mb-2">
                Find Us Here
            </h2>
            <p class="text-sm text-gray-500">
                Datang dan rasakan langsung suasana coffee shop kami ☕
            </p>
        </div>

        <div class="relative rounded-3xl overflow-hidden shadow-2xl group">

            {{-- GOOGLE MAPS --}}
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3768.9848260238973!2d111.5206085!3d-7.6460285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79bf3c7560a279%3A0x1d5780d906e6e3ba!2sSleko%20Kopi%20Rumahan!5e1!3m2!1sid!2sid!4v1775497895926!5m2!1sid!2sid"
                class="w-full h-[400px] border-0 transition duration-500 group-hover:scale-[1.02]"
                allowfullscreen="" 
                loading="lazy">
            </iframe>

            {{-- OVERLAY GELAP HALUS --}}
            <div class="absolute inset-0 bg-black/10 group-hover:bg-black/20 transition duration-500 pointer-events-none"></div>

            {{-- INFO CARD --}}
            <div class="absolute bottom-6 left-6 bg-white/90 backdrop-blur-md p-5 rounded-xl shadow-xl max-w-xs transform group-hover:translate-y-[-5px] transition duration-500">
                
                <h3 class="font-serif text-lg font-bold text-[#023A73] mb-1">
                    Sleko Kopi Rumahan
                </h3>

                <p class="text-xs text-gray-600 mb-3 leading-relaxed">
                    Jl. Serayu Barat No. 44 <br>
                    Madiun, Jawa Timur
                </p>

                <a href="https://maps.app.goo.gl/AvmUerJgcy4EvxGY7" target="_blank"
                   class="inline-block text-xs bg-[#5881c8] hover:bg-[#4a67b5] text-white px-4 py-2 rounded-full transition shadow">
                    View on Google Maps
                </a>

            </div>

        </div>

    </div>
</section>

<script>
function initMap() {
    const location = { lat: -7.6298, lng: 111.5239 }; // Madiun (ubah sesuai lokasi kamu)

    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,
        center: location,

        // STYLE BIAR ESTETIK (coffee theme)
        styles: [
            {
                "featureType": "all",
                "elementType": "geometry",
                "stylers": [{ "color": "#ebe3cd" }]
            },
            {
                "featureType": "road",
                "elementType": "geometry",
                "stylers": [{ "color": "#c5a880" }]
            },
            {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [{ "color": "#aadaff" }]
            }
        ]
    });

    // CUSTOM MARKER
    const marker = new google.maps.Marker({
        position: location,
        map: map,
        title: "slekokopirumahan ☕",
        animation: google.maps.Animation.DROP
    });

    // INFO WINDOW
    const infoWindow = new google.maps.InfoWindow({
        content: `
            <div style="font-family: sans-serif; padding:5px">
                <strong>slekokopirumahan ☕</strong><br>
                Madiun, Jawa Timur
            </div>
        `
    });

    marker.addListener("click", () => {
        infoWindow.open(map, marker);
    });
}
</script>

@endsection