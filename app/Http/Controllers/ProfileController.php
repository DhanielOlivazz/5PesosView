<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Mostrar perfil del usuario autenticado
    public function myProfile()
    {
        $profile = Auth::user()->profile;

        if (!$profile) {
            abort(404, "Perfil no encontrado");
        }

        $profile->load('user', 'posts');
        return view('profile.show', compact('profile'));
    }

    // Mostrar cualquier perfil
    public function show(Profile $profile)
    {
        $profile->load('user', 'posts');
        return view('profile.show', compact('profile'));
    }

    // Editar perfil
    public function edit(Profile $profile)
    {
        if (Auth::id() !== $profile->user_id) {
            abort(403);
        }

        return view('profile.edit', compact('profile'));
    }

    // Actualizar perfil
    public function update(Request $request, Profile $profile)
    {
        if (Auth::id() !== $profile->user_id) {
            abort(403);
        }

        $data = $request->validate([
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable|string|max:500',
            'tastes' => 'nullable|array',
            'location' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('picture')) {
            $data['picture'] = $request->file('picture')->store('profiles', 'public');
        }

        $profile->update($data);

        return redirect()->route('profile.show', $profile->id)
                         ->with('success', 'Perfil actualizado correctamente.');
    }
}
