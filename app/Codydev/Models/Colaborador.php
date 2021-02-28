<?php

namespace Codydev\Models;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model{

    protected $table = 'colaboradores';


    protected $fillable = ['nombre', 'especialidad','foto','twitter','github','linkedin','correo_electronico','descripcion'];



}