@extends('layouts.app')

@section('template_title')
    {{ $taporte->name ?? 'Show Taporte' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Taporte</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('taportes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $taporte->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Monto:</strong>
                            {{ $taporte->monto }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
