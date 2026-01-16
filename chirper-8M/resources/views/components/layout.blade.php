<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '8M-Chirper' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-blue-600 text-white p-4">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-2xl font-bold">{{ $title ?? '8M-Chirper' }}</h1>
        </div>
    </header>

    <header class="bg-blue-600 text-white p-4">
    <div class="max-w-4xl mx-auto flex justify-between items-center">
        <h1 class="text-2xl font-bold">8M-Chirper</h1>
        
        <div class="flex items-center gap-4">
            @auth
                <!-- Usuario autenticado -->
                <span class="text-sm">{{ auth()->user()->name }}</span>
                <form method="POST" action="/logout" class="inline">
                    @csrf
                    <button type="submit">Cerrar Sesión</button>
                </form>
            @else
                <!-- Usuario invitado -->
                <a href="/login">Iniciar Sesión</a>
                <a href="/register">Registrarse</a>
            @endauth
        </div>
    </div>
</header>


    <main class="py-8">
        {{ $slot }}
    </main>

    <footer class="bg-gray-800 text-white p-4 mt-8">
        <div class="max-w-4xl mx-auto text-center">
            <p>&copy; {{ date('Y') }} 8M-Chirper</p>
        </div>
    </footer>
</body>
</html>
