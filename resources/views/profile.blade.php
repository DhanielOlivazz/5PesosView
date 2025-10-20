@extends('layouts.app')

@section('content')
    @include('layouts.navbar')

    <div class="max-w-7xl mx-auto px-4 py-12">

        <div class="bg-white rounded-3xl shadow-lg p-8 flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-8">

            <img src="{{ $profile->imageUrl }}" 
                alt="{{ $profile->user->name }}" 
                class="w-32 h-32 md:w-48 md:h-48 rounded-full border-4 border-red-500 object-cover">

            {{-- Información del usuario --}}
            <div class="flex-1 text-center md:text-left">
                <h1 class="text-3xl font-bold text-gray-800">{{ $profile->user->name }}</h1>

                @if($profile->location)
                    <p class="text-gray-500 mt-1">{{ $profile->location }}</p>
                @endif

                @if($profile->description)
                    <p class="text-gray-600 mt-3">{{ $profile->description }}</p>
                @endif

                {{-- Gustos --}}
                @php
                    $tastes = $profile->tastes ? json_decode($profile->tastes) : [];
                @endphp

                @if(count($tastes) > 0)
                    <p class="text-gray-600 mt-3 font-semibold">Gustos:</p>
                    <div class="flex flex-wrap mt-1 gap-2">
                        @foreach($tastes as $taste)
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">{{ $taste }}</span>
                        @endforeach
                    </div>
                @endif

                {{-- Botón de editar perfil --}}
                <div class="mt-4 flex flex-col sm:flex-row gap-4">
                    @auth
                        @if(auth()->id() === $profile->user_id)
                            <a href="{{ route('profile.edit',$profile->id) }}" 
                               class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600">
                               Editar Perfil
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>

        {{-- Posts del usuario --}}
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Posts de {{ $profile->user->name }}</h2>

            @if($profile->posts->count() > 0)
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($profile->posts as $post)
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition transform hover:-translate-y-1">
                            @if($post->file)
                                <img src="{{ asset('storage/'.$post->file) }}" class="w-full h-64 object-cover" alt="{{ $post->title }}">
                            @endif
                            <div class="p-6">
                                <h3 class="text-xl font-semibold">{{ $post->title }}</h3>
                                <p class="text-gray-600">{{ Str::limit($post->description, 120) }}</p>
                                <a href="{{ route('posts.show',$post->id) }}" 
                                   class="inline-block bg-red-500 text-white px-4 py-2 rounded mt-2 hover:bg-red-600">
                                   Leer más
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-center mt-6">Este usuario aún no ha publicado nada.</p>
            @endif
        </div>
    </div>
    <script>
        public function getImageUrlAttribute()
        {
            // Si hay imagen de usuario distinta a default.svg
            if ($this->picture && $this->picture !== 'default.svg') {
                return asset('storage/' . $this->picture);
            }

            // Fallback a default.svg
            return asset('images/default.svg');
        }

    </script>
@endsection
