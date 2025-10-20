
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>5 Pesos Team</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800">
    <section class="relative text-white overflow-hidden">
        <!-- CARRUSEL DE MANGAS -->
        <div class="absolute inset-0 overflow-hidden">
            <div id="carousel" class="flex transition-transform duration-700 ease-in-out w-full h-full">
            <!-- Imagen 1 -->
            <div class="w-full flex-shrink-0">
                <img src="https://e1.pxfuel.com/desktop-wallpaper/404/793/desktop-wallpaper-bleach-manga-on-dog-manga-cover.jpg"
                class="w-full h-full object-cover" alt="Manga 1">
            </div>
            <!-- Imagen 2 -->
            <div class="w-full flex-shrink-0">
                <img src="https://i0.wp.com/anitrendz.net/news/wp-content/uploads/2025/04/Danjohi-1-5-no-Sekai-demo-Futsuu-ni-Ikirareru-to-Omotta-Sukisuki-PV-screenshot.jpg"
                class="w-full h-full object-cover" alt="Manga 2">
            </div>
            <!-- Imagen 3 -->
            <div class="w-full flex-shrink-0">
                <img src="https://dw9to29mmj727.cloudfront.net/promo/2016/5319-SeriesHeaders_TKG_2000x800_REV_wm.jpg"
                class="w-full h-full object-cover" alt="Manga 3">
            </div>
            </div>

            <!-- Capa oscura encima del carrusel -->
            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <!-- Contenido centrado -->
        <div class="relative max-w-7xl mx-auto px-4 py-32 text-center z-10">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 drop-shadow-lg">5 Pesos Team</h1>
            <p class="text-lg md:text-xl mb-6 drop-shadow-md">
                Contenido libre y traducciones hechas por fans, para fans.
            </p>
            <a href="{{ route('login.form') }}"
                class="bg-white text-black font-semibold px-6 py-3 rounded hover:bg-gray-100 transition">
                Comienza Ahora
            </a>
        </div>

        <!-- Script del carrusel -->
        <script>
            const carousel = document.getElementById('carousel');
            let index = 0;
            const slides = carousel.children.length;

            function showSlide(i) {
            carousel.style.transform = `translateX(-${i * 100}%)`;
            index = i;
            }

            // Cambio automático cada 5 segundos
            setInterval(() => {
            index = (index + 1) % slides;
            showSlide(index);
            }, 5000);
        </script>
    </section>

  <!-- Features Section -->
  <section id="features" class="py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-12">Traducciones y contenido libre</h2>
    <div class="grid md:grid-cols-3 gap-8">

      <!-- Tarjeta 1 -->
      <div class="bg-white p-6 rounded shadow hover:shadow-lg transition text-center">
        <!-- Ícono -->
        <div class="flex justify-center mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-red-500" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">Del público para el público</h3>
        <p class="text-gray-600">Comparte tus propias pasiones y conecta con los demás.</p>
      </div>
      
      <!-- Tarjeta 2 -->
      <div class="bg-white p-6 rounded shadow hover:shadow-lg transition text-center">
        <div class="flex justify-center mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-red-500" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 8c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2zm0 4c-2.67 0-8 1.336-8 4v2h16v-2c0-2.664-5.33-4-8-4z" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">Sin pagos de por medio</h3>
        <p class="text-gray-600">Contenido completamente libre.</p>
      </div>

      <!-- Tarjeta 3 -->
      <div class="bg-white p-6 rounded shadow hover:shadow-lg transition text-center">
        <div class="flex justify-center mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-red-500" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">Monitoreo constante</h3>
        <p class="text-gray-600">Con administración encargada del control de calidad.</p>
      </div>

    </div>
  </div>
