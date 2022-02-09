<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl"></h2>
    </x-slot>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Datos de Medidor') }}
                    </div>
                    <div class="px-3">
                        <p><strong>Nombre Usuario:: </strong>{{ $meter->user->name }} {{ $meter->user->lastnameF }} {{ $meter->user->lastnameM }}</p>
                        <p><strong>Medidor :: </strong>{{ $meter->nombre }}</p>
                        <p><strong>Dirección :: </strong>{{ $meter->direccion }} </p>
                    </div>
                    <div class="card-body">
                        <div class="card">

                            <form class="card-blue" action="lectura" method="post">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="lectura" class="col-md-4 col-form-label text-md-end">{{ __('Lectura ::') }}</label>

                                        <div class="col-md-6">
                                            <input id="lectura" type="number" class="form-control @error('lectura') is-invalid @enderror"
                                                   name="lectura" value="{{ old('lectura') }}" required autocomplete="lectura" autofocus>
                                            @error('lectura')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <input value="{{$lect->lectura}}" id="ulect" name="ulect" type="hidden">
                                    @csrf
                                    <div>
                                        <input id="meter_id" value="{{$meter->id}}" type="hidden" name="meter_id">
                                    </div>
                                    <div class="row mb-3">
                                      {{ Form::label('Escribir Detalle ::') }}
                                      <input  id="detalle" name="detalle" class="form-control @error('detalle') is-invalid @enderror"
                                       value="{{ old('detalle') }}" required autocomplete="detalle" autofocus>
                                      @error('detalle')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror

                                    </div>
                                    <div style="text-align: center">
                                        <input type="submit" class="btn btn-primary" value="Guardar Lectura" id="glectura" name="glectura">
                                        <a href="lectura" class="btn btn-secondary">Cancelar</a>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
