@extends('layouts.app')

@section('title', 'Home')

@section('content')
@include('layouts.navbar')

<!-- Hero / Carrusel -->
<section class="relative text-white overflow-hidden">
    <div class="absolute inset-0 overflow-hidden">
        <div id="carousel" class="flex transition-transform duration-700 ease-in-out w-full h-full">
            <div class="w-full flex-shrink-0">
                <img src="https://e1.pxfuel.com/desktop-wallpaper/404/793/desktop-wallpaper-bleach-manga-on-dog-manga-cover.jpg"
                class="w-full h-full object-cover" alt="Manga 1">
            </div>
            <div class="w-full flex-shrink-0">
                <img src="https://i0.wp.com/anitrendz.net/news/wp-content/uploads/2025/04/Danjohi-1-5-no-Sekai-demo-Futsuu-ni-Ikirareru-to-Omotta-Sukisuki-PV-screenshot.jpg"
                class="w-full h-full object-cover" alt="Manga 2">
            </div>
            <div class="w-full flex-shrink-0">
                <img src="https://dw9to29mmj727.cloudfront.net/promo/2016/5319-SeriesHeaders_TKG_2000x800_REV_wm.jpg"
                class="w-full h-full object-cover" alt="Manga 3">
            </div>
        </div>
        <div class="absolute inset-0 bg-black/70"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 py-32 text-center z-10">
        <h1 class="text-4xl md:text-5xl font-bold mb-4 drop-shadow-lg">5 Pesos Team</h1>
        <p class="text-lg md:text-xl mb-6 drop-shadow-md">
            Contenido libre y traducciones hechas por fans, para fans.
        </p>
    </div>

    <script>
        const carousel = document.getElementById('carousel');
        let index = 0;
        const slides = carousel.children.length;

        function showSlide(i) {
            carousel.style.transform = `translateX(-${i * 100}%)`;
            index = i;
        }

        setInterval(() => {
            index = (index + 1) % slides;
            showSlide(index);
        }, 5000);
    </script>
</section>


<!-- Últimos Posts -->
<section class="max-w-7xl mx-auto px-4 py-12 rounded-2xl">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-4xl font-bold text-off-white drop-shadow-md">Últimos Posts</h1>

        @auth
        <a href="{{ route('posts.create') }}"
           class="bg-[#FF2E3E] text-off-white px-6 py-3 rounded-2xl hover:bg-vivid-red transition font-semibold">
           + Agregar Post
        </a>
        @endauth
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($posts as $post)
            @php
                $thumbnailPath = $post->thumbnail && Storage::disk('public')->exists($post->thumbnail)
                                 ? Storage::url($post->thumbnail)
                                 : null;

                $pdfPath = $post->file && Storage::disk('public')->exists($post->file)
                           ? Storage::url($post->file)
                           : null;
            @endphp

            <div class="bg-black rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 overflow-hidden flex flex-col">
                <!-- Imagen -->
                @if($thumbnailPath)
                    <img src="{{ $thumbnailPath }}" alt="{{ $post->title }}" class="w-full object-top h-80 object-cover">
                @else
                    <div class="w-full h-80 flex items-center justify-center bg-gray-200 text-carbon font-medium">
                        Sin vista previa
                    </div>
                @endif

                <!-- Contenido -->
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div class="flex-1">
                        <h3 class="text-xl font-semibold mb-2 text-white">{{ $post->title }}</h3>
                        <p class="text-white/80 mb-4">{{ Str::limit($post->description, 120) }}</p>
                    </div>

                    <!-- Publicado por -->
                    <p class="text-sm text-white/60 mb-4">
                        Publicado por: 
                        <span class="font-medium">{{ $post->profile->user->name ?? 'Desconocido' }}</span>
                    </p>

                    <!-- Botón PDF -->
                    <div>
                        @if($pdfPath)
                            <a href="{{ $pdfPath }}" target="_blank"
                               class="w-full inline-block text-center bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition font-semibold">
                               Leer PDF
                            </a>
                        @else
                            <span class="w-full inline-block text-center text-carbon/60 py-2 border border-dashed border-carbon/30 rounded">
                                PDF no disponible
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-carbon/60 mt-12">No hay posts disponibles.</p>
        @endforelse
    </div>
</section>

<!-- Footer -->
<footer class="bg-carbon text-off-white pt-12 pb-6 mt-12">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-8">
            <div class="flex flex-col items-start md:items-start">
                <h3 class="text-2xl font-bold mb-2">5 Pesos Team</h3>
                <p class="text-off-white/70 max-w-sm">
                    Creando contenido único de mangas y entretenimiento para nuestra comunidad de fans.
                </p>
            </div>

            <div class="flex flex-col">
                <h4 class="font-semibold mb-3">Explorar</h4>
                <ul class="space-y-2 text-off-white/70">
                    <li><a href="#destacados" class="hover:text-vivid-red transition">Mangas Destacados</a></li>
                    <li><a href="#social" class="hover:text-vivid-red transition">Redes</a></li>
                </ul>
            </div>

            <div class="flex flex-col">
                <h4 class="font-semibold mb-3">Síguenos</h4>
                <div class="flex gap-4 text-2xl">
                    <a href="https://twitter.com" target="_blank" class="hover:text-vivid-red transition"><i class="fab fa-twitter"></i></a>
                    <a href="https://instagram.com" target="_blank" class="hover:text-vivid-red transition"><i class="fab fa-instagram"></i></a>
                    <a href="https://facebook.com" target="_blank" class="hover:text-vivid-red transition"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.youtube.com" target="_blank" class="hover:text-vivid-red transition"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>

        <div class="border-t border-steel-gray mt-8 pt-6 text-center text-off-white/50 text-sm">
            &copy; 2025 5 Pesos Team. Todos los derechos reservados.
        </div>
    </div>
</footer>
@endsection
