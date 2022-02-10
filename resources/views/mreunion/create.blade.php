<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl">
            
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-header">{{ __('Registro de Multa') }}</div>
          
            <form class="card-blue" action="mreunion" method="post">
                @csrf
                <div class="card-body">
                <div class="row mb-3">
                    <label for="descripcion" class="col-md-4 col-form-label text-md-end">{{ __('Detalle de la Multa ::') }}</label>
                
                <div class="col-md-6">
                    <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ old('descripcion') }}" required autocomplete="descripcion" autofocus>
                    @error('descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div><input type="hidden" id="user_id" name="user_id" value="{{$users->id}}"></div>
                </div>

                <div style="text-align: center">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                    <a href="mreunion" class="btn btn-secondary">Cancelar</a>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
