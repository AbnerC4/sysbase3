<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\capacitacionTipo
 *
 * @property int $id
 * @property string $nombre
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\capacitacionEquipo> $capacitacionEquipos
 * @property-read int|null $capacitacion_equipos_count
 * @method static \Database\Factories\capacitacionTipoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionTipo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionTipo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionTipo onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionTipo query()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionTipo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionTipo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionTipo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionTipo whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionTipo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionTipo withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionTipo withoutTrashed()
 * @mixin \Eloquent
 */
class capacitacionTipo extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'capacitacion_tipos';

    public $fillable = [
        'nombre'
    ];

    protected $casts = [
        'nombre' => 'string'
    ];

    public static $rules = [
        'nombre' => 'required|string|max:25',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function capacitacionEquipos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\CapacitacionEquipo::class, 'tipo_id');
    }
}
