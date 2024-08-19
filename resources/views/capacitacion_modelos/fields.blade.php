<!-- Marca Id Field -->


<div class="form-group col-sm-6">
    {!! Form::label('marca_id', 'Asignar Marca:') !!}
    <div class="form-group col-sm-12">
        {!! Form::select(
            'marca_id',
            select(\App\Models\CapacitacionMarca::class, 'nombre'),
            ['id' => 'marca_id', 'class' => 'form-control col-sm-12']
        ) !!}
    </div>
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>
