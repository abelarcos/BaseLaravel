<?php 


namespace Codydev\Abstracts;

use Illuminate\Support\Collection;
use Codydev\Interfaces\IRepository;

abstract class ARepository implements IRepository{

    protected $modelClassName;
    
    public function __construct(){

    }

    protected function model(){
        return new $this->modelClassName();
    }

    public function create($data){
        return $this->model()->create($data);
    }

    /**
     * Actualiza un registro de la BD
     * @param $id
     * @param array $data
     * @return boolean si fue exitoso o no
     */
    public function update($id, array $data){
        return $this->model()->find($id)->update($data);

    }

    /**
     * Borra un registro de la BD si el modelo tiene softdeletes activado aplica softdelete en lugar de borrar
     * @param $id
     * @return boolean si fue exitoso o no
     */
    public function delete($id){
        return $this->model()->find($id)->delete();
    }

    /**
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection\static []
     */

    public function all($columns = ['*']){
        $model = $this->model();
        return $model->all($columns);
    }

    public function find($id, $columns = ['*']){
        $model = $this->model();
        return $model->find($id, $columns);

    }

    public function findBy($column, $value, $columns = ['*']){
        $model = $this->model();
        return $model->where($column, $value)->get($columns)->first();
    }

    public function findByAttribute($column, $value, $columns = ['*']){

        $model = $this->model();
        return $model->where($column,$value)->get($columns);
        
    }

    public function findByWhere(array $array, $columns = ['*']){
        $model = $this->model();
        return $model->where($array)->get($columns);
    }

    /**
     * Permite ordenar los resultados de la consulta por una columna dada
     * @param string $column la columna por lo que sera ordenado los resultados de la consulta
     * @param string $sort controla la direccion del ordenamiento puede ser asc o desc
     * @return Collection  las filas de las bases de datos despues de aplicar los criterios ordenado
     */

    public function orderBy($column, $sort = 'asc'){
        $model = $this->model();
        return $model->orderBy($column, $sort);
    }

    public function paginate($limit = 15, $columns = ['*']){

        $model = $this->model();
        return  $model->paginate($limit, $columns);
         
    }

    public function get($columns = ['*']){
        $model = $this->model();
        return $model->get($columns);
    }
}