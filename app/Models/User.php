<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
/**
 * @property integer $id
 * @property integer $role_id
 * @property string $role
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property Contrat[] $contrats
 * @property Role $role
 */
class User extends Authenticatable
{
    use Notifiable;
    /**
     * @var array
     */
    protected $fillable = ['role_id', 'role', 'name', 'email', 'phone', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contrats()
    {
        return $this->hasMany('App\Models\Contrat');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
    // public function roles()
    // {
    //     return $this->belongsTo(Role::class);
    // }
}
