<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('meter_id') }}
            {{ Form::text('meter_id', $lectura->meter_id, ['class' => 'form-control' . ($errors->has('meter_id') ? ' is-invalid' : ''), 'placeholder' => 'Meter Id']) }}
            {!! $errors->first('meter_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('detalle') }}
            {{ Form::text('detalle', $lectura->detalle, ['class' => 'form-control' . ($errors->has('detalle') ? ' is-invalid' : ''), 'placeholder' => 'Detalle']) }}
            {!! $errors->first('detalle', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('LecturaANT') }}
            {{ Form::text('LecturaANT', $lectura->LecturaANT, ['class' => 'form-control' . ($errors->has('LecturaANT') ? ' is-invalid' : ''), 'placeholder' => 'Lecturaant']) }}
            {!! $errors->first('LecturaANT', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('LecturaACT') }}
            {{ Form::text('LecturaACT', $lectura->LecturaACT, ['class' => 'form-control' . ($errors->has('LecturaACT') ? ' is-invalid' : ''), 'placeholder' => 'Lecturaact']) }}
            {!! $errors->first('LecturaACT', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('TotalCubos') }}
            {{ Form::text('TotalCubos', $lectura->TotalCubos, ['class' => 'form-control' . ($errors->has('TotalCubos') ? ' is-invalid' : ''), 'placeholder' => 'Totalcubos']) }}
            {!! $errors->first('TotalCubos', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>