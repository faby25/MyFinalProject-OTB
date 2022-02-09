<x-app-layout>
    <x-slot name="header">
        <div class="col-sm-6">
            <h2 class="font-bold text-xl">
                {{ __('Lista de Posts, Reclamos o Sugerencias') }}
            </h2>
        </div>
    </x-slot>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Posts de socios</h3>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="card-body">
            @php $posts=\App\Models\Post::all();@endphp
            <table id="example1" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Categoría</th>
                        <th>Titulo</th>
                        <th>Detalle</th>
                        <th>Estado</th>
                        <th>Archivos</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    @if (!$post->user->is_admin)
                    <tr>
                        <td value="{{ $post->category_id}}">{{ $post->category->name}}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->body }}</td>
                        <td>
                            @if ($post->atendido)
                            {{ "Atendido" }}
                            @else
                            {{ "Sin Atender" }}
                            @endif
                        </td>
                        <td>
                          <img src="{{  asset('./storage/'.$post->thumbnail) }}" alt="" class="rounded-xl" width="100">
                        </td>
                        <td>
                          
                            <a class="btn btn-sm btn-primary " href="posts.show.{{$post->slug}}"><i class="fa fa-fw fa-eye"></i> Ver</a>

                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
