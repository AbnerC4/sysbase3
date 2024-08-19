
<div class="form-group col-sm-6">
    {!! Form::label('marca_id', 'Asignar Marca:') !!}
    <div class="form-group col-sm-12">
        {!! Form::select(
            'marca_id',
            select(\App\Models\CapacitacionMarca::class, 'nombre'),
            null,
            ['id' => 'marca_id', 'class' => 'form-control col-sm-12']
        ) !!}
    </div>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('modelo_id', 'Asignar Modelo:') !!}
    <div class="form-group col-sm-12">
        {!! Form::select(
            'modelo_id',
            select(\App\Models\CapacitacionModelo::class, 'nombre'),
            null,
            ['id' => 'modelo_id', 'class' => 'form-control col-sm-12']
        ) !!}
    </div>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('tipo_id', 'Asignar Tipo:') !!}
    <div class="form-group col-sm-12">
        {!! Form::select(
            'tipo_id',
            select(\App\Models\CapacitacionTipo::class, 'nombre'),
            null,
            ['id' => 'tipo_id', 'class' => 'form-control col-sm-12']
        ) !!}
    </div>
</div>

</div>

<!-- Numero Serie Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero_serie', 'Numero Serie:') !!}
    {!! Form::text('numero_serie', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Imei Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imei', 'Imei:') !!}
    {!! Form::text('imei', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Update At Field -->


@push('page_scripts')
    <script type="text/javascript">
        $('#update_at').datepicker()
    </script>
@endpush
