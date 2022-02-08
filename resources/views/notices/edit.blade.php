<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl">
            {{ __('Crear') }}
        </h2>
    </x-slot>

    <section class="container">
        @includeif('partials.errors')
        <div class="card ">
            <div class="card-header">
                <span class="card-title">Create Notice</span>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('notices.update', $notice->id) }}" role="form" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    @csrf

                    @include('notice.form')

                </form>
            </div>
        </div>
    </section>
</x-app-layout>





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
