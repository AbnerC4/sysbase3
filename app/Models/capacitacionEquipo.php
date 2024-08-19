<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\capacitacionEquipo
 *
 * @property int $id
 * @property int $marca_id
 * @property int $modelo_id
 * @property int $tipo_id
 * @property string $numero_serie
 * @property string|null $imei
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\capacitacionServicio> $capacitacionServicios
 * @property-read int|null $capacitacion_servicios_count
 * @property-read mixed $texto
 * @property-read \App\Models\capacitacionMarca $marca
 * @property-read \App\Models\capacitacionModelo $modelo
 * @property-read \App\Models\capacitacionTipo $tipo
 * @method static \Database\Factories\capacitacionEquipoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEquipo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEquipo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEquipo onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEquipo query()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEquipo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEquipo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEquipo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEquipo whereImei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEquipo whereMarcaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEquipo whereModeloId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEquipo whereNumeroSerie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEquipo whereTipoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEquipo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEquipo withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEquipo withoutTrashed()
 * @mixin \Eloquent
 */
class capacitacionEquipo extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'capacitacion_equipos';

    public $fillable = [
        'marca_id',
        'modelo_id',
        'tipo_id',
        'numero_serie',
        'imei',
        'update_at'
    ];

    protected $casts = [
        'numero_serie' => 'string',
        'imei' => 'string',
        'update_at' => 'datetime'
    ];

    public static $rules = [
        'marca_id' => 'required',
        'modelo_id' => 'required',
        'tipo_id' => 'required',
        'numero_serie' => 'required|string|max:100',
        'imei' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'update_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function marca(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\CapacitacionMarca::class, 'marca_id');
    }

    public function modelo(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\CapacitacionModelo::class, 'modelo_id');
    }

    public function tipo(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\CapacitacionTipo::class, 'tipo_id');
    }

    public function capacitacionServicios(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\CapacitacionServicio::class, 'equipo_id');
    }

    public function getNombreCompletoAttribute()
    {
        return $this->marca->nombre."-".$this->modelo->nombre."-".$this->numero_serie;

    }

//    public function texto(): Attribute
//    {
//        return Attribute::make(
//            get: fn () => $this->marca->nombre."-".$this->modelo->nombre."-".$this->numero_serie
//        );
//
//    }
}