</section>


  <!-- Testimonials Section -->
    <section id="destacados" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Mangas Destacados</h2>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Tarjeta 1 -->
        <div
            class="bg-gray-50 rounded-2xl overflow-hidden shadow hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
            <img src="https://i.redd.it/fusf36sp3m641.jpg"
            alt="Chainsaw Man"
            class="w-full h-64 object-cover">
            <div class="p-6">
            <h3 class="text-xl font-semibold mb-2 text-gray-800">Chainsaw Man</h3>
            <p class="text-gray-600 mb-4">Un joven cazador de demonios con una motosierra como corazón, en un mundo donde el horror y la humanidad se entrelazan.</p>
            <a href="#"
                class="inline-block bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                Leer más
            </a>
            </div>
        </div>

        <!-- Tarjeta 2 -->
        <div
            class="bg-gray-50 rounded-2xl overflow-hidden shadow hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
            <img src="https://i5.walmartimages.com/seo/Jujutsu-Kaisen-Jujutsu-Kaisen-Vol-7-Book-7-Paperback-9781974717118_87de2b57-90a6-4c8b-8c27-6edf08496e9c.6d74d95fa5cbc1f8bcae18895ee5773d.jpeg"
            alt="Jujutsu Kaisen"
            class="w-full h-64 object-cover">
            <div class="p-6">
            <h3 class="text-xl font-semibold mb-2 text-gray-800">Jujutsu Kaisen</h3>
            <p class="text-gray-600 mb-4">Hechicería, maldiciones y batallas épicas se combinan en una historia llena de acción y emoción.</p>
            <a href="#"
                class="inline-block bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                Leer más
            </a>
            </div>
        </div>

        <!-- Tarjeta 3 -->
        <div
            class="bg-gray-50 rounded-2xl overflow-hidden shadow hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
            <img src="https://www.normaeditorial.com/upload/media/albumes/0001/05/5f5d81d1d8918df070a03a970db8e09a613c488c.jpeg"
            alt="Tokyo Ghoul"
            class="w-full h-64 object-cover">
            <div class="p-6">
            <h3 class="text-xl font-semibold mb-2 text-gray-800">Tokyo Ghoul</h3>
            <p class="text-gray-600 mb-4">Una historia oscura y profunda sobre identidad y supervivencia en un mundo donde los monstruos viven entre nosotros.</p>
            <a href="#"
                class="inline-block bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                Leer más
            </a>
            </div>
        </div>
        </div>
    </div>
    </section>

    <section id="lanzamientos" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Lanzamientos del staff</h2>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="bg-white rounded-2xl shadow hover:shadow-xl transition transform hover:-translate-y-1 overflow-hidden">
                <img src="{{ asset('Images/cap-8.webp') }}" 
                    alt="Danhoji 1:5 no Sekai - Capítulo 8" 
                    class="w-full h-64 object-cover object-top">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">Danhoji 1:5 no Sekai - Capítulo 8</h3>
                    <p class="text-gray-600 mb-4">¡El capítulo 8 llega con la misma tensión de siempre!</p>
                    <a href="#" class="inline-block bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                        Leer más
                    </a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-2xl shadow hover:shadow-xl transition transform hover:-translate-y-1 overflow-hidden">
                <img src="{{ asset('Images/cap-9.webp') }}"
                alt="Danhoji 1:5 no Sekai - Capítulo 9"
                class="w-full h-64 object-cover object-top">
                <div class="p-6">
                <h3 class="text-xl font-semibold mb-2 text-gray-800">Danhoji 1:5 no Sekai - Capítulo 9</h3>
                <p class="text-gray-600 mb-4">FInalmente el desenlace de las acosadoras jajalol</p>
                <a href="#"
                    class="inline-block bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                    Leer más
                </a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-2xl shadow hover:shadow-xl transition transform hover:-translate-y-1 overflow-hidden">
                <img src="{{ asset('Images/cap-10.webp') }}"
                alt="Danhoji 1:5 no Sekai - Capítulo 10"
                class="w-full h-64 object-cover object-top">
                <div class="p-6">
                <h3 class="text-xl font-semibold mb-2 text-gray-800">Danhoji 1:5 no Sekai - Capítulo 10</h3>
                <p class="text-gray-600 mb-4">Se anuncia un nuevo spin-off de Tokyo Ghoul con personajes inéditos y nuevas tramas.</p>
                <a href="#"
                    class="inline-block bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                    Leer más
                </a>
                </div>
            </div>
            </div>
        </div>
    </section>


    <section id="social" class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-8 text-gray-800">Síguenos y Apóyanos 💖</h2>
        <p class="text-gray-600 mb-10">Sigue nuestras redes para no perderte los próximos lanzamientos y apóyanos para seguir creando contenido increíble.</p>

        <!-- Redes Sociales -->
        <div class="flex justify-center gap-8 mb-12">
        <a href="https://twitter.com" target="_blank" class="text-gray-600 hover:text-red-500 transition transform hover:scale-110">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
            <path d="M22.46 6.03c-.77.35-1.6.58-2.46.69a4.29 4.29 0 001.88-2.38 8.61 8.61 0 01-2.72 1.04 4.27 4.27 0 00-7.27 3.89A12.12 12.12 0 013 4.9a4.26 4.26 0 001.32 5.7 4.24 4.24 0 01-1.93-.53v.05a4.28 4.28 0 003.42 4.19 4.26 4.26 0 01-1.92.07 4.27 4.27 0 003.98 2.96A8.56 8.56 0 012 19.54a12.08 12.08 0 006.56 1.92c7.88 0 12.19-6.53 12.19-12.19l-.01-.55A8.66 8.66 0 0022.46 6z" />
            </svg>
        </a>
        <a href="https://instagram.com" target="_blank" class="text-gray-600 hover:text-red-500 transition transform hover:scale-110">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
            <path d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.76 0 5-2.24 5-5V7c0-2.76-2.24-5-5-5H7zm10 2a3 3 0 013 3v10a3 3 0 01-3 3H7a3 3 0 01-3-3V7a3 3 0 013-3h10zm-5 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zm0 2a3.5 3.5 0 110 7 3.5 3.5 0 010-7zm4.75-.88a1.13 1.13 0 100 2.26 1.13 1.13 0 000-2.26z" />
            </svg>
        </a>
        <a href="https://facebook.com" target="_blank" class="text-gray-600 hover:text-red-600 transition transform hover:scale-110">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
            <path d="M22 12a10 10 0 10-11.5 9.87v-6.99h-2.3V12h2.3V9.79c0-2.27 1.34-3.53 3.39-3.53.98 0 2.01.18 2.01.18v2.22h-1.13c-1.12 0-1.47.7-1.47 1.41V12h2.5l-.4 2.88h-2.1v6.99A10 10 0 0022 12z" />
            </svg>
        </a>
        <a href="https://youtube.com" target="_blank" class="text-gray-600 hover:text-red-500 transition transform hover:scale-110">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
            <path d="M21.8 8.001a2.751 2.751 0 00-1.94-1.946C18.34 6 12 6 12 6s-6.34 0-7.86.055A2.751 2.751 0 002.2 8.001 28.593 28.593 0 002 12a28.593 28.593 0 00.2 3.999 2.751 2.751 0 001.94 1.946C5.66 18 12 18 12 18s6.34 0 7.86-.055a2.751 2.751 0 001.94-1.946A28.593 28.593 0 0022 12a28.593 28.593 0 00-.2-3.999zM10 15V9l5 3-5 3z" />
            </svg>
        </a>
        </div>
        <!-- Donaciones -->
        <div class="flex justify-center flex-wrap gap-6">
        <a href="https://paypal.me/" target="_blank"
            class="flex items-center gap-2 bg-red-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-600 transition transform hover:-translate-y-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12.879 5.509a6.624 6.624 0 00-2.382.302c-.195.062-.382.15-.563.263l-.077.053c-.033.024-.068.045-.1.07-.049.037-.094.076-.14.114a3.54 3.54 0 00-.936 1.158c-.174.345-.307.717-.396 1.108l-.04.185-.84 4.341a.44.44 0 00.09.36.44.44 0 00.35.162h1.74l.23-1.188.03-.15h1.653c.59 0 1.133-.12 1.626-.36a3.08 3.08 0 001.178-.975c.27-.383.454-.822.553-1.311.086-.441.084-.876-.005-1.3a2.65 2.65 0 00-.854-1.512 2.91 2.91 0 00-1.507-.647 6.37 6.37 0 00-.6-.03z" />
            </svg>
            Donar con PayPal
        </a>

        <a href="https://ko-fi.com/" target="_blank"
            class="flex items-center gap-2 bg-red-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-600 transition transform hover:-translate-y-1">
            ☕ Apóyanos en Ko-fi
        </a>

        <a href="https://patreon.com/" target="_blank"
            class="flex items-center gap-2 bg-red-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-600 transition transform hover:-translate-y-1">
            ❤️ Apóyanos en Patreon
        </a>
        </div>
    </div>
    </section>


    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-12 pb-6">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-8">
        
        <!-- Logo y descripción -->
        <div class="flex flex-col items-start md:items-start">
            <h3 class="text-2xl font-bold mb-2">5 Pesos Team</h3>
            <p class="text-gray-400 max-w-sm">
            Creando contenido único de mangas y entretenimiento para nuestra comunidad de fans.
            </p>
        </div>

        <!-- Enlaces rápidos -->
        <div class="flex flex-col">
            <h4 class="font-semibold mb-3">Explorar</h4>
            <ul class="space-y-2 text-gray-300">
            <li><a href="#lanzamientos" class="hover:text-red-500 transition">Lanzamientos</a></li>
            <li><a href="#redes" class="hover:text-red-500 transition">Redes</a></li>
            </ul>
        </div>

        <!-- Redes sociales -->
        <div class="flex flex-col">
            <h4 class="font-semibold mb-3">Síguenos</h4>
            <div class="flex gap-4 text-2xl">
            <a href="https://twitter.com" target="_blank" class="hover:text-blue-400 transition">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="https://instagram.com" target="_blank" class="hover:text-pink-500 transition">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://facebook.com" target="_blank" class="hover:text-blue-600 transition">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="https://www.youtube.com" target="_blank" class="hover:text-red-600 transition">
                <i class="fab fa-youtube"></i>
            </a>
            </div>
        </div>

        </div>

        <!-- Divider -->
        <div class="border-t border-gray-800 mt-8 pt-6 text-center text-gray-500 text-sm">
        &copy; 2025 5 Pesos Team. Todos los derechos reservados.
        </div>
    </div>
    </footer>


    <!-- Mobile menu toggle -->
    <script>
        const btn = document.getElementById('menu-btn');
        const menu = document.getElementById('mobile-menu');

        btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        });
    </script>

</body>

</html>