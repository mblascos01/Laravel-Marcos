<x-layout>
    <x-slot:title>
        Iniciar Sesión
    </x-slot:title>

    <div class="min-h-[calc(100vh-16rem)] flex items-center justify-center">
        <div class="w-96 bg-white rounded-lg shadow-lg">
            <div class="p-8">
                <h1 class="text-3xl font-bold text-center mb-6">Iniciar Sesión</h1>

                <form method="POST" action="/login">
                    @csrf

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-6">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" required>
                        @error('password')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Recordarme -->
                    <div class="mb-6 flex items-center">
                        <input type="checkbox" name="remember" id="remember" value="1">
                        <label for="remember" class="ml-2">Recuérdame</label>
                    </div>

                    <button type="submit" class="w-full">Iniciar Sesión</button>
                </form>

                <div class="mt-4 text-center">
                    <p>¿No tienes cuenta? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Regístrate</a></p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
