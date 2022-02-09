<x-app-layout>
    <x-slot name="header">
      <div class="col float-left">
        <h2 class="font-bold text-xl">
            {{'Detalles del Post' }}
        </h2>
      </div>

     <div class="col float-right">

       <a class="btn btn-primary float-right" href="{{ url('posts') }}"> Volver</a>

    </div>
  </x-slot>

  <section class="container">
      @include('posts.detail')
  </section>
</x-app-layout>
