@extends('layouts.app')

@section('title', 'Registro')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-red-500">
    <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl p-8">
        <h3 class="text-3xl font-bold text-center text-black mb-6">Crear Cuenta</h3>

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
        <form method="POST" action="{{ route('register.submit') }}" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-black mb-1 font-medium">Nombre completo</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                    class="w-full px-4 py-3 rounded-xl bg-gray-100 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            <div>
                <label for="email" class="block text-black mb-1 font-medium">Correo electrónico</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-3 rounded-xl bg-gray-100 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            <div>
                <label for="password" class="block text-black mb-1 font-medium">Contraseña</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-3 rounded-xl bg-gray-100 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            <div>
                <label for="password_confirmation" class="block text-black mb-1 font-medium">Confirmar Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="w-full px-4 py-3 rounded-xl bg-gray-100 text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            <button type="submit"
                class="w-full bg-red-500 hover:bg-red-600 transition text-white font-semibold py-3 rounded-xl shadow-lg">
                Registrarse
            </button>
        </form>

        <p class="mt-6 text-gray-400 text-center">
            ¿Ya tienes cuenta? 
            <a href="{{ route('login.form') }}" class="text-red-500 hover:underline">Inicia sesión</a>
        </p>
    </div>
</div>
@endsection
