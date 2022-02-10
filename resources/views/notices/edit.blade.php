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

            {{-- <form method="POST" action="{{ route('notices.update', $notice->id) }}" role="form" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                @csrf

                @include('notice.form')

            </form> --}}
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


{{-- Define the route

Route::post('visitas', 'VistaController@update');

Write the function the controller

public function update(Request $request)
{
    $visita = Visita::find($request->visitaID);
    $visita->confirmacao = 1;
    $visita->update();

    return redirect()->back()->with('message', 'visita updated');
} --}}
