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
}