@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="min-h-screen flex items-center justify-center relative overflow-hidden">

    {{-- Contenedor principal --}}
    <div class="relative w-full max-w-md bg-steel-gray/90 backdrop-blur-lg rounded-3xl shadow-2xl p-8 border border-steel-gray">
        <div class="text-center mb-8">
            <img src="https://manga-oni.com/public/archivos/grupos/465/portada.jpg?dt=1750029220"
                 alt="Logo" class="w-16 h-16 mx-auto rounded-full shadow-md">
            <h1 class="text-3xl font-bold mt-4">Bienvenido a 5 Pesos Team</h1>
            <p class="text-off-white/70 text-sm mt-1">Inicia sesión para continuar</p>
        </div>

        {{-- Errores --}}
        @if ($errors->any())
            <div class="bg-blood-red/20 text-vivid-red p-4 rounded-xl mb-6 border border-blood-red">
                <ul class="list-disc pl-5 mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulario --}}
        <form method="POST" action="{{ route('login.submit') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block mb-1 font-medium">Correo electrónico</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-3 rounded-xl bg-carbon placeholder-off-white/50 focus:outline-none focus:ring-2 focus:ring-vivid-red transition border border-steel-gray">
            </div>

            <div>
                <label for="password" class="block mb-1 font-medium">Contraseña</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-3 rounded-xl bg-carbon placeholder-off-white/50 focus:outline-none focus:ring-2 focus:ring-vivid-red transition border border-steel-gray">
            </div>

            <button type="submit"
                class="w-full bg-blood-red hover:bg-vivid-red transition font-semibold py-3 rounded-xl shadow-lg">
                Ingresar
            </button>
        </form>

        <p class="mt-6 text-off-white/70 text-center">
            ¿No tienes cuenta? 
            <a href="{{ route('register') }}" class="text-vivid-red font-semibold hover:underline">Regístrate</a>
        </p>
    </div>
</div>
@endsection