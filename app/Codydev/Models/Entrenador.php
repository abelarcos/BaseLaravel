<?php

namespace CodyDev\Models;
use Illuminate\Database\Eloquent\Model;

class Entrenador extends Model{

    protected $table = 'entrenadores';

    protected $fillable = ['nombre', 'foto'];



}