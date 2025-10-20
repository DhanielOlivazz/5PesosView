<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile; // ✅ Importamos el modelo Profile
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Crear el usuario
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // ✅ Crear el perfil automáticamente al registrar al usuario
        Profile::create([
            'user_id'     => $user->id,
            'picture'     => 'default.svg',
            'description' => 'Nuevo usuario sin descripción aún.',
            'tastes'      => json_encode(['Sin definir']), // ✅ JSON válido
            'location'    => 'No especificada',
        ]);


        // Redirigir al login
        return redirect()->route('login.form')
    ->with('success', 'Registro exitoso. Se ha creado tu perfil automáticamente.');

    }
}
