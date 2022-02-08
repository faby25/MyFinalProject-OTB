<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl">
            {{ __('Crear un nuevo Post') }}
        </h2>
    </x-slot>

    <section class="container">
        @includeif('partials.errors')

        <div class="card card-default">
            <form class="card-blue" action="/posted" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="card-header ">
                    <span class="card-title">Postear un Reclamo o Sugerencia</span>
                </div>
                <div class="card-body mt-2">
                    <label>*DATOS DE USUARIO</label>
                    @php
                    $users =\App\Models\User::all();
                    @endphp
                    <div class="row">
                        <div class="col-sm-6 ">
                          {{ Form::label('Usuario:') }}
                          {{ Form::label(Auth::user()->username)}}
                        </div>
                        <div class="col-sm-6 form-group">
                          {{ Form::label('Email:') }}
                          {{ Form::label(Auth::user()->email  ) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            {{ Form::label('Nombre(s):') }}
                            {{ Form::label(Auth::user()->name) }}
                        </div>
                        <div class="col-sm-6 form-group">
                            {{ Form::label('Apellidos:') }}
                            {{ Form::label(Auth::user()->name ) }}
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body mt-2">
                @include('posts.form')

                </div>
            </form>
        </div>
    </section>
</x-app-layout>
