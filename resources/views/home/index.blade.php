<x-layout>
    @include('home.header')
    <main class="max-w-6xl mx-auto mt-3 lg:mt-8 space-y-3">
        @if($posts->count())
            <x-posts.grid :posts="$posts" />
        @else
            <p class="text-center">No se encontro ningun post, vuelva más tarde</p>
        @endif
    </main>
    @include('home.footer')
</x-layout>
