@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100"
     style="background-image: url(Images/slanted-gradient.svg);
            background-repeat: repeat; 
            background-size: auto;">
    <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl p-8">
        <h3 class="text-3xl font-bold text-center text-black mb-6">Iniciar Sesión</h3>

        <!-- Errores -->
        @if ($errors->any())
            <div class="bg-red-600 text-white p-4 rounded mb-6">
                <ul class="list-disc pl-5 mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario -->
        <form method="POST" action="{{ route('login.submit') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-black mb-1 font-medium">Correo electrónico</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-3 rounded-xl bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            <div>
                <label for="password" class="block text-black mb-1 font-medium">Contraseña</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-3 rounded-xl bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            <button type="submit"
                class="w-full bg-red-500 hover:bg-red-600 transition text-white font-semibold py-3 rounded-xl shadow-lg">
                Ingresar
            </button>
        </form>

        <p class="mt-6 text-gray-400 text-center">
            ¿No tienes cuenta? 
            <a href="#" class="text-red-500 hover:underline">Regístrate</a>
        </p>
    </div>
</div>
@endsection
