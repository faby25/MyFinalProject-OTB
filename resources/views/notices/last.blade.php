<x-app-layout>
    <x-slot name="header">
        <div class="px-6 mx-3">
            <x-application-logo class="w-auto h-20" id="otbsuca.jpg" />
        </div>
        <div class="col text-center ">
            <h1 class="font-semibold text-2x1 uppercase">
                {{ __('Administración del servicio de agua potable') }}
            </h1>
            <h2 class="font-bold text-3xl">
                {{ __('S.A.P. O.T.B. SUCA') }}
            </h2>
        </div>
        <div class="px6 mx-3" style="right: 12px;">
            <x-application-logo class="w-auto h-20" id="otbsuca.jpg" />
        </div>
    </x-slot>

    <div class="card">

        <div class="card-body">
          @php
          $meters = App\Models\Meter::where('user_id', auth()->id())->get();
          $notices=App\Models\Notice::all();
          @endphp
          @foreach ($meters as $meter)
              @foreach ($notices as $notice)
                @if ($notice->lectura->meter_id == $meter->id)
                    @php
                      $last=$notice;
                    @endphp
                @endif
          @endforeach
          @endforeach
          @php
            $notice=$last;
          @endphp

          @include('notices.recibo')

            <div class="float-right">
                <a href="{{ url('create-pdf-file', $notice->id) }}" class="btn btn-primary">Imprimir</a>
                <a href="notices" class="btn btn-primary">Volver</a>
            </div>

        </div>
</x-app-layout>

    {{-- <form class="card-blue" action="create-pdf-file" method="GET" role="form" enctype="multipart/form-data">
    @csrf --}}
    {{-- <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary pull-right">Imprimir</button>
    </div> --}}
    {{-- </form> --}}
