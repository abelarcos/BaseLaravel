<?php
namespace Codydev\Abstracts;

use Illuminate\Support\MessageBag;

use Codydev\Interfaces\Ivalidator;


abstract class AValidator implements IValidator{

    protected $validator;
    protected $rules = [];
    protected $data = [];
    protected $messages = [];
    protected $errors;

    public function __construct(){
        $this->errors = new MessageBag;
    }

    /**
     * @param $action
     * @return boolean
     * @throws \Exception
     */
    public function success($action){
        
        if (!isset($this->rules[$action])) throw new \Exception('La accion del validator no existe');
        $validator = \Validator::make($this->data, $this->rules[$action], $this->messages);
        $response = $validator->passes();
        if (!$response) $this->errors = $validator->errors();
        return $response;

    }

    /**
     * @param $action
     * @return boolean
     * @throws \Exception
     */

    public function fails($action){
        if (!isset($this->rules[$action])) throw new \Exception('La accion del validator no existe');
        $validator = \Validator::make($this->data, $this->rules[$action], $this->messages);
        $response = $validator->fails();
        if ($response) $this->errors = $validator->errors();
        return $response;
        
    }

    /**
     * agrega una validacion en tiempo de ejecucion al array de validaciones
     * @param string $parent Clave de la validación a la que se agregará
     * @param bool $key Parametro a evaluar
     * @param bool $validations Reglas de validación
     * @return  $this Retorna una instancia al elemento actual
     */

    public function add($parent = 'create', $key = false, $validations = false){
        
        if ( isset($this->rules[$parent]) && $key != false && $validations != false && is_string($key) && strlen($key) > 0 )
        {
            $this->rules[$parent] += [ $key => $validations ];
        }
        return $this;
    }

    /**
     * elimina una validacion en el tiempo de ejecucion al array de validaciones
     * @param string  $parent Clave de la validación a la que se eliminará
     * @param bool $key parametro a evaluar
     * @return  $this retorna una instancia al elemento actual
     */

    public function remove($parent = false, $key = false){

        if ( isset($this->rules[$parent]) && $key != false && is_string($key) && strlen($key) > 0 )
        {
            unset($this->rules[$parent][ $key ]);
        }
        return $this;

    }

    /**
     * @param array $data
     * @return $this
     */
    public function with($data = []){
        if(is_array($data))  $this->data = $data;
        return $this;

    }
    /**
     * @return MessageBag
     */

    public function getErrors(){
        return $this->errors;
    }
    



}