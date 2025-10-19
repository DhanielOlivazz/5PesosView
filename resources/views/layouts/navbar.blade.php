<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>5 Pesos Team</title>
  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
  <nav class="bg-red-500 text-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16 items-center">
      <!-- Logo y nombre -->
      <div class="flex items-center space-x-3">
        <img src="https://manga-oni.com/public/archivos/grupos/465/portada.jpg?dt=1750029220"
          alt="Logo" class="w-10 h-10 rounded-full">
        <span class="font-bold text-xl">5 Pesos Team</span>
      </div>

      <!-- Menú desktop -->
      <div class="hidden md:flex justify-start flex-1 ml-10 space-x-8">
        <a href="#" class="text-white hover:text-gray-200 font-medium">Inicio</a>
      </div>

      <!-- Búsqueda y perfil -->
      <div class="hidden md:flex items-center space-x-4">
        <input type="text" placeholder="Buscar..."
          class="px-3 py-1 rounded text-black focus:outline-none focus:ring-2 focus:ring-white">
        <button
          class="bg-white text-red-500 px-4 py-1 rounded font-semibold hover:bg-gray-200 transition">Buscar</button>
        <!-- Imagen de perfil -->
        <div class="relative">
          <button id="profile-btn" class="focus:outline-none">
            <img src="https://i.pravatar.cc/40" alt="Perfil" class="w-9 h-9 rounded-full">
          </button>

          <!-- Dropdown -->
          <div id="profile-menu"
              class="hidden absolute right-0 mt-2 w-48 bg-white text-black rounded shadow-lg z-50">
              <button type="submit" class="w-full text-left px-4 py-2 text-black hover:bg-gray-100">Mi Perfil</button>
              <button type="submit" class="w-full text-left px-4 py-2 text-black hover:bg-gray-100">Configuraciones</button>
              <hr class="my-1 border-gray-300">
              <!-- Logout -->
              <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit"
                      class="w-full text-left px-4 py-2 text-black hover:bg-gray-100">Cerrar sesión</button>
              </form>
          </div>
        </div>
      </div>

      <!-- Botón mobile -->
      <div class="md:hidden flex items-center">
        <button id="menu-btn" class="focus:outline-none">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>

    <!-- Menú móvil oculto -->
    <div id="mobile-menu" class="hidden md:hidden mt-4 space-y-3 px-2">
      <a href="#" class="block px-4 py-2 rounded hover:bg-red-600">Inicio</a>
      <a href="#" class="block px-4 py-2 rounded hover:bg-red-600">Proyectos</a>
      <a href="#" class="block px-4 py-2 rounded hover:bg-red-600">Cerrar Sesión</a>
      <div class="flex items-center space-x-2 mt-3">
        <input type="text" placeholder="Buscar..."
          class="flex-1 px-3 py-1 rounded text-black focus:outline-none focus:ring-2 focus:ring-red-400">
        <button
          class="bg-white text-red-500 px-4 py-1 rounded font-semibold hover:bg-gray-200 transition">Buscar</button>
      </div>
    </div>
  </div>
</nav>


  <script>
    // Toggle menú móvil
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
      menu.classList.toggle('hidden');
    });
  </script>
  <script>
      const profileBtn = document.getElementById('profile-btn');
      const profileMenu = document.getElementById('profile-menu');

      profileBtn.addEventListener('click', () => {
        profileMenu.classList.toggle('hidden');
      });

      // Cerrar el menú si clic fuera
      window.addEventListener('click', (e) => {
        if (!profileBtn.contains(e.target) && !profileMenu.contains(e.target)) {
          profileMenu.classList.add('hidden');
        }
      });
  </script>

</body>

</html>
