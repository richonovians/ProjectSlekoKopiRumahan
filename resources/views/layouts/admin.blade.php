<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Sleko Kopi Rumahan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        coffee: {
                            light: '#f5f7fd',
                            primary: '#5881c8', 
                            dark: '#023A73', 
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-coffee-light text-gray-800 font-sans antialiased flex h-screen overflow-hidden">

    @include('components.admin-sidebar')

    <div class="flex-1 flex flex-col h-screen overflow-hidden">
        
        @include('components.admin-topbar')

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-[#f5f7fd] p-8">
            @yield('content')

            <div class="mt-8 pt-4 border-t border-gray-200 text-center text-xs text-gray-400">
                &copy; {{ date('Y') }} Sleko Kopi Rumahan Dashboard. Built with Laravel.
            </div>
        </main>
        
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuBtn = document.getElementById('mobile-menu-btn');
        const sidebar = document.getElementById('admin-sidebar');
        
        // Buat elemen overlay (layar gelap) secara dinamis
        const overlay = document.createElement('div');
        overlay.className = 'fixed inset-0 bg-black/50 z-30 hidden transition-opacity duration-300 opacity-0 md:hidden';
        document.body.appendChild(overlay);

        // Fungsi buka/tutup menu
        function toggleMenu() {
            sidebar.classList.toggle('-translate-x-full'); // Geser menu
            
            if (sidebar.classList.contains('-translate-x-full')) {
                // Saat Menu Tertutup
                overlay.classList.remove('opacity-100');
                setTimeout(() => overlay.classList.add('hidden'), 300);
            } else {
                // Saat Menu Terbuka
                overlay.classList.remove('hidden');
                setTimeout(() => overlay.classList.add('opacity-100'), 10);
            }
        }

        // Jalankan fungsi saat hamburger atau overlay diklik
        if(menuBtn) menuBtn.addEventListener('click', toggleMenu);
        if(overlay) overlay.addEventListener('click', toggleMenu);
    });
</script>

</body>
</html>