<?php

namespace App\Models\Vistas;

use Illuminate\Database\Eloquent\Model;


/**
 * Vista UsuarioRolPermiso
 *

 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class VistaUsuarioRolPermiso extends Model
{


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */


     protected $table = 'v_usuario_rol_permisos';

}
