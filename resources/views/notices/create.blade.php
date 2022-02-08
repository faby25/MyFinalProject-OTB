<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl">
            {{ __('Crear') }}
        </h2>
    </x-slot>

    {{-- @section('content') --}}
    <section class="container">
        @includeif('partials.errors')
        {{-- <div class="card card-default"> --}}
            <div class="card ">
              <div class="card-header">
                        <span class="card-title">Create Notice</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('notifications/store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('notices.form')

                        </form>
                    </div>
        </div>
    </section>
{{-- @endsection --}}
</x-app-layout>
