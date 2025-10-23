@extends('layouts.app')

@section('title', 'Crear Post')

@section('content')
<!-- Fondo semitransparente para dar efecto modal -->
<div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">

    <!-- Ventana modal compacta -->
    <div class="w-full max-w-md bg-carbon rounded-xl shadow-lg text-off-white p-6 relative">

        <!-- Header con botón cerrar/regresar -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold drop-shadow-md">Nuevo Post</h2>
            <a href="{{ route('posts.index') }}" class="text-off-white hover:text-vivid-red transition">
                <!-- Icono de X -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </a>
        </div>

        <!-- Errores -->
        @if ($errors->any())
            <div class="mb-4 p-3 bg-blood-red/80 text-off-white rounded text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario -->
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- Título -->
            <div>
                <label for="title" class="block mb-1 font-semibold text-sm">Título</label>
                <input type="text" name="title" id="title" 
                       class="w-full px-3 py-2 rounded bg-steel-gray text-off-white border border-steel-gray focus:border-vivid-red focus:outline-none text-sm" 
                       value="{{ old('title') }}" placeholder="Título del post">
            </div>

            <!-- Descripción -->
            <div>
                <label for="description" class="block mb-1 font-semibold text-sm">Descripción</label>
                <textarea name="description" id="description" rows="3"
                          class="w-full px-3 py-2 rounded bg-steel-gray text-off-white border border-steel-gray focus:border-vivid-red focus:outline-none text-sm" 
                          placeholder="Descripción">{{ old('description') }}</textarea>
            </div>

            <!-- PDF -->
            <div>
                <label for="file" class="block mb-1 font-semibold text-sm">Archivo PDF</label>
                <input type="file" name="file" id="file" accept="application/pdf"
                       class="w-full text-off-white file:bg-blood-red file:text-off-white file:px-3 file:py-1 file:rounded hover:file:bg-vivid-red transition text-sm">
            </div>

            <!-- Miniatura -->
            <div>
                <label for="thumbnail" class="block mb-1 font-semibold text-sm">Miniatura (opcional)</label>
                <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                       class="w-full text-off-white file:bg-blood-red file:text-off-white file:px-3 file:py-1 file:rounded hover:file:bg-vivid-red transition text-sm">
            </div>

            <!-- Botón enviar -->
            <div class="text-center mt-2">
                <button type="submit" 
                        class="bg-blood-red hover:bg-vivid-red transition px-6 py-2 rounded font-bold text-off-white drop-shadow-sm text-sm">
                    Crear Post
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
