<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\capacitacionMarca
 *
 * @property int $id
 * @property string $nombre
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\capacitacionEquipo> $capacitacionEquipos
 * @property-read int|null $capacitacion_equipos_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\capacitacionModelo> $capacitacionModelos
 * @property-read int|null $capacitacion_modelos_count
 * @method static \Database\Factories\capacitacionMarcaFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionMarca newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionMarca newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionMarca onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionMarca query()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionMarca whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionMarca whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionMarca whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionMarca whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionMarca whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionMarca withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionMarca withoutTrashed()
 * @mixin \Eloquent
 */
class capacitacionMarca extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'capacitacion_marcas';

    public $fillable = [
        'nombre'
    ];

    protected $casts = [
        'nombre' => 'string'
    ];

    public static $rules = [
        'nombre' => 'required|string|max:45',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function capacitacionEquipos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\CapacitacionEquipo::class, 'marca_id');
    }

    public function capacitacionModelos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\CapacitacionModelo::class, 'marca_id');
    }
}
