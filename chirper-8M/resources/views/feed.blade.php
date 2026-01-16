<x-layout>
    <x-slot:title>
        Home Feed
    </x-slot:title>

    <div class="card bg-base-100 shadow mt-8" style="max-width: 600px; margin: auto;">
    <div class="card-body">
        <form method="POST" action="/bulos">
            @csrf
            <div class="form-control w-full mb-2">
                <textarea
                    name="texto"
                    placeholder="Escribe el texto del bulo..."
                    class="textarea textarea-bordered w-full resize-none"
                    rows="3"
                    maxlength="255"
                    required
                >{{ old('texto') }}</textarea>
                @error('texto')
                    <div class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="form-control w-full mb-2">
                <textarea
                    name="texto_desmentido"
                    placeholder="Escribe la explicación/desmentido..."
                    class="textarea textarea-bordered w-full resize-none"
                    rows="3"
                    maxlength="255"
                    required
                >{{ old('texto_desmentido') }}</textarea>
                @error('texto_desmentido')
                    <div class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="mt-4 flex items-center justify-end">
                <button type="submit" class="btn btn-primary btn-sm">
                    Publicar Bulo
                </button>
            </div>
        </form>
    </div>
</div>

@if (session('exito'))
    <div class="toast toast-top toast-center">
        <div class="alert alert-success animate-fade-out">
            <span>{{ session('exito') }}</span>
        </div>
    </div>
@endif


    <div class="max-w-4xl mx-auto px-4">
        <h1 class="text-3xl font-bold mt-8">Últimos Bulos</h1>

        <div class="space-y-8 mt-8 flex flex-col items-center">
            @forelse ($bulos as $bulo)
                <x-bulo-component :bulo="$bulo" />
            @empty
                <div class="hero py-12">
                    <div class="hero-content text-center">
                        <div>
                            <svg class="mx-auto h-12 w-12 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                            <p class="mt-4 text-base-content/60">¡No hay bulos todavía! Sé el primero en publicar uno.</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
