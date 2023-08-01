<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     static $rules = [
		'name' => 'required|string|max:100',
		'email' => 'required|email',
        'password' => 'required|string|max:100',

    ];
    /*$campos = [
        'Nombre'=>'required|string|max:100',
        'ApellidoPaterno'=>'required|string|max:100',
        'ApellidoMaterno'=>'required|string|max:100',
        'Correo'=>'required|email',
        'Foto'=>'required|max:10000|mimes:jpeg,png,jpg'
    ];*/

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function adminlte_image(){
        //Devuelve una imagen random
        return 'https://picsum.photos/300/300';
    }
    public function adminlte_desc(){
        //Devuelve una imagen random
        return 'Administrador';
    }
    public function adminlte_profile_url(){
        //Devuelve una imagen random
        return 'profile/username';
    }
    public function modelhasroles()
    {
        return $this->hasMany(ModelHasRole::class, 'model_id');
    }

}
