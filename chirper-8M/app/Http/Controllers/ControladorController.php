<?php

namespace App\Http\Controllers;

use App\Models\Bulo;
use Illuminate\Http\Request;

class ControladorController extends Controller
{
    public function index(){

        $bulos = Bulo::with('user')
            ->latest()
            ->take(50)
            ->get();

        /**
         * 
         *
         *$datos = 'titulo';

        *$datos_modelo = [
            *[
               * 'meme' => 'Esto es un meme del 8M',
                *'usuario' => 'usuario1'
            *],
            *[
             *   'meme' => 'Otro meme del 8M',
              *  'usuario' => 'usuario2'
            *]
        *];

        */

        return view('feed', ['bulos' => $bulos]);
    }

    public function guardar(Request $request)
{
    $validados = $request->validate([
        'texto' => 'required|string|max:255',
        'texto_desmentido' => 'required|string|max:255',
    ], [
        'texto.required' => 'El texto del bulo es obligatorio.',
        'texto.max' => 'El texto del bulo debe tener 255 caracteres o menos.',
        'texto_desmentido.required' => 'La explicación/desmentido es obligatoria.',
        'texto_desmentido.max' => 'La explicación debe tener 255 caracteres o menos.',
    ]);

    \App\Models\Bulo::create([
        'texto' => $validados['texto'],
        'texto_desmentido' => $validados['texto_desmentido'],
        'user_id' => null, // Se añadirá autenticación más adelante
    ]);

    return redirect('/')->with('exito', '¡Bulo publicado correctamente!');
}
}