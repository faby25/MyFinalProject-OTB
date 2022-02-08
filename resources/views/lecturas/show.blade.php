@extends('layouts.app')

@section('template_title')
    {{ $lectura->name ?? 'Show Lectura' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Lectura</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('lecturas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Meter Id:</strong>
                            {{ $lectura->meter_id }}
                        </div>
                        <div class="form-group">
                            <strong>Detalle:</strong>
                            {{ $lectura->detalle }}
                        </div>
                        <div class="form-group">
                            <strong>Lecturaant:</strong>
                            {{ $lectura->LecturaANT }}
                        </div>
                        <div class="form-group">
                            <strong>Lecturaact:</strong>
                            {{ $lectura->LecturaACT }}
                        </div>
                        <div class="form-group">
                            <strong>Totalcubos:</strong>
                            {{ $lectura->TotalCubos }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
