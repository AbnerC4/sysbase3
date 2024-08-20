<!-- Cliente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliente_id', 'Asignar Cliente:') !!}
    <div class="form-group col-sm-12">
        {!! Form::select(
            'cliente_id',
            select(\App\Models\capacitacionCliente::class,'texto'),
            null,
            ['id' => 'cliente_id', 'class' => 'form-control col-sm-12']
        ) !!}
    </div>
</div>



<!-- Estado Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_id', 'Estado:') !!}
    <div class="form-group col-sm-12">
        {!! Form::select(
            'estado_id',
            select(\App\Models\CapacitacionEstado::class, 'nombre'),
            null,
            ['id' => 'estado_id', 'class' => 'form-control col-sm-12']
        ) !!}
    </div>
</div>

<!-- equipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('equipo_id', 'Asignar Equipo:') !!}
    <a href="{{route('capacitacionEquipos.create')}}">Nuevo</a>
    <div class="form-group col-sm-12">
        {!! Form::select(
            'equipo_id',
            select(\App\Models\capacitacionEquipo::class,'nombrecompleto'),
            null,
            ['id' => 'equipo_id', 'class' => 'form-control col-sm-12']
        ) !!}
    </div>
</div>

<!-- user Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('Username')) !!}
    {!! Form::text('user_name', Auth::user()->name,
    ['id'=>'user_name', 'class' => 'form-control', 'readonly' => 'readonly']) !!}
    {!! Form::hidden('user_id', Auth::user()->id) !!}
</div>

{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('user_id', 'Usuario:') !!}--}}
{{--    <div class="form-group col-sm-12">--}}
{{--        {!! Form::select(--}}
{{--            'user_id',--}}
{{--            select(\App\Models\CapacitacionUser::class, 'name'),--}}
{{--            null,--}}
{{--            ['id' => 'user_id', 'class' => 'form-control col-sm-12']--}}
{{--        ) !!}--}}
{{--    </div>--}}
{{--</div>--}}

<!-- Precio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precio', 'Precio:') !!}
    {!! Form::number('precio', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Recepcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_recepcion', 'Fecha Recepcion:') !!}
    {!! Form::date('fecha_recepcion', null, ['class' => 'form-control','id'=>'fecha_recepcion']) !!}
</div>


@push('page_scripts')
    <script type="text/javascript">
        $('#fecha_recepcion').datepicker()
    </script>
@endpush

<!-- Problema Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('problema', 'Problema:') !!}
    {!! Form::textarea('problema', null, ['class' => 'form-control', 'required', 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>

<!-- Fecha Diagnostico Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_diagnostico', 'Fecha Diagnostico:') !!}
    {!! Form::date('fecha_diagnostico', null, ['class' => 'form-control','id'=>'fecha_diagnostico']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#fecha_diagnostico').datepicker()
    </script>
@endpush

<!-- Diagnostico Field -->
<div class="form-group col-sm-6">
    {!! Form::label('diagnostico', 'Diagnostico:') !!}
    {!! Form::text('diagnostico', null, ['class' => 'form-control', 'maxlength' => 45, 'maxlength' => 45]) !!}
</div>

<!-- Fecha Entrega Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_entrega', 'Fecha Entrega:') !!}
    {!! Form::text('fecha_entrega', null, ['class' => 'form-control','id'=>'fecha_entrega']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#fecha_entrega').datepicker()
    </script>
@endpush

<!-- Solucion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('solucion', 'Solucion:') !!}
    {!! Form::textarea('solucion', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>
