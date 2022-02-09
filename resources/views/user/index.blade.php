
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl">
            {{ __('Listado de Socios') }}
        </h2>
    </x-slot>

        <div class="card">
          <div class="card-header">
            <div class="float-right">
              @can('user.create')
              <a href="user.create" class="btn btn-primary btn-sm float-right">Adicionar Socio</a>
              @endcan

            </div>

          </div>


            <div class="card-body">
                <table id="tconsumo" class="table table-hover table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th style="display: none">#</th>
                            <th>Carnet</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Telefono</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $users as $user )
                            <tr>
                                <td style="display: none">{{ $user->id }}</td>
                                <td>{{ $user->ci }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->lastnameM }}</td>
                                <td>{{ $user->lastnameF }}</td>
                                <td>{{ $user->telf }}</td>
                                <td>
                                    @can('user.edit')
                                    <a class="btn btn-sm btn-success" href="user.edit.{{$user->id}}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                    @endcan
                                </td>
                                <td>
                                    @can('user.destroy')
                                    <form action="tmulta.delete.{{$user->id}}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Esta seguro de borrar el registro?')"><i class="fa fa-fw fa-trash"></i>Borrar</button>
                                    </form>
                                    @endcan
                                </td>
                                <td>

                                    <a href="medidor.edit.{{$user->id}}"> Adicionar Medidor</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</x-app-layout>
