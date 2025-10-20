@extends('layouts.app')

@section('title', 'Perfil')

@section('content')
    @include('layouts.navbar')

    <div class="max-w-7xl mx-auto px-4 py-12">
        <!-- Tarjeta de perfil -->
        <div class="bg-white rounded-3xl shadow-lg p-8 flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-8">
            <img src="{{ $profile->picture ? asset('storage/' . $profile->picture) : asset('Images/default.svg') }}" 
                 alt="{{ $profile->user->name }}" 
                 class="w-32 h-32 md:w-48 md:h-48 rounded-full border-4 border-red-500 object-cover">

            <div class="flex-1 text-center md:text-left">
                <h1 class="text-3xl font-bold text-gray-800">{{ $profile->user->name }}</h1>

                @if($profile->location)
                    <p class="text-gray-500 mt-1">{{ $profile->location }}</p>
                @endif

                @if($profile->description)
                    <p class="text-gray-600 mt-3">{{ $profile->description }}</p>
                @else
                    <p class="text-gray-400 mt-3 italic">Sin descripción</p>
                @endif

                @if($profile->tastes && count($profile->tastes) > 0)
                    <p class="text-gray-700 mt-4 font-semibold">Gustos:</p>
                    <div class="flex flex-wrap gap-2 mt-2">
                        @foreach($profile->tastes as $taste)
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">{{ $taste }}</span>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-400 mt-4 italic">Sin gustos definidos</p>
                @endif

                @auth
                    @if(auth()->id() === $profile->user_id)
                        <div class="mt-6">
                            <a href="{{ route('profile.edit', $profile->id) }}" 
                               class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 transition">
                                Editar Perfil
                            </a>
                        </div>
                    @endif
                @endauth
            </div>
        </div>

        <!-- Sección de publicaciones -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Publicaciones de {{ $profile->user->name }}</h2>

            @if($profile->posts && $profile->posts->count() > 0)
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($profile->posts as $post)
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition transform hover:-translate-y-1">
                            @if($post->file)
                                <img src="{{ asset('storage/' . $post->file) }}" 
                                     class="w-full h-64 object-cover" 
                                     alt="{{ $post->title }}">
                            @endif

                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-gray-800">{{ $post->title }}</h3>
                                <p class="text-gray-600 mt-2">{{ Str::limit($post->description, 120) }}</p>

                                <a href="{{ route('posts.show', $post->id) }}" 
                                   class="inline-block bg-red-500 text-white px-4 py-2 rounded mt-4 hover:bg-red-600 transition">
                                    Leer más
                                </a>

                                <p class="text-gray-400 text-sm mt-2">
                                    {{ $post->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-center mt-6 italic">Este usuario aún no ha publicado nada.</p>
            @endif
        </div>
    </div>
@endsection
