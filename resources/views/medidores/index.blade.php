<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl">
            {{ __('Asignacion de Medidor') }}
        </h2>
    </x-slot>

    @php
    $meters = App\Models\Meter::all();
    @endphp
    
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Datos de Socio') }}</div>

                <div class="card-body">

<form action="medidor.{{$user->id}}" method="post">
<div>
    <p><strong>Carnet de Identidad :: </strong>{{ $user->ci }}</p>
    <p><strong>Nombre Completo :: </strong>{{ $user->name }} {{ $user->lastnameM }} {{ $user->lastnameF }}</p>
</div>
</form>
<div class="card-header">{{ __('Datos de Medidor') }}</div>

<form action="medidor" method="post">
<div>
    @csrf
    <div class="row mb-3">
        <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre de Medidor ::') }}</label>

        <div class="col-md-6">
            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

            @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="direccion" class="col-md-4 col-form-label text-md-end">{{ __('Direccion ::') }}</label>

        <div class="col-md-6">
            <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion" autofocus>

            @error('direccion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <input type="hidden" name="user_id" value="{{ $user->id}}" id="user_id">
</div>

<div class="card-header">{{ __() }}</div>
<div class="card-header">{{ __() }}</div>

<input type="submit" value="Adicionar Medidor" class="btn btn-primary">
<a href="user" class="btn btn-secondary">Cancelar</a>

</form>

<div class="card">
    <div class="card-body">

<table class="table table-light" id="tmulta">
    <thead class="thead-ligth">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Dirección</th>
        </tr>
    </thead>
    <tbody>

        @foreach ( $meters as $medidor )
        @if ($medidor->user_id == $user->id)

        <tr>
            <td>{{ $medidor->id }}</td>
            <td>{{ $medidor->nombre }}</td>
            <td>{{ $medidor->direccion }}</td>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>
</div>
</div>

</form>

</x-app-layout>
