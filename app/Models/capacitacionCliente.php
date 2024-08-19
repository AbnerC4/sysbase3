<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\capacitacionCliente
 *
 * @property int $id
 * @property string $nombres
 * @property string $apellidos
 * @property string|null $telefono
 * @property string|null $direccion
 * @property string|null $cui
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\capacitacionServicio> $capacitacionServicios
 * @property-read int|null $capacitacion_servicios_count
 * @method static \Database\Factories\capacitacionClienteFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionCliente newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionCliente newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionCliente onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionCliente query()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionCliente whereApellidos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionCliente whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionCliente whereCui($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionCliente whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionCliente whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionCliente whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionCliente whereNombres($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionCliente whereTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionCliente whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionCliente withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionCliente withoutTrashed()
 * @property-read mixed $texto
 * @mixin \Eloquent
 */
class capacitacionCliente extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'capacitacion_clientes';

    public $fillable = [
        'nombres',
        'apellidos',
        'telefono',
        'direccion',
        'cui'
    ];

    protected $casts = [
        'nombres' => 'string',
        'apellidos' => 'string',
        'telefono' => 'string',
        'direccion' => 'string',
        'cui' => 'string'
    ];

    public static $rules = [
        'nombres' => 'required|string|max:45',
        'apellidos' => 'required|string|max:45',
        'telefono' => 'nullable|string|max:8',
        'direccion' => 'nullable|string|max:255',
        'cui' => 'nullable|string|max:13',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function capacitacionServicios(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\CapacitacionServicio::class, 'cliente_id');
    }

        public function getTextoAttribute()
    {
        return $this->nombres."_".$this->apellidos;

    }

}
