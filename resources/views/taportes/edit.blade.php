<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl">

        </h2>
    </x-slot>

    <section class="container">

            <div class="card">
                <div class="card-header">{{ __('Edicion de Aporte') }}</div>
                    <div class="card-body">
                        <form action="taporte.update.{{$taporte->id}}" method="post">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row mb-3">
                                <label for="descripcion" class="col-md-4 col-form-label text-md-end">{{ __('Descripción') }}</label>

                                <div class="col-md-6">
                                    <input id="descripcion" type="text" value="{{ $taporte->descripcion }}" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ old('descripcion') }}" required autocomplete="descripcion" autofocus>
                                    @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="monto" class="col-md-4 col-form-label text-md-end">{{ __('Monto') }}</label>
                                <div class="col-md-6">
                                    <input id="monto" type="number" value="{{ $taporte->monto }}" class="form-control @error('monto') is-invalid @enderror" name="monto" value="{{ old('monto') }}" required autocomplete="monto" autofocus>
                                    @error('monto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div style="text-align: center">
                                <input type="submit" class="btn btn-primary" value="Guardar Datos">
                                <a href="taporte" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
    </section>
</x-app-layout>
