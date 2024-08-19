<!-- Marca Id Field -->
<div class="col-sm-12">
    {!! Form::label('marca_id', 'Marca Id:') !!}
    <p>{{ $capacitacionEquipo->marca->nombre }}</p>
</div>

<!-- Modelo Id Field -->
<div class="col-sm-12">
    {!! Form::label('modelo_id', 'Modelo Id:') !!}
    <p>{{ $capacitacionEquipo->modelo->nombre }}</p>
</div>

<!-- Tipo Id Field -->
<div class="col-sm-12">
    {!! Form::label('tipo_id', 'Tipo Id:') !!}
    <p>{{ $capacitacionEquipo->tipo->nombre }}</p>
</div>

<!-- Numero Serie Field -->
<div class="col-sm-12">
    {!! Form::label('numero_serie', 'Numero Serie:') !!}
    <p>{{ $capacitacionEquipo->numero_serie }}</p>
</div>

<!-- Imei Field -->
<div class="col-sm-12">
    {!! Form::label('imei', 'Imei:') !!}
    <p>{{ $capacitacionEquipo->imei }}</p>
</div>

<!-- Update At Field -->

