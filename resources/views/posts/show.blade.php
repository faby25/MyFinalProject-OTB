<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl">
            {{'Detalles del Post' }}
        </h2>
    </x-slot>

    <section class="container">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <span class="card-title">
                        {{ $post->title ?? 'Detalles del Post' }}
                    </span>
                </div>
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ url('posts') }}"> Atras</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <strong>Posteado Por:</strong>
                    {{ $post->user->name }}
                </div>
                <div class="form-group">
                    <strong>Category:</strong>
                    {{ $post->category->name }}
                </div>
                {{-- <div class="form-group">
                    <strong>Slug:</strong>
                    {{ $post->slug }}
                  </div> --}}
                <div class="form-group">
                    <strong>Title:</strong>
                    {{ $post->title }}
                </div>
                {{-- <div class="form-group">
                            <strong>Excerpt:</strong>
                            {{ $post->excerpt }}
                  </div> --}}
                <div class="form-group">
                    <strong>Toda la Descripcion:</strong>
                    {{ $post->body }}
                </div>
                <div class="form-group">
                    <strong>Archivos Adjuntos:</strong>
                    <img src="{{asset('./storage/'.$post->thumbnail)}}" alt="No se encontro nngun archovo" class="rounded-xl">
                    {{-- {{ $post->thumbnail ??  "No se encontro nngun archovo "}} --}}
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
