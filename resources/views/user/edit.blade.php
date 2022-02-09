<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl">

        </h2>
    </x-slot>

    <div class="card">
        <div class="card-header">{{ __('Edicion de Socio') }}</div>
            <form method="POST" action="user.update.{{$user->id}}">
                @csrf
                {{ method_field('PATCH') }}
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="ci" class="col-md-4 col-form-label text-md-end">{{ __('Carnet de Identidad ::') }}</label>

                        <div class="col-md-6">
                            <input id="ci" type="text" value="{{ $user->ci }}"class="form-control @error('ci') is-invalid @enderror" name="ci" value="{{ old('ci') }}" required autocomplete="ci" autofocus>
                            @error('ci')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre ::') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                    </div>
                    <div class="row mb-3">
                        <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Nombre Usuario ::') }}</label>

                        <div class="col-md-6">
                            <input id="username" type="text" value="{{ $user->username }}" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="lastnameM" class="col-md-4 col-form-label text-md-end">{{ __('Apellido Paterno ::') }}</label>

                        <div class="col-md-6">
                            <input id="lastnameM" type="text" value="{{ $user->lastnameM }}" class="form-control @error('lastnameM') is-invalid @enderror" name="lastnameM" value="{{ old('lastnameM') }}" required autocomplete="lastnameM" autofocus>
                                @error('lastnameM')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="lastnameF" class="col-md-4 col-form-label text-md-end">{{ __('Apellido Materno ::') }}</label>

                        <div class="col-md-6">
                            <input id="lastnameF" type="text" value="{{ $user->lastnameF }}" class="form-control @error('lastnameF') is-invalid @enderror" name="lastnameF" value="{{ old('lastnameF') }}" required autocomplete="lastnameF" autofocus>
                                @error('lastnameF')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="telf" class="col-md-4 col-form-label text-md-end">{{ __('Telefono ::') }}</label>

                        <div class="col-md-6">
                            <input id="telf" type="text" value="{{ $user->telf }}" class="form-control  @error('telf') is-invalid @enderror" name="telf" value="{{ old('telf') }}" required autocomplete="telf" autofocus>
                                @error('telf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address ::') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" value="{{ $user->email }}" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                    </div>

                        <!--<div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->

                    <div><input type="hidden" name="password" id="password" value="{{ bcrypt('otb-suca') }}"></div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Actualizar Registro') }}
                            </button>
                            <a href="user" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
