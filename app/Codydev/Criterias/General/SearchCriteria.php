<?php

namespace Codydev\Criterias\General;

use Illuminate\Database\Query\Builder;
use Codydev\Interfaces\ICriteria;

class SearchCriteria implements ICriteria{
    private $search;

    public function __construct(array $search = []){

        $this->search = array_filter($search, function($item){
            return is_string($item) && str_replace(' ', '', $item) !== '';
        });

    }

    /** 
     * @param $model
     * @return Builder $model
     */

    public function apply($model){
        return $model->search($this->search);
    }
}