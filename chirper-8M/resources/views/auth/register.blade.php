
<x-layout>
    <x-slot:title>
        Register
    </x-slot:title>
    <div class="min-h-screen flex items-center justify-center px-4 py-12 bg-gray-50">
        <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">
            <h1 class="text-2xl font-semibold text-slate-900 mb-6 text-center">Crear cuenta</h1>

            <form method="POST" action="/register" class="space-y-5">
                @csrf

                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700" for="name">Nombre</label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="w-full rounded-lg border border-slate-200 px-4 py-3 text-slate-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 @error('name') border-red-400 ring-red-100 @enderror"
                        placeholder="John Doe"
                        required
                    >
                    @error('name')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700" for="email">Email</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full rounded-lg border border-slate-200 px-4 py-3 text-slate-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 @error('email') border-red-400 ring-red-100 @enderror"
                        placeholder="mail@example.com"
                        required
                    >
                    @error('email')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700" for="password">Contraseña</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="w-full rounded-lg border border-slate-200 px-4 py-3 text-slate-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 @error('password') border-red-400 ring-red-100 @enderror"
                        placeholder="••••••••"
                        required
                    >
                    @error('password')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700" for="password_confirmation">Confirmar contraseña</label>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        class="w-full rounded-lg border border-slate-200 px-4 py-3 text-slate-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                        placeholder="Repite tu contraseña"
                        required
                    >
                </div>

                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-colors"
                >
                    Crear cuenta
                </button>
            </form>

            <div class="mt-6 text-center text-sm text-slate-600">
                <span>¿Ya tienes cuenta?</span>
                <a href="/login" class="font-semibold text-blue-600 hover:text-blue-700">Inicia sesión</a>
            </div>
        </div>
    </div>
</x-layout>