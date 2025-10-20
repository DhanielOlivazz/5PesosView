@extends('layouts.app')
@extends('layouts.navbar')

@section('title', 'Editar Perfil')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-12">
    
    <!-- Header -->
    <div class="bg-white rounded-3xl shadow-lg p-8 mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Editar Perfil</h1>
        <p class="text-gray-600">Actualiza tu información personal</p>
    </div>

    <!-- Formulario -->
    <div class="bg-white rounded-3xl shadow-lg p-8">
        <!-- Mensajes -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Foto de perfil -->
            <div class="mb-8">
                <label class="block text-gray-700 font-semibold mb-4">Foto de Perfil</label>
                
                <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-8">
                    <!-- Preview -->
                    <div class="text-center">
                        <img id="picturePreview" 
                             src="{{ $profile->picture ? asset('storage/' . $profile->picture) : asset('Images/default.svg') }}" 
                             alt="Preview" 
                             class="w-32 h-32 rounded-full border-4 border-red-500 object-cover mx-auto">
                        <p class="text-sm text-gray-500 mt-2">Vista previa</p>
                    </div>

                    <!-- Input file -->
                    <div class="flex-1">
                        <input type="file" 
                               id="picture" 
                               name="picture" 
                               accept="image/*"
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100"
                               onchange="previewImage(this)">
                        <p class="text-xs text-gray-500 mt-2">Formatos: JPG, JPEG, PNG. Máx: 2MB</p>
                    </div>
                </div>
            </div>

            <!-- Descripción -->
            <div class="mb-6">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Descripción</label>
                <textarea id="description" 
                          name="description" 
                          rows="4" 
                          maxlength="500"
                          class="w-full px-4 py-3 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition"
                          placeholder="Cuéntanos algo sobre ti...">{{ old('description', $profile->description) }}</textarea>
                <div class="text-right text-sm text-gray-500 mt-1">
                    <span id="charCount">{{ strlen($profile->description) }}</span>/500 caracteres
                </div>
            </div>

            <!-- Ubicación -->
            <div class="mb-6">
                <label for="location" class="block text-gray-700 font-semibold mb-2">Ubicación</label>
                <input type="text" 
                       id="location" 
                       name="location" 
                       value="{{ old('location', $profile->location) }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition"
                       placeholder="¿De dónde eres?">
            </div>

            <!-- Gustos -->
            <div class="mb-8">
                <label class="block text-gray-700 font-semibold mb-4">Gustos</label>
                
                @php
                    $commonTastes = ['Anime', 'Manga', 'Videojuegos', 'Cine', 'Música', 'Deportes', 'Tecnología', 'Cocina', 'Viajes', 'Lectura', 'Arte', 'Fotografía', 'Programación', 'Ciencia', 'Naturaleza'];
                    $currentTastes = $profile->tastes ?? [];
                @endphp

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3">
                    @foreach($commonTastes as $taste)
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="checkbox" 
                                   name="tastes[]" 
                                   value="{{ $taste }}"
                                   class="rounded border-gray-300 text-red-600 focus:ring-red-500"
                                   {{ in_array($taste, $currentTastes) ? 'checked' : '' }}>
                            <span class="text-gray-700">{{ $taste }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- Botones -->
            <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                <a href="{{ route('profile.show', $profile->id) }}" 
                   class="bg-gray-200 text-gray-800 px-6 py-3 rounded-2xl hover:bg-gray-300 transition text-center font-semibold">
                   Cancelar
                </a>
                <button type="submit" 
                        class="bg-red-500 text-white px-6 py-3 rounded-2xl hover:bg-red-600 transition flex-1 text-center font-semibold">
                    Actualizar Perfil
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Preview de imagen
    function previewImage(input) {
        const preview = document.getElementById('picturePreview');
        const file = input.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }

    // Contador de caracteres
    document.getElementById('description').addEventListener('input', function() {
        document.getElementById('charCount').textContent = this.value.length;
    });
</script>
@endsection