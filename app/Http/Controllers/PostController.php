<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\PdfToImage\Pdf;

class PostController extends Controller
{
    /**
     * Mostrar todos los posts.
     */
    public function index()
    {
        $posts = Post::with('profile.user')->latest()->paginate(9);
        return view('posts.index', compact('posts'));
    }

    /**
     * Mostrar el formulario para crear un nuevo post.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Guardar un nuevo post con PDF y miniatura.
     */
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|mimes:pdf|max:50000', // hasta 50 MB
            'thumbnail' => 'nullable|image|max:10240', // miniatura opcional hasta 10 MB
        ]);

        // Guardar PDF en storage/app/public/pdfs
        $pdfPath = $request->file('file')->store('pdfs', 'public');

        // Nombre de la miniatura
        $thumbnailName = Str::random(10) . '.jpg';
        $thumbnailRelativePath = 'thumbnails/' . $thumbnailName;

        try {
            // Generar miniatura de la primera página del PDF
            $pdf = new \Spatie\PdfToImage\Pdf(Storage::disk('public')->path($pdfPath));
            $pdf->setPage(1)
                ->saveImage(Storage::disk('public')->path($thumbnailRelativePath));
        } catch (\Exception $e) {
            return back()->withErrors('No se pudo generar la miniatura del PDF. Error: ' . $e->getMessage());
        }

        // Obtener perfil del usuario
        $profile = Auth::user()->profile;
        if (!$profile) {
            return back()->withErrors('El usuario no tiene perfil asignado.');
        }

        // Crear el post
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'file' => $pdfPath,
            'thumbnail' => $thumbnailRelativePath,
            'profile_id' => $profile->id,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post creado con éxito.');
    }


    /**
     * Mostrar un post específico.
     */
    public function show(Post $post)
    {
        $post->load('profile.user');
        return view('posts.show', compact('post'));
    }

    /**
     * Mostrar el formulario para editar un post.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Actualizar un post existente.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|mimes:pdf|max:10000',
        ]);

        $data = $request->only('title', 'description');

        if ($request->hasFile('file')) {
            $pdfPath = $request->file('file')->store('pdfs', 'public');

            $thumbnailName = Str::random(10) . '.jpg';
            $thumbnailRelativePath = 'thumbnails/' . $thumbnailName;

            try {
                $pdf = new Pdf(Storage::disk('public')->path($pdfPath));
                $pdf->setPage(1)
                    ->saveImage(Storage::disk('public')->path($thumbnailRelativePath));
            } catch (\Exception $e) {
                return back()->withErrors('No se pudo generar la miniatura del PDF. Error: ' . $e->getMessage());
            }

            $data['file'] = $pdfPath;
            $data['thumbnail'] = $thumbnailRelativePath;
        }

        $post->update($data);

        return redirect()->route('posts.show', $post)->with('success', 'Post actualizado con éxito.');
    }

    /**
     * Eliminar un post.
     */
    public function destroy(Post $post)
    {
        // Eliminar archivos físicos
        Storage::disk('public')->delete([$post->file, $post->thumbnail]);

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post eliminado con éxito.');
    }
}
