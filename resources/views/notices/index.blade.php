  <x-app-layout>
      <x-slot name="header">
          <div class="col-sm-6">
              <h2 class="font-bold text-xl">
                  {{ __('Lista de notificaciones') }}
              </h2>
          </div>
      </x-slot>

      <div class="card">
          @if (Auth::user()->hasAnyRole('Admin', 'Cajero','Lecturador'))
            @php
            $meters = App\Models\Meter::all();
            @endphp
          @else
            @php
            $meters = App\Models\Meter::where('user_id', auth()->id())->get();
            @endphp
          @endif
          <div class="card-header">
              <div class="form-group col-sm-6">
                  {{ Form::label('Seleccionar medidor') }}
                  <select class="form-control">
                      @foreach ($meters as $meter)
                      <option value="{{$meter->id}}" {{old('meter_id')==$meter->id ? 'selected':''}}>
                          {{ucwords($meter->nombre)}}
                      </option>
                      @endforeach
                  </select>
              </div>
          </div>
          <div class="card-body">
              <table id="example1" class="table table-hover table-striped">
                  <thead>
                      <tr>
                          <th>Medidor</th>
                          <th>Periodo</th>
                          <th>Consumo(m3)</th>
                          <th>Estado</th>
                          <th></th>
                      </tr>
                  </thead>
                  <tbody>
                      @php
                      $notices=App\Models\Notice::all();
                      @endphp
                      @foreach ($meters as $meter)
                        @foreach ($notices as $notice)

                        @if ($notice->lectura->meter_id == $meter->id)
                        <tr>
                            <td value="{{$notice->id}}">{{ $notice->lectura->meter->nombre }}</td>
                            <td>{{ $notice->created_at }}</td>
                            <td>{{ $notice->lectura->consumo}}</td>
                            <td>{{-- {{ $notice->pagado }} --}}
                                @if ($notice->pagado)
                                {{ "pagado" }}
                                @else
                                {{ "pendiente" }}
                                @endif
                            </td>
                            {{-- {{ $post->thumbnail }} --}}
                            {{-- <img src="{{  asset('./storage/'.$post->thumbnail) }}" alt="" class="rounded-xl" width="100"> --}}
                            {{-- {{$img = Image::make($path)->resize($width, $height)->save($path)}} --}}
                            <td>
                                <a class="btn btn-sm btn-primary " href="notice.show.{{$notice->id}}"><i class="fa fa-fw fa-eye"></i>Recibo</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                      @endforeach

                  </tbody>
              </table>
          </div>
      </div>
  </x-app-layout>
