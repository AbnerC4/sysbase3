<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\capacitacionServicio
 *
 * @property int $id
 * @property int $cliente_id
 * @property int $estado_id
 * @property int $equipo_id
 * @property int $user_id
 * @property string|null $precio
 * @property \Illuminate\Support\Carbon $fecha_recepcion
 * @property string $problema
 * @property \Illuminate\Support\Carbon|null $fecha_diagnostico
 * @property string|null $diagnostico
 * @property \Illuminate\Support\Carbon|null $fecha_entrega
 * @property string|null $solucion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\capacitacionCliente $cliente
 * @property-read \App\Models\capacitacionEquipo $equipo
 * @property-read \App\Models\capacitacionEstado $estado
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\capacitacionServicioFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionServicio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionServicio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionServicio onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionServicio query()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionServicio whereClienteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionServicio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionServicio whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionServicio whereDiagnostico($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionServicio whereEquipoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionServicio whereEstadoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionServicio whereFechaDiagnostico($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionServicio whereFechaEntrega($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionServicio whereFechaRecepcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionServicio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionServicio wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionServicio whereProblema($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionServicio whereSolucion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionServicio whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionServicio whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionServicio withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionServicio withoutTrashed()
 * @mixin \Eloquent
 */
class capacitacionServicio extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'capacitacion_servicios';

    public $fillable = [
        'cliente_id',
        'estado_id',
        'equipo_id',
        'user_id',
        'precio',
        'fecha_recepcion',
        'problema',
        'fecha_diagnostico',
        'diagnostico',
        'fecha_entrega',
        'solucion'
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'fecha_recepcion' => 'date: d-m-y',
        'problema' => 'string',
        'fecha_diagnostico' => 'date: d-m-y',
        'diagnostico' => 'string',
        'fecha_entrega' => 'date: d-m-y',
        'solucion' => 'string'
    ];

    public static $rules = [
        'cliente_id' => 'required',
        'estado_id' => 'required',
        'equipo_id' => 'required',
        'user_id' => 'required',
        'precio' => 'nullable|numeric',
        'fecha_recepcion' => 'required',
        'problema' => 'required|string|max:65535',
        'fecha_diagnostico' => 'nullable',
        'diagnostico' => 'nullable|string|max:45',
        'fecha_entrega' => 'nullable',
        'solucion' => 'nullable|string|max:65535',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function cliente(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\CapacitacionCliente::class, 'cliente_id');
    }

    public function equipo(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\CapacitacionEquipo::class, 'equipo_id');
    }

    public function estado(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\CapacitacionEstado::class, 'estado_id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public  function  formatPrecio($precio){
        return '$'.number_format($precio, 2, '.', ',');
    }

}
