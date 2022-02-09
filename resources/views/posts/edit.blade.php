<x-app-layout>

    <x-slot name="header">
        <h2 class="font-bold text-xl">
            {{ __('Editar mi Post ') }}
        </h2>
    </x-slot>

    <section class="container">
        @includeif('partials.errors')

        <div class="card">
            <form class="card-blue" action="posts.update.{{$post->slug}}" method="Post" role="form" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <div class="card-header ">
                    <span class="card-title">  {{ __('Post: '.$post->title) }}</span>
                </div>
                <div class="card-body">
                  @include('posts.form')
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
