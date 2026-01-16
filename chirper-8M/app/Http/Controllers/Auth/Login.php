<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class Login extends Controller
{
    /**
     * Show the login form.
     */
    public function show(): View
    {
        return view('auth.login');
    }

    /**
     * Handle the incoming login request.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        // Validar datos
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Intentar autenticarse
        if (Auth::attempt($validated, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect('/')->with('success', '¡Bienvenido/a de vuelta!');
        }

        // Si la autenticación falla
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }
}
