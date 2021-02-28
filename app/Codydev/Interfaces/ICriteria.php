<?php

namespace Codydev\Interfaces;

use Illuminate\Database\Query\Builder;

interface ICriteria{

    /**
     * @param $model
     * @return Builder $model
     */

    public function apply($model);
    
}