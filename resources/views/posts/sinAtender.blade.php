<x-app-layout>
    <x-slot name="header">
      <div class="col float-left">
        <h2 class="font-bold text-xl">
            {{'Buzon de Reclamos y/o Sugerencias que solicitan atención' }}
        </h2>
      </div>
      <a class="btn btn-primary float-right" href="{{ url('dashboard') }}"> Volver</a>

  </x-slot>

  <section class="container">
    @php
      $posts=App\Models\Post::all();
    @endphp
    @foreach ($posts as $post )
      @if (!$post->atendido)

        @include('posts.detail')

      @endif
    @endforeach
  </section>
</x-app-layout>
