@extends('layouts.app')

@section('title', 'Home')

@section('content')
    @include('layouts.navbar')

    <div class="max-w-7xl mx-auto px-4 py-12 bg-steel-gray">
        <h1 class="text-4xl font-bold text-center mb-12 drop-shadow-md">Últimos Posts</h1>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
            <div class="bg-carbon rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 overflow-hidden">
                
                @php
                    $thumbnailPath = $post->thumbnail && Storage::disk('public')->exists($post->thumbnail)
                                     ? Storage::url($post->thumbnail)
                                     : null;
                @endphp

                @if($thumbnailPath)
                    <img src="{{ $thumbnailPath }}" alt="{{ $post->title }}" class="w-full h-64 object-cover">
                @else
                    <!-- Fallback si no hay thumbnail -->
                    <div class="w-full h-64 flex items-center justify-center bg-gray-700 text-white">
                        Sin vista previa
                    </div>
                @endif

                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">{{ $post->title }}</h3>
                    <p class="text-off-white/80 mb-4">{{ Str::limit($post->description, 120) }}</p>

                    <p class="text-sm text-off-white/60 mb-2">
                        Publicado por: 
                        <span class="font-medium">{{ $post->profile->user->name ?? 'Desconocido' }}</span>
                    </p>

                    @php
                        $pdfPath = $post->file && Storage::disk('public')->exists($post->file)
                                   ? Storage::url($post->file)
                                   : null;
                    @endphp

                    @if($pdfPath)
                        <a href="{{ $pdfPath }}" target="_blank"
                           class="inline-block bg-blood-red text-off-white px-4 py-2 rounded hover:bg-vivid-red transition">
                           Leer PDF
                        </a>
                    @else
                        <span class="text-off-white/60">PDF no disponible</span>
                    @endif
                </div>
            </div>
            @empty
            <p class="text-center text-off-white/60 mt-12">No hay posts disponibles.</p>
            @endforelse
        </div>
    </div>
@endsection
