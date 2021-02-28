<?php 

namespace Codydev\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface IService{

    /**
     * @param $id
     * @param array $data
     * @return boolean
     */

    public function create(array $data);

    /**
     * @param $id
     * @param array $data
     * @return boolean
     */

    public function update(int $id, array $data);

    public function find(int $id);

    /**
     * @param $id
     * @return  boolean
     */
    public function delete(int $id);

    /**
     * @return Collection
     */
    public function getAll();

}