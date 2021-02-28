<?php

namespace Codydev\Models;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class PostFile extends Model
{

    public function category($value = ''){

        return $this->belongsTo(Category::class);
    }

}
