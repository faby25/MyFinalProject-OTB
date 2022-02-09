<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl">
            {{ __('Listado de Socios') }}
        </h2>
        {{-- <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css"> --}}
        <!-- Latest compiled and minified CSS -->
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> --}}
        <!-- Optional theme -->
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous"> --}}
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <!-- Jquery -->
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <!-- Datepicker Files -->
        <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
        <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-standalone.css')}}">
        <script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
        <!-- Languaje -->
        <script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
    </x-slot>

    <div class="card">
      <div class="card-header">
        <div class="float-left">
          <label for="fecha"  class="text-md-end">{{ __('Seleccione la fecha de Reunion') }}</label>
          <div class="input-group date" data-provide="datepicker">
              <input type="text" >
              <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
              </div>
          </div>
        </div>


          <div class="float-right">
              <a class="btn btn-primary btn-sm float-right" href="mreunion.create">
                Guardar Lista de Asistencia</a>
          </div>
      </div>

    </div>
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
                            <th>Asistencia</th>
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
                                    <input type="checkbox">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <script type="text/javascript">
            $('.date').datepicker({
               format: dd-mm-yyyy , language: "es"
             });
        </script>
</x-app-layout>
