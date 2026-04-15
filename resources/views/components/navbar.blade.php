<header class="sticky top-0 z-50 w-full shadow-sm bg-[#ffffff]">
    <nav class="py-3 px-6 md:px-12 flex justify-between items-center relative z-20 bg-[#ffffff]">
        
        <a href="{{ route('home') }}" class="flex flex-col items-center font-['Rajdhani'] text-[#023A73] hover:opacity-90 transition duration-300 z-30">
            <span class="text-4xl md:text-[2.5rem] font-bold leading-[0.8] tracking-wide">sleko</span>
            <span class="text-[10px] md:text-[11px] font-medium tracking-[0.13em] -mt-1">kopi rumahan</span>
        </a>

        <ul class="hidden md:flex space-x-8 text-sm items-center">
            <li>
                <a href="{{ route('home') }}" class="relative inline-block text-[#023A73] hover:text-[#005bb5] transition-all duration-300 ease-out transform hover:-translate-y-[1px]
                    after:absolute after:-bottom-1.5 after:left-1/2 after:-translate-x-1/2 after:h-[2.5px] after:bg-[#005bb5] after:rounded-full after:transition-all after:duration-300 after:ease-out
                    {{ request()->routeIs('home') ? 'font-bold after:w-full' : 'font-medium after:w-0 hover:after:w-full' }}">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('about') }}" class="relative inline-block text-[#023A73] hover:text-[#005bb5] transition-all duration-300 ease-out transform hover:-translate-y-[1px]
                    after:absolute after:-bottom-1.5 after:left-1/2 after:-translate-x-1/2 after:h-[2.5px] after:bg-[#005bb5] after:rounded-full after:transition-all after:duration-300 after:ease-out
                    {{ request()->routeIs('about') ? 'font-bold after:w-full' : 'font-medium after:w-0 hover:after:w-full' }}">
                    About
                </a>
            </li>
            <li>
                <a href="{{ route('menu') }}" class="relative inline-block text-[#023A73] hover:text-[#005bb5] transition-all duration-300 ease-out transform hover:-translate-y-[1px]
                    after:absolute after:-bottom-1.5 after:left-1/2 after:-translate-x-1/2 after:h-[2.5px] after:bg-[#005bb5] after:rounded-full after:transition-all after:duration-300 after:ease-out
                    {{ request()->routeIs('menu') ? 'font-bold after:w-full' : 'font-medium after:w-0 hover:after:w-full' }}">
                    Menu
                </a>
            </li>
            <li>
                <a href="{{ route('gallery') }}" class="relative inline-block text-[#023A73] hover:text-[#005bb5] transition-all duration-300 ease-out transform hover:-translate-y-[1px]
                    after:absolute after:-bottom-1.5 after:left-1/2 after:-translate-x-1/2 after:h-[2.5px] after:bg-[#005bb5] after:rounded-full after:transition-all after:duration-300 after:ease-out
                    {{ request()->routeIs('gallery') ? 'font-bold after:w-full' : 'font-medium after:w-0 hover:after:w-full' }}">
                    Galeri
                </a>
            </li>
            <li>
                <a href="{{ route('contact') }}" class="relative inline-block text-[#023A73] hover:text-[#005bb5] transition-all duration-300 ease-out transform hover:-translate-y-[1px]
                    after:absolute after:-bottom-1.5 after:left-1/2 after:-translate-x-1/2 after:h-[2.5px] after:bg-[#005bb5] after:rounded-full after:transition-all after:duration-300 after:ease-out
                    {{ request()->routeIs('contact') ? 'font-bold after:w-full' : 'font-medium after:w-0 hover:after:w-full' }}">
                    Contact
                </a>
            </li>
        </ul>

        <div class="flex space-x-2 items-center z-30">
            
            <div class="relative flex items-center">
                <form id="search-form" action="#" class="absolute right-full mr-1 overflow-hidden transition-all duration-500 ease-in-out w-0 opacity-0 pointer-events-none flex items-center">
                    <input type="text" placeholder="Cari menu..." class="w-full bg-[#f4f7f6] text-[#023A73] text-sm rounded-full py-2 px-4 border border-transparent focus:bg-white focus:border-[#023A73]/30 focus:outline-none focus:ring-2 focus:ring-[#005bb5]/20 shadow-inner transition-colors">
                </form>

                <button type="button" id="search-btn" class="text-[#023A73] p-2 rounded-full hover:bg-[#023A73]/10 hover:text-[#005bb5] transform hover:scale-110 hover:shadow-md transition-all duration-300 ease-out active:scale-95 bg-white relative z-10">
                    <i id="search-icon" class="fa-solid fa-magnifying-glass text-lg transition-transform duration-300"></i>
                </button>
            </div>

            <button id="menu-btn" class="md:hidden text-[#023A73] p-2 rounded-full hover:bg-[#023A73]/10 hover:text-[#005bb5] transform hover:scale-110 hover:shadow-md transition-all duration-300 ease-out active:scale-95 bg-white relative z-10">
                <i id="menu-icon" class="fa-solid fa-bars text-xl transition-transform duration-300"></i>
            </button>
        </div>
    </nav>

    <div id="mobile-menu" class="md:hidden absolute top-full left-0 w-full bg-[#ffffff] shadow-lg border-t border-gray-100 overflow-hidden max-h-0 opacity-0 transition-all duration-500 ease-in-out z-10">
        <ul class="flex flex-col px-4 py-4 space-y-2 text-sm">
            <li>
                <a href="{{ route('home') }}" class="block w-full px-4 py-3 text-[#023A73] hover:bg-[#023A73]/5 hover:text-[#005bb5] hover:pl-6 hover:border-l-4 hover:border-[#005bb5] rounded-r-lg transition-all duration-300 {{ request()->routeIs('home') ? 'font-bold bg-[#023A73]/5 border-l-4 border-[#023A73] pl-6' : 'font-medium' }}">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('about') }}" class="block w-full px-4 py-3 text-[#023A73] hover:bg-[#023A73]/5 hover:text-[#005bb5] hover:pl-6 hover:border-l-4 hover:border-[#005bb5] rounded-r-lg transition-all duration-300 {{ request()->routeIs('about') ? 'font-bold bg-[#023A73]/5 border-l-4 border-[#023A73] pl-6' : 'font-medium' }}">
                    About
                </a>
            </li>
            <li>
                <a href="{{ route('menu') }}" class="block w-full px-4 py-3 text-[#023A73] hover:bg-[#023A73]/5 hover:text-[#005bb5] hover:pl-6 hover:border-l-4 hover:border-[#005bb5] rounded-r-lg transition-all duration-300 {{ request()->routeIs('menu') ? 'font-bold bg-[#023A73]/5 border-l-4 border-[#023A73] pl-6' : 'font-medium' }}">
                    Menu
                </a>
            </li>
            <li>
                <a href="{{ route('gallery') }}" class="block w-full px-4 py-3 text-[#023A73] hover:bg-[#023A73]/5 hover:text-[#005bb5] hover:pl-6 hover:border-l-4 hover:border-[#005bb5] rounded-r-lg transition-all duration-300 {{ request()->routeIs('gallery') ? 'font-bold bg-[#023A73]/5 border-l-4 border-[#023A73] pl-6' : 'font-medium' }}">
                    Galeri
                </a>
            </li>
            <li>
                <a href="{{ route('contact') }}" class="block w-full px-4 py-3 text-[#023A73] hover:bg-[#023A73]/5 hover:text-[#005bb5] hover:pl-6 hover:border-l-4 hover:border-[#005bb5] rounded-r-lg transition-all duration-300 {{ request()->routeIs('contact') ? 'font-bold bg-[#023A73]/5 border-l-4 border-[#023A73] pl-6' : 'font-medium' }}">
                    Contact
                </a>
            </li>
        </ul>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        
        // --- LOGIKA MOBILE MENU ---
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        let isMenuOpen = false;

        menuBtn.addEventListener('click', function () {
            isMenuOpen = !isMenuOpen;
            if (isMenuOpen) {
                mobileMenu.classList.remove('max-h-0', 'opacity-0');
                mobileMenu.classList.add('max-h-[400px]', 'opacity-100', 'pb-4');
                menuIcon.classList.remove('fa-bars');
                menuIcon.classList.add('fa-xmark');
                menuIcon.style.transform = 'rotate(180deg)';
            } else {
                mobileMenu.classList.remove('max-h-[400px]', 'opacity-100', 'pb-4');
                mobileMenu.classList.add('max-h-0', 'opacity-0');
                menuIcon.classList.remove('fa-xmark');
                menuIcon.classList.add('fa-bars');
                menuIcon.style.transform = 'rotate(0deg)';
            }
        });

        // --- LOGIKA SEARCH BAR ---
        const searchBtn = document.getElementById('search-btn');
        const searchForm = document.getElementById('search-form');
        const searchIcon = document.getElementById('search-icon');
        let isSearchOpen = false;

        searchBtn.addEventListener('click', function (e) {
            e.preventDefault();
            isSearchOpen = !isSearchOpen;

            if (isSearchOpen) {
                // Munculkan input search (Lebar dinamis: 160px di mobile, 250px di desktop)
                searchForm.classList.remove('w-0', 'opacity-0', 'pointer-events-none');
                searchForm.classList.add('w-[160px]', 'sm:w-[200px]', 'md:w-[250px]', 'opacity-100', 'pointer-events-auto');
                
                // Ubah ikon kaca pembesar menjadi X
                searchIcon.classList.remove('fa-magnifying-glass');
                searchIcon.classList.add('fa-xmark');
                searchIcon.style.transform = 'rotate(90deg)';
                
                // Focus otomatis ke dalam input
                setTimeout(() => searchForm.querySelector('input').focus(), 100);
            } else {
                // Sembunyikan input search
                searchForm.classList.remove('w-[160px]', 'sm:w-[200px]', 'md:w-[250px]', 'opacity-100', 'pointer-events-auto');
                searchForm.classList.add('w-0', 'opacity-0', 'pointer-events-none');
                
                // Kembalikan ikon
                searchIcon.classList.remove('fa-xmark');
                searchIcon.classList.add('fa-magnifying-glass');
                searchIcon.style.transform = 'rotate(0deg)';
            }
        });
    });
</script>