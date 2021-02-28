<?php

namespace Codydev\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface IRepository{

    /**
     * @param array $columns
     * @return collection
     */


    public function create($data);

    public function find($id, $columns = ['*']);
    public function findBy($column, $value, $columns = ['*']);
    public function findByAttribute($column, $value, $columns = ['*']);
    public function findByWhere(array $array, $columns = ['*']);

    /**
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection\static []
     * 
     */

    public function all($columns = ['*']);
    public function orderBy($column, $sort = 'asc');
    public function paginate($limit = 15, $columns = ['*']);



}