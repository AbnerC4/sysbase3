<!-- Marca Id Field -->
<div class="col-sm-12">
    {!! Form::label('marca_id', 'Marca:') !!}
    <p>{{ $capacitacionModelo->marca->nombre }}</p>
</div>

<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $capacitacionModelo->nombre }}</p>
</div>

