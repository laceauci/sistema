<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use App\Models\User;

/**
 * Class ModelHasRole
 *
 * @property $role_id
 * @property $model_type
 * @property $model_id
 *
 * @property Role $role
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ModelHasRole extends Model
{

    static $rules = [
		'role_id' => 'required',
		'model_type' => 'required',
		'model_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['role_id','model_type','model_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'model_id');
    }


}
