<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

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
