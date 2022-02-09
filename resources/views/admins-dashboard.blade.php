<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            {{ __('Buzon de Reclamos y Sugerencias de Socios.') }}
        </h2>
    </x-slot>
    <main>
        @php
        $posts=\App\Models\Post::all();
        @endphp
        @if($posts->count()>0)

            <x-posts-grid-socios :posts="$posts" />

        @else
            <p class="text-center mt-3">No se encontro ningun post, vuelva a ingrasar mas tarde</p>
        @endif

    </main>
</x-app-layout>
