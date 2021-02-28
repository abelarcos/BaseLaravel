<?php

namespace Codydev\Abstracts;

use Carbon\Carbon;

use Illuminate\Support\MessageBag;
use Illuminate\Validation\Rule;
// use Ivy\Criterias\General\SearchCriteria;
use Codydev\Interfaces\IRepository;
use Codydev\Interfaces\IValidator;
use Codydev\Interfaces\IService;


abstract class AService implements IService{

    protected $repository;


    protected $validator;

    protected $messages;

    public function __construct(){

        $this->init();
    }

    protected  function inErrorCase(\Exception $e){
        $message = $e->getMessage();
        \Log::error($message);
        $this->messages->add('error', $message);
    }

    public function create(array $data){
        $result = false;
        try{
            if ($this->validator->with($data)->fails('create')) throw new \Exception(_i('La informacion no es valida.'));
            $result = $this->repository->create($data);
        }
        catch (\Exception $e){
            $this->inErrorCase($e);
        }
        return $result;
    }

    public function update(int $id, array $data){

        $result = null;
        try{
            $registry = $this->repository->find($id);
            if (null === $registry) throw new \Exception(_i('El registro no existe.'));
            if ($this->validator->with($data)->fails('update')) throw new \Exception(_i('La informacion no es valida.'));
            $result = $registry->update($data);
        }
        catch (\Exception $e){
            $this->inErrorCase($e);
        }
        return $result;
        
    }

    public function find(int $id){
        return $this->repository->find($id);
        
    }

    public function delete(int $id){
        $result = null;
        try{
            $registry = $this->repository->find($id);
            if (null === $registry) throw new \Exception(_i('El registro no existe.'));
            $result = $registry->delete();
        }
        catch (\Exception $e){
            $this->inErrorCase($e);
        }
        return $result;
    }

    public function getAll(){
        return $this->repository->all();

    }

    public function init(){
        $this->messages = new MessageBag;
        return $this;
    }

    protected function addMessage($key, $message){
        if($this->messages instanceof MessageBag){
            $this->messages->add($key, $message);
        }
        return $this;
    }

    protected function dateTrait(array $array, $client_format = 'd-m-Y', $db_format = 'Y-m-d'){

        foreach ($array as $key => $value)
        {
            if (!is_string($value)) continue;
            if (preg_match('/^(date|fecha).*/', $key))
            {
                if (!empty($value))
                {
                    $array[$key] = Carbon::createFromFormat($client_format, $value)->format($db_format);
                }
            } 
        }
        return $array;
    }

    public function getMessages(){
        return $this->messages;
    }

    protected function clearNullValues(array &$array){

        foreach($array as $key => $value){
            if (is_array($value)) $this->clearNullValues($array[$key]);
            else if (null === $value) unset($array[$key]);
        }
        return $array;

    }

    // public function getPaginate($limit = 15, array $searched = []){
    //     return $this->repository->pushCriteria(new SearchCriteria($searched))->paginate($limit);
    // }

    public function isValidUnique($value, $table, $column, $id = null){

        return \Validator::make([ $column => $value ], [
            $column => [
                Rule::unique($table, $column)->ignore($id)
            ]
        ])->passes();
    }
}
