<?php

namespace App\Http\Controllers;

use App\Models\Bulo;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BuloController extends Controller
{
    use AuthorizesRequests;

    public function create()
    {
        return view('bulos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'texto' => 'required|string|max:255',
            'texto_desmentido' => 'required|string|max:255',
        ]);
        
        auth()->user()->bulos()->create($validated);

        return redirect('/')->with('exito', '¡Bulo creado correctamente!');
    }

    public function edit(Bulo $bulo)
    {
        $this->authorize('update', $bulo);
        return view('bulos.edit', compact('bulo'));
    }

    public function update(Request $request, Bulo $bulo)
    {
        $this->authorize('update', $bulo);
        
        $validated = $request->validate([
            'texto' => 'required|string|max:255',
            'texto_desmentido' => 'required|string|max:255',
        ]);
        
        $bulo->update($validated);

        return redirect('/')->with('exito', '¡Bulo actualizado correctamente!');
    }

    public function destroy(Bulo $bulo)
    {
        $this->authorize('delete', $bulo);
        $bulo->delete();

        return redirect('/')->with('exito', '¡Bulo eliminado correctamente!');
    }
}