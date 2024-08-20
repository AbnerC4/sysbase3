<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\capacitacionUser
 *
 * @property int $id
 * @property string|null $username
 * @property string $name
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $provider
 * @property string|null $provider_uid
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\capacitacionServicio> $capacitacionServicios
 * @property-read int|null $capacitacion_servicios_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Option> $option1s
 * @property-read int|null $option1s_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Option> $options
 * @property-read int|null $options_count
 * @method static \Database\Factories\capacitacionUserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionUser onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionUser whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionUser whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionUser whereProviderUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionUser whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionUser whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionUser withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|capacitacionUser withoutTrashed()
 * @mixin \Eloquent
 */
class capacitacionUser extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'users';

    public $fillable = [
        'username',
        'name',
        'email',
        'email_verified_at',
        'password',
        'provider',
        'provider_uid',
        'remember_token'
    ];

    protected $casts = [
        'username' => 'string',
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'provider' => 'string',
        'provider_uid' => 'string',
        'remember_token' => 'string'
    ];

    public static $rules = [
        'username' => 'nullable|string|max:255',
        'name' => 'required|string|max:255',
        'email' => 'nullable|string|max:255',
        'email_verified_at' => 'nullable',
        'password' => 'nullable|string|max:255',
        'provider' => 'nullable|string|max:255',
        'provider_uid' => 'nullable|string|max:255',
        'remember_token' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function capacitacionServicios(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\CapacitacionServicio::class, 'user_id');
    }

    public function options(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Option::class, 'option_user');
    }

    public function option1s(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Option::class, 'user_shortcuts');
    }

}
