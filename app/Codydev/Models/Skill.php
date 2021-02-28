<?php

namespace Codydev\Models;

use Codydev\Models\User;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{

	protected $table = 'skills';
	protected $fillable = ['descripcion'];


    public function users(){

    	return $this->belongsToMany(User::class); 
    }
}
