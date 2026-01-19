## Iniciar sesión/Cerrar sesión

### 1. Crear la vista para el inicio de sesión
Crear el siguiente formulario en ```resources/views/auth/login.blade.php```
```html

<x-layout>
    <x-slot:title>
        Sign In
    </x-slot:title>

    <div class="hero min-h-[calc(100vh-16rem)]">
        <div class="hero-content flex-col">
            <div class="card w-96 bg-base-100">
                <div class="card-body">
                    <h1 class="text-3xl font-bold text-center mb-6">Welcome Back</h1>

                    <form method="POST" action="/login">
                        @csrf

                        <!-- Email -->
                        <label class="floating-label mb-6">
                            <input type="email"
                                   name="email"
                                   placeholder="[mail@example.com](<mailto:mail@example.com>)"
                                   value="{{ old('email') }}"
                                   class="input input-bordered @error('email') input-error @enderror"
                                   required
                                   autofocus>
                            <span>Email</span>
                        </label>
                        @error('email')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Password -->
                        <label class="floating-label mb-6">
                            <input type="password"
                                   name="password"
                                   placeholder="••••••••"
                                   class="input input-bordered @error('password') input-error @enderror"
                                   required>
                            <span>Password</span>
                        </label>
                        @error('password')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Remember Me -->
                        <div class="form-control mt-4">
                            <label class="label cursor-pointer justify-start">
                                <input type="checkbox"
                                       name="remember"
                                       class="checkbox">
                                <span class="label-text ml-2">Remember me</span>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-control mt-8">
                            <button type="submit" class="btn btn-primary btn-sm w-full">
                                Sign In
                            </button>
                        </div>
                    </form>

                    <div class="divider">OR</div>
                    <p class="text-center text-sm">
                        Don't have an account?
                        <a href="/register" class="link link-primary">Register</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
```

### 2. Crer los controladores
Necesitamos crear dos controladores, uno para el Login en ```Auth/Login```, y otro para el Logout en ```Auth/Logout```

```
php artisan make:controller Auth/Login --invokable

php artisan make:controller Auth/Logout --invokable
```

En ```app/Http/Controllers/Auth/Login.php```:
```php
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function __invoke(Request $request)
    {
        // Validar los campos
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intento de inicio de sesion
        if (Auth::attempt($credenciales, $request->boolean('recordarme'))) {
            // Regenerar la sesion para evitar fijacion de sesion
            $request->session()->regenerate();

            // Redirigir a la pagina deseada o al inicio
            return redirect()->intended('/')->with('success', '¡Bienvenido de nuevo!');
        }

        // Si el inicio de sesion falla, redirigir de vuelta con error
        return back()
            ->withErrors(['email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.'])
            ->onlyInput('email');
    }
}
```
Que hace este controlador:
- Valida los campos del formulario
- Valida si las credenciales coinciden
- Crea un nuevo ID de sesión para el usuario logueado
- Redirecciona con un mensaje exitoso si el intento de inicio de sesión ha sido exitoso
- Si el intento de inicio de sesión falla, vuelve a redirigir a la misma página de login, con un mensaje de error

En ```app/Http/Auth/Logout.php```:
```php
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logout extends Controller
{
    public function __invoke(Request $request)
    {
        Auth::logout();

        // Invalidar la sesión
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Has cerrado sesión correctamente.');
    }
}
```
Que hace este controlador:
- Elimina al usuario de la sesión
- Elimina los datos de la sesión, ID y datos persistentes
- Regenerar el token CSRF por seguridad

## 3. Crear las rutas

En ```routes/web.php``` añadir las siguientes rutas:

```php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;

// Ruta login
Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');

Route::post('/login', Login::class)
    ->middleware('guest');

// Ruta logout
Route::post('/logout', Logout::class)
    ->middleware('auth')
    ->name('logout');
```