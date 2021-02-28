<?php

namespace Codydev\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

// use Illuminate\Auth\Authenticatable;
// use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable 
{
    use Notifiable, SoftDeletes;

    //personalisar el nombre de la columna por una CONSTANTE

    // const DELETED_AT = 'archived_at';

    //disposicion de diversos metodos
    // $modelo->trashed(); => indica si el registro ha sido eliminado de manera logica
    // $modelo->restore(); => restaura un modelo previamente eliminado de forma logica
    // $modelo->forceDelete(); => elimina un registro para siempre

    // Cuando uses SoftDeletes Eloquent va a excluir dichos registros de las consultas a la BD puedes incluirlos de nuevo con
    // Model::onlyTrashed()->get();
    // Model::withTrashed()->get(); 

    // Cómo acceder a los registros que han sido borrados de forma lógica Veamos el listado de métodos:

    //  Este sería el método papelera, y así podrás acceder al registro borrado.
    //  $product->trashed();
    //  Así incluimos en una consulta a los registros que están en la papelera.
    //  $products = Product::withTrashed()->get();
    //  Así consultarías solo los registros borrados de forma lógica.
    //  $products = Product::onlyTrashed()->get();
    //  Así, como puedes imaginar, restauras un registro, en otras palabras vuelves a null la columna deleted_at.
    //  $product->restore();
    //  Oh. Esto es borrado físico, aquí dices adiós definitivamente al registro.
    //  $product->forceDelete();

    // "SI EL CAMPO TIENE NULL EXISTE PERO SI TIENE UNA FECHA ES LA ELIMINACION DEL REGISTRO"

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //un usuario puede tener muchas habilidadews
    public function skills(){

        return $this->belongsToMany(Skill::class, 'user_skill');
    }

    //un usuario le pertenece una profesion

    // public function profesions(){

    //     return $this->belongsTo(Profesion::class);
    // }



}
