<header class="h-20 bg-white shadow-sm flex items-center justify-between px-4 md:px-8 z-20 flex-shrink-0 relative">
    
    <div class="flex items-center">
        <button id="mobile-menu-btn" class="md:hidden text-gray-500 hover:text-coffee-dark mr-3 p-2 rounded-md transition focus:outline-none">
            <i class="fa-solid fa-bars text-xl"></i>
        </button>
        <h1 class="text-lg md:text-xl font-bold text-coffee-dark truncate max-w-[150px] md:max-w-none">@yield('page_title', 'Overview')</h1>
    </div>

    <div class="flex items-center space-x-4 md:space-x-6">
        <button class="relative text-gray-400 hover:text-coffee-primary transition p-1.5 md:p-2">
            <i class="fa-regular fa-bell text-xl"></i>
            <span class="absolute top-0 right-0 flex h-2.5 w-2.5">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-red-500 border-2 border-white"></span>
            </span>
        </button>

        <a href="{{ route('admin.profile') }}" class="flex items-center cursor-pointer hover:bg-gray-50 py-2 px-2 md:px-3 rounded-lg transition border border-transparent hover:border-gray-100 group">
            <img src="https://ui-avatars.com/api/?name=Super+Admin&background=023A73&color=fff" alt="Admin" class="h-8 w-8 md:h-9 md:w-9 rounded-full object-cover shadow-sm border border-gray-100">
            <div class="ml-3 hidden md:block text-left">
                <p class="text-xs font-bold text-coffee-dark">Super Admin</p>
                <p class="text-[10px] text-gray-500">Administrator</p>
            </div>
            <i class="fa-solid fa-chevron-right ml-4 text-xs text-gray-400 hidden md:block group-hover:translate-x-1 transition-transform"></i>
        </a>
    </div>
</header>