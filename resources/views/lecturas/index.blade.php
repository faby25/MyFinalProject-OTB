<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl">
            {{ __('Lista de Medidores ') }}
        </h2>
    </x-slot>
    @php
    $meters = App\Models\Meter::all();
    @endphp
    <div class="card">
        <div class="card-body">
            <table id="tconsumo" class="table table-hover table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $meters as $meter )
                        <tr>
                            <td>{{ $meter->id }}</td>
                            <td>{{ $meter->nombre }}</td>
                            <td>{{ $meter->direccion }}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="lectura.edit.{{$meter->id}}">Lectura de Medidor</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
