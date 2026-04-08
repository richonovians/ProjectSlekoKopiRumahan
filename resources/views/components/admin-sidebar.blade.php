<aside id="admin-sidebar" class="w-64 bg-coffee-dark text-white flex flex-col h-screen fixed md:relative z-40 inset-y-0 left-0 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out flex-shrink-0">
    <div class="h-20 flex items-center justify-center border-b border-white/10 mt-4 pb-4">
        <a href="{{ route('admin.dashboard') }}" class="flex flex-col items-center font-['Rajdhani'] hover:opacity-90 transition duration-300">
            <span class="text-4xl font-bold leading-[0.8] tracking-wide text-white">sleko</span>
            <span class="text-[10px] font-medium tracking-[0.18em] -mt-1 text-gray-300">kopi rumahan</span>
        </a>
    </div>

    <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-2">
        <p class="px-4 text-[10px] font-bold tracking-wider text-gray-400 uppercase mb-2">Main Menu</p>
        
        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-[#005bb5] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }} rounded-lg transition-colors group">
            <i class="fa-solid fa-chart-pie w-6 text-center"></i>
            <span class="ml-3 font-medium text-sm">Dashboard</span>
        </a>

        <a href="{{ route('admin.menu') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-white rounded-lg transition-colors group">
            <i class="fa-solid fa-mug-hot w-6 text-center group-hover:text-white transition-colors"></i>
            <span class="ml-3 font-medium text-sm">Kelola Menu</span>
        </a>

        <a href="{{ route('admin.gallery') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-white rounded-lg transition-colors group">
            <i class="fa-solid fa-images w-6 text-center group-hover:text-white transition-colors"></i>
            <span class="ml-3 font-medium text-sm">Kelola Gallery</span>
        </a>

        <p class="px-4 text-[10px] font-bold tracking-wider text-gray-400 uppercase mt-6 mb-2">Administration</p>

        <a href="{{ route('admin.users') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-white rounded-lg transition-colors group">
            <i class="fa-solid fa-user-shield w-6 text-center group-hover:text-white transition-colors"></i>
            <span class="ml-3 font-medium text-sm">Kelola Admin</span>
        </a>
        
        {{-- <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-white rounded-lg transition-colors group">
            <i class="fa-solid fa-gear w-6 text-center group-hover:text-white transition-colors"></i>
            <span class="ml-3 font-medium text-sm">Pengaturan Web</span>
        </a> --}}
    </nav>

    <div class="p-4 border-t border-white/10">
        <form method="POST" action="#">
            @csrf
            <button type="submit" class="w-full flex items-center px-4 py-3 text-red-300 hover:bg-red-500/10 hover:text-red-400 rounded-lg transition-colors group">
                <i class="fa-solid fa-arrow-right-from-bracket w-6 text-center"></i>
                <span class="ml-3 font-medium text-sm">Logout</span>
            </button>
        </form>
    </div>
</aside>