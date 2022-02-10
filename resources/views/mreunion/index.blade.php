<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl">
            {{ __('Control de Asisitencia a Reunion') }}
        </h2>
    </x-slot>
    <div class="card">
            <div class="card-body">
                <table id="tconsumo" class="table table-hover table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th style="display: none">#</th>
                            <th>Carnet</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
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
                                <td>
                                    <a class="btn btn-sm btn-success" href="mreunion.edit.{{$user->id}}"><i class="fa fa-fw fa-highlighter"></i>Registrar Multa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</x-app-layout>
