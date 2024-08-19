<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\capacitacionEstado
 *
 * @property int $id
 * @property string $nombre
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\capacitacionServicio> $capacitacionServicios
 * @property-read int|null $capacitacion_servicios_count
 * @method static \Database\Factories\capacitacionEstadoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEstado newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEstado newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEstado onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEstado query()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEstado whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEstado whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEstado whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEstado whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEstado whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEstado withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionEstado withoutTrashed()
 * @mixin \Eloquent
 */
class capacitacionEstado extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'capacitacion_estados';

    public $fillable = [
        'nombre'
    ];

    protected $casts = [
        'nombre' => 'string'
    ];

    public static $rules = [
        'nombre' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function capacitacionServicios(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\CapacitacionServicio::class, 'estado_id');
    }
}
