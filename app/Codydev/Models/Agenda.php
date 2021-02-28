<?php

namespace Codydev\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected  $fillable = ['nombres', 'apellidos','telefono', 'celular', 'sexo', 'email', 'posicion', 'departamento', 'salario', 'fechadenacimiento'];
    
    //queryscopes para la busqueda por nombres
    // public function scopeNombres($query, $nombres){
    //     if($nombres){
    //         return $query->where('0nombres', 'like', "%$nombres%");
    //     }
    // }

    // //queryscopes para la busqueda por apellidos
    // public function scopeApellidos($query, $apellidos){
    //     if($apellidos){
    //         return $query->where('apellidos', 'like', "%$apellidos%");
    //     }
    // }

    //queryscopes para la busqueda por tipo
    public function scopeBuscarpor($query, $tipo, $buscar){
        if( ($tipo && $buscar) ){

            return $query->where($tipo, 'like', "%$buscar%");

        }
    }
}
