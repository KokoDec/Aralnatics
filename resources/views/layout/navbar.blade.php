<nav class="w-full bg-white/20 backdrop-blur-lg border-b border-white/30 fixed top-0 left-0 z-50 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo/Brand -->
            <div class="flex-shrink-0 flex items-center">
                <span class="text-2xl font-bold text-[#FFE1AF]">Aralnatics</span>
            </div>
            <!-- Hamburger Button (Mobile) -->
            <div class="flex md:hidden">
                <button id="navbar-toggle" class="text-[#4B2E19] focus:outline-none" aria-label="Toggle navigation">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path id="navbar-hamburger" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path id="navbar-close" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- Nav Links -->
            <div id="navbar-menu" class="hidden md:flex space-x-4 items-center">
                <a href="/dashboard" class="px-4 py-2 font-semibold text-[#F5E9DA] hover:text-[#b97a3a] transition"><i class="fa-solid fa-house mr-2"></i>HOME</a>
                <a href="/reviewer" class="px-4 py-2 font-semibold text-[#F5E9DA] hover:text-[#b97a3a] transition"><i class="fa-solid fa-book-open mr-2"></i>REVIEWER</a>
                <a href="/quiz" class="px-4 py-2 font-semibold text-[#F5E9DA] hover:text-[#b97a3a] transition"><i class="fa-solid fa-question mr-2"></i>QUIZ</a>
                <a href="/statistics" class="px-4 py-2 font-semibold text-[#F5E9DA] hover:text-[#b97a3a] transition"><i class="fa-solid fa-chart-bar mr-2"></i>STATISTICS</a>
                <a href="/profile" class="px-4 py-2 font-semibold text-[#F5E9DA] hover:text-[#b97a3a] transition"><i class="fa-solid fa-user mr-2"></i>PROFILE</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="px-4 py-2 font-semibold text-[#F5E9DA] hover:text-red-400 transition"><i class="fa-solid fa-door-open mr-2"></i>LOGOUT</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Mobile Menu -->
    <div id="navbar-mobile-menu" class="md:hidden hidden bg-[#B77466] border-t border-white/30 px-4 pt-2 pb-4">
    <a href="/dashboard" class="block px-4 py-2 font-semibold text-white hover:text-[#FFE1AF] transition"><i class="fa-solid fa-house mr-2"></i>HOME</a>
    <a href="/reviewer" class="block px-4 py-2 font-semibold text-white hover:text-[#FFE1AF] transition"><i class="fa-solid fa-book-open mr-2"></i>REVIEWER</a>
    <a href="/quiz" class="block px-4 py-2 font-semibold text-white hover:text-[#FFE1AF] transition"><i class="fa-solid fa-question mr-2"></i>QUIZ</a>
    <a href="/statistics" class="block px-4 py-2 font-semibold text-white hover:text-[#FFE1AF] transition"><i class="fa-solid fa-chart-bar mr-2"></i>STATISTICS</a>
    <a href="/profile" class="block px-4 py-2 font-semibold text-white hover:text-[#FFE1AF] transition"><i class="fa-solid fa-user mr-2"></i>PROFILE</a>
        <form method="POST" action="{{ route('logout') }}" class="mt-2">
            @csrf
            <button type="submit" class="w-full px-4 py-2 font-semibold text-white hover:text-red-400 transition"><i class="fa-solid fa-door-open mr-2"></i>LOGOUT</button>
        </form>
    </div>
    <script>
        const toggleBtn = document.getElementById('navbar-toggle');
        const menu = document.getElementById('navbar-menu');
        const mobileMenu = document.getElementById('navbar-mobile-menu');
        const hamburger = document.getElementById('navbar-hamburger');
        const closeIcon = document.getElementById('navbar-close');
        let open = false;
        toggleBtn.addEventListener('click', () => {
            open = !open;
            if (open) {
                mobileMenu.classList.remove('hidden');
                hamburger.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            } else {
                mobileMenu.classList.add('hidden');
                hamburger.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
        });
        // Optional: Close menu when resizing to desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                mobileMenu.classList.add('hidden');
                hamburger.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                open = false;
            }
        });
    </script>
</nav>
