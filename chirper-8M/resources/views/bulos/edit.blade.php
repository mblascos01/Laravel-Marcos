<x-layout>
    <x-slot:title>
        Editar Bulo
    </x-slot:title>

    <div class="max-w-2xl mx-auto px-4">
        <div class="bg-white rounded-lg shadow-md p-6 mt-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-semibold text-gray-800">Editar Bulo</h2>
                <a href="/" class="text-blue-600 hover:text-blue-800 transition-colors">
                    ← Volver
                </a>
            </div>

            <form method="POST" action="{{ route('bulos.update', $bulo) }}">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="texto" class="block text-sm font-medium text-gray-700 mb-2">
                        Texto del Bulo
                    </label>
                    <textarea
                        id="texto"
                        name="texto"
                        placeholder="Escribe el texto del bulo..."
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"
                        rows="3"
                        maxlength="255"
                        required
                    >{{ old('texto', $bulo->texto) }}</textarea>
                    @error('texto')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="texto_desmentido" class="block text-sm font-medium text-gray-700 mb-2">
                        Explicación/Desmentido
                    </label>
                    <textarea
                        id="texto_desmentido"
                        name="texto_desmentido"
                        placeholder="Escribe la explicación/desmentido..."
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"
                        rows="3"
                        maxlength="255"
                        required
                    >{{ old('texto_desmentido', $bulo->texto_desmentido) }}</textarea>
                    @error('texto_desmentido')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-3">
                    <a href="/" class="px-6 py-2 bg-gray-500 text-white font-medium rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors">
                        Cancelar
                    </a>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                        Actualizar Bulo
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
