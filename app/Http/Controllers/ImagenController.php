<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Laravel\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $manager = new ImageManager(new Driver());
        $imagen = $request->file('file');
        $nombreImagen = Str::uuid() . "." . $imagen->extension();
        $imagenServidor = $manager->read($imagen);
        $imagenServidor->scale(1000, 1000);
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        $imagenServidor->save($imagenPath);
        return response()->json(['imagen' => $nombreImagen ]);
    }
}
