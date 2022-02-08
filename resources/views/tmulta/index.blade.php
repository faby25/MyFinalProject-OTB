<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl">
            {{ __('Listado de Multas') }}
        </h2>
    </x-slot>
        @can('tmulta.create')          
        <a class="btn btn-primary" href="tmulta.create">Adicionar Multa</a>
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
                        @foreach ( $tmultas as $tmulta )
                            <tr>
                                <td style="display: none">{{ $tmulta->id }}</td>
                                <td>{{ $tmulta->descripcion }}</td>
                                <td>{{ $tmulta->monto }}</td>
                                <td>
                                    @can('tmulta.edit')
                                    <a class="btn btn-sm btn-success" href="tmulta.edit.{{$tmulta->id}}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                    @endcan
                                </td>
                                <td>
                                    @can('tmulta.destroy')
                                        <form action="tmulta.delete.{{$tmulta->id}}" method="post">
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