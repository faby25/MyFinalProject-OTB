<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl">
            
        </h2>
    </x-slot>

        <div class="card"> 
            <div class="card-header">{{ __('Registro de Tarifa Consumo') }}</div>

            <div class="card-body"> 

                <form class="card-blue" action="tconsumo" method="post">

                    @csrf
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-end">{{ __('Descripción') }}</label>

                            <div class="col-md-6">
                                <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ old('descripcion') }}" required autocomplete="descripcion"
                                autofocus>
                                @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="cubos_ini" class="col-md-4 col-form-label text-md-end">{{ __('Cubos_INI') }}</label>

                            <div class="col-md-6">
                                <input id="cubos_ini" type="number" class="form-control @error('cubos_ini') is-invalid @enderror" name="cubos_ini" value="{{ old('cubos_ini') }}" required autocomplete="cubos_ini" autofocus>

                                @error('cubos_ini')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="cubos_fin" class="col-md-4 col-form-label text-md-end">{{ __('Cubos_FIN') }}</label>

                            <div class="col-md-6">
                                <input id="cubos_fin" type="number" class="form-control @error('cubos_fin') is-invalid @enderror" name="cubos_fin" value="{{ old('cubos_fin') }}" required autocomplete="cubos_fin" autofocus>

                                @error('cubos_fin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="monto" class="col-md-4 col-form-label text-md-end">{{ __('Monto') }}</label>

                            <div class="col-md-6">
                                <input id="monto" type="text" class="form-control @error('monto') is-invalid @enderror" name="monto" value="{{ old('monto') }}" required autocomplete="monto" autofocus>

                                @error('monto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    
                        <div style="text-align: center;">

                            <input type="submit" value="Guardar Datos" class="btn btn-primary">

                            <a href="/tconsumo" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>    {{-- </div> --}}
  {{-- </section> --}}
</x-app-layout>
