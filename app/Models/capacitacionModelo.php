<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\capacitacionModelo
 *
 * @property int $id
 * @property int $marca_id
 * @property string $nombre
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\capacitacionEquipo> $capacitacionEquipos
 * @property-read int|null $capacitacion_equipos_count
 * @property-read \App\Models\capacitacionMarca $marca
 * @method static \Database\Factories\capacitacionModeloFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionModelo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionModelo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionModelo onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionModelo query()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionModelo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionModelo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionModelo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionModelo whereMarcaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionModelo whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionModelo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionModelo withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionModelo withoutTrashed()
 * @mixin \Eloquent
 */
class capacitacionModelo extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'capacitacion_modelos';

    public $fillable = [
        'marca_id',
        'nombre'
    ];

    protected $casts = [
        'nombre' => 'string'
    ];

    public static $rules = [
        'marca_id' => 'required',
        'nombre' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function marca(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\CapacitacionMarca::class, 'marca_id');
    }

    public function capacitacionEquipos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\CapacitacionEquipo::class, 'modelo_id');
    }
}
