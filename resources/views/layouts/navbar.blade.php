<nav class="bg-black text-white shadow-lg sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16 items-center">

      <!-- Logo y nombre -->
      <a href="/" class="flex items-center space-x-3">
        <img src="https://manga-oni.com/public/archivos/grupos/465/portada.jpg?dt=1750029220"
             alt="Logo" class="w-10 h-10 rounded-full border-2 border-white shadow-md">
        <span class="font-bold text-2xl tracking-wide drop-shadow-md text-white">5 Pesos Team</span>
      </a>

      <!-- Menú desktop -->
      <div class="hidden md:flex justify-start flex-1 ml-10 space-x-6 font-medium text-white">
        <a href="{{ route('home') }}" class="hover:text-red-500 transition-colors duration-300">Inicio</a>
        <a href="#lanzamientos" class="hover:text-red-500 transition-colors duration-300">Lanzamientos</a>
        <a href="#proyectos" class="hover:text-red-500 transition-colors duration-300">Proyectos</a>
      </div>

      <!-- Búsqueda y perfil -->
      <div class="hidden md:flex items-center space-x-4">
        <div class="flex border border-gray-300 rounded-full overflow-hidden focus-within:ring-2 focus-within:ring-blue-300">
          <input type="text" placeholder="Buscar..." 
                 class="px-3 py-1 text-black placeholder-gray-400 focus:outline-none bg-white">
          <button class="bg-red-500 text-white px-4 font-semibold hover:bg-red-600 transition">Buscar</button>
        </div>

        @auth
          @if(auth()->user()->profile)
            <div class="relative">
              <button id="profile-btn" class="focus:outline-none rounded-full border-2 border-gray-300 shadow-md">
                <img src="{{ asset('Images/default-white.svg') }}" alt="Perfil" class="w-9 h-9 rounded-full">
              </button>

              <div id="profile-menu"
                   class="hidden absolute right-0 mt-2 w-48 bg-white text-black rounded-2xl shadow-xl overflow-hidden">
                <a href="{{ route('profile.show', auth()->user()->profile->id) }}" 
                   class="block px-4 py-2 hover:bg-red-100 transition">Mi Perfil</a>
                <hr class="border-gray-300">
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="w-full text-left px-4 py-2 hover:bg-red-100 transition">
                    Cerrar sesión
                  </button>
                </form>
              </div>
            </div>
          @endif
        @endauth
      </div>

      <!-- Menú móvil -->
      <div class="md:hidden flex items-center">
        <button id="menu-btn" class="focus:outline-none p-2 rounded hover:bg-gray-800 transition">
          <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>

    <!-- Menú móvil desplegable -->
    <div id="mobile-menu" class="hidden md:hidden mt-4 space-y-2 px-2">
      <a href="{{ route('home') }}" class="block px-4 py-2 rounded-lg bg-black hover:bg-gray-800 transition text-white font-medium">Inicio</a>
      <a href="#lanzamientos" class="block px-4 py-2 rounded-lg bg-black hover:bg-gray-800 transition text-white font-medium">Lanzamientos</a>
      <a href="#proyectos" class="block px-4 py-2 rounded-lg bg-black hover:bg-gray-800 transition text-white font-medium">Proyectos</a>

      <div class="flex items-center space-x-2 mt-3">
        <input type="text" placeholder="Buscar..."
               class="flex-1 px-3 py-1 rounded-full text-black focus:outline-none focus:ring-2 focus:ring-blue-300 bg-white">
        <button class="bg-red-600 text-white px-4 py-1 rounded-full font-semibold hover:bg-red-700 transition">Buscar</button>
      </div>

      @auth
        @if(auth()->user()->profile)
          <a href="{{ route('profile.show', auth()->user()->profile->id) }}"
             class="block px-4 py-2 rounded-lg bg-black hover:bg-gray-800 transition text-white font-medium">
            Mi Perfil
          </a>
          <form method="POST" action="{{ route('logout') }}" class="mt-2">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 rounded-lg bg-black hover:bg-gray-800 transition text-white font-medium">
              Cerrar sesión
            </button>
          </form>
        @endif
      @endauth
    </div>
  </div>
</nav>

<script>
  // Toggle menú móvil
  const btn = document.getElementById('menu-btn');
  const menu = document.getElementById('mobile-menu');
  btn.addEventListener('click', () => menu.classList.toggle('hidden'));

  // Toggle menú perfil
  const profileBtn = document.getElementById('profile-btn');
  const profileMenu = document.getElementById('profile-menu');
  if(profileBtn){
    profileBtn.addEventListener('click', () => profileMenu.classList.toggle('hidden'));
    window.addEventListener('click', e => {
      if (!profileBtn.contains(e.target) && !profileMenu.contains(e.target)) {
        profileMenu.classList.add('hidden');
      }
    });
  }
</script>
