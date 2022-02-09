<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl">
            {{ __('Listado de Aportes') }}
        </h2>
    </x-slot>
        @can('taporte.create')
        <a class="btn btn-primary" href="taporte.create">Adicionar Aporte</a>
        @endcan
        <div class="card">
            <div class="card-body">
                <table id="tconsumo" class="table table-hover table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th style="display: none">#</th>
                            <th>Descripcion</th>
                            <th>Monto</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $taportes as $taporte )
                            <tr>
                                <td style="display: none">{{ $taporte->id }}</td>
                                <td>{{ $taporte->descripcion }}</td>
                                <td>{{ $taporte->monto }}</td>
                                <td>
                                    @can('taporte.edit')
                                    <a class="btn btn-sm btn-success" href="taporte.edit.{{$taporte->id}}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                    @endcan
                                </td>
                                <td>
                                    @can('taporte.destroy')
                                        <form action="taporte.delete.{{$taporte->id}}" method="post">
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
</x-app-layout>
