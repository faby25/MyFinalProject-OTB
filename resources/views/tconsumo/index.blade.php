<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl">
            {{ __('Listado de Tarifas de Consumo') }}
        </h2>
    </x-slot>

    {{-- <section class="container"> --}}
        @can('tconsumo.create')    
        <a class="btn btn-primary" href="tconsumo.create">Adicionar Tarifa</a>
        @endcan
        <div class="card">
            <div class="card-body">
              <table id="tconsumo" class="table table-hover table-striped">

                {{-- <table class="table table-light" id="tconsumo"> --}}
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Descripcion</th>
                            <th>Cubos_Ini</th>
                            <th>Cubos_Fin</th>
                            <th>Monto</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $tconsumos as $tconsumo )

                        <tr>
                            <td>{{ $tconsumo->id }}</td>
                            <td>{{ $tconsumo->descripcion }}</td>
                            <td>{{ $tconsumo->cubos_ini }}</td>
                            <td>{{ $tconsumo->cubos_fin }}</td>
                            <td>{{ $tconsumo->monto }}</td>
                            <td>
                                @can('tconsumo.edit')
                                <a class="btn btn-sm btn-success" href="tconsumo.edit.{{$tconsumo->id}}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                @endcan
                            </td>
                            <td>
                                @can('tconsumo.destroy')
                                <form action="tmulta.delete.{{$tconsumo->id}}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Esta seguro de borrar el registro?')"><i class="fa fa-fw fa-trash"></i>Borrar</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- @stop --}}

        {{-- @section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}

{{-- @section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <script> console.log('Hi!'); </script>
    <script>
        $('#tconsumo').DataTable( {
        language: {
            url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json'
        }
    } );
    </script> --}}

    {{-- </section> --}}
</x-app-layout>
