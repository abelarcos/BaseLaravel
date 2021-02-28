<?php

namespace Codydev\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model{

    protected $table = 'pokemones';
    protected $fillable = ['nombre', 'foto'];


}