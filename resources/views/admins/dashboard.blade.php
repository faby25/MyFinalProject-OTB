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
        @if($posts->count())
            <x-posts-grid-socios :posts="$posts" />
        @else
            <p class="text-center mt-3">No se encontro ningun post, vuelva a ingrasar mas tarde</p>
        @endif

        @sectionMissing('posts-grid-socios')
            <div class="pull-right mt-3">
                <p class="text-center">No se encontro ningun post, vuelva a ingrasar mas tarde</p>
            </div>
        @endif
    </main>
</x-app-layout>
