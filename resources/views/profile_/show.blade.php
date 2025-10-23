@extends('layouts.app')

@section('title', 'Perfil')

@section('content')
    @include('layouts.navbar')

    <div class="max-w-7xl mx-auto px-4 py-12 bg-steel-gray">
        <!-- Tarjeta de perfil -->
        <div class="bg-carbon rounded-2xl shadow-lg p-6 flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-6 mb-12">
            <img src="{{ $profile->picture ? asset('storage/' . $profile->picture) : asset('Images/default.svg') }}" 
                 alt="{{ $profile->user->name }}" 
                 class="w-32 h-32 md:w-48 md:h-48 rounded-full border-4 border-blood-red object-cover">

            <div class="flex-1 text-center md:text-left">
                <h1 class="text-3xl font-bold text-off-white">{{ $profile->user->name }}</h1>

                @if($profile->location)
                    <p class="text-off-white/70 mt-1">{{ $profile->location }}</p>
                @endif

                @if($profile->description)
                    <p class="text-off-white/80 mt-3">{{ $profile->description }}</p>
                @else
                    <p class="text-off-white/50 mt-3 italic">Sin descripción</p>
                @endif

                @if($profile->tastes && count($profile->tastes) > 0)
                    <p class="text-off-white/80 mt-4 font-semibold">Gustos:</p>
                    <div class="flex flex-wrap gap-2 mt-2">
                        @foreach($profile->tastes as $taste)
                            <span class="bg-blood-red/20 text-blood-red px-3 py-1 rounded-full text-sm">{{ $taste }}</span>
                        @endforeach
                    </div>
                @else
                    <p class="text-off-white/50 mt-4 italic">Sin gustos definidos</p>
                @endif

                @auth
                    @if(auth()->id() === $profile->user_id)
                        <div class="mt-6">
                            <a href="{{ route('profile.edit', $profile->id) }}" 
                               class="bg-blood-red text-off-white px-4 py-2 rounded hover:bg-vivid-red transition">
                                Editar Perfil
                            </a>
                        </div>
                    @endif
                @endauth
            </div>
        </div>

        <!-- Sección de publicaciones -->
        <h2 class="text-4xl font-bold text-center text-off-white mb-12 drop-shadow-md">Publicaciones de {{ $profile->user->name }}</h2>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($profile->posts as $post)
            <div class="bg-carbon rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 overflow-hidden">
                
                @php
                    $thumbnailPath = $post->file && Storage::disk('public')->exists($post->file)
                                     ? Storage::url($post->file)
                                     : null;
                @endphp

                @if($thumbnailPath)
                    <img src="{{ $thumbnailPath }}" alt="{{ $post->title }}" class="w-full h-64 object-cover">
                @else
                    <div class="w-full h-64 flex items-center justify-center bg-gray-700 text-off-white/70">
                        Sin vista previa
                    </div>
                @endif

                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2 text-off-white">{{ $post->title }}</h3>
                    <p class="text-off-white/80 mb-4">{{ Str::limit($post->description, 120) }}</p>

                    <p class="text-sm text-off-white/60 mb-2">
                        Publicado por: 
                        <span class="font-medium">{{ $profile->user->name ?? 'Desconocido' }}</span>
                    </p>

                    @if($thumbnailPath)
                        <a href="{{ route('posts.show', $post->id) }}" 
                           class="inline-block bg-blood-red text-off-white px-4 py-2 rounded hover:bg-vivid-red transition">
                           Leer más
                        </a>
                    @else
                        <span class="text-off-white/60">Archivo no disponible</span>
                    @endif
                </div>
            </div>
            @empty
            <p class="text-center text-off-white/60 mt-12">Este usuario aún no ha publicado nada.</p>
            @endforelse
        </div>
    </div>
@endsection
