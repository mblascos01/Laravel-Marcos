<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BuloController extends Controller{

    public function store(Request $request)
    {
    $validated = $request->validate([
        'texto' => 'required|string|max:500',
        'texto_desmentido' => 'required|string|max:1000',
    ]);

    // Crear meme asociado al usuario autenticado
    auth()->user()->bulo()->create([
        'texto' => $validated['texto'],
        'texto_desmentido' => $validated['texto_desmentido'],
        'fecha_subida' => now(),
    ]);

    return redirect('/')->with('success', '¡Tu bulo ha sido publicado!');
}

     use AuthorizesRequests;

    public function edit(Bulo $bulo)
    {
        // Verifica si el usuario puede actualizar
        $this->authorize('update', $bulo);

        return view('bulos.edit', compact('bulo'));
    }

    public function update(Request $request, Bulo $bulo)
    {
        $this->authorize('update', $bulo);

        $validated = $request->validate([
            'texto' => 'required|string|max:500',
            'texto_desmentido' => 'required|string|max:1000',
        ]);
        $bulo->update($validated);

        return redirect('/')->with('success', '¡Bulo actualizado!');
    }

    public function destroy(Bulo $bulo)
    {
        $this->authorize('delete', $bulo);

        $bulo->delete();

        return redirect('/')->with('success', '¡Bulo eliminado!');
    }
    //
}
