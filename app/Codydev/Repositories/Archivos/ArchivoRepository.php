<?php

namespace Codydev\Repositories\Archivos;
use Codydev\Abstracts\ARepository;
use Codydev\Models\Agenda;

class ArchivoRepository extends ARepository implements IArchivoRepository{

    public function __construct(){
        parent::__construct();
        $this->modelClassName = Agenda::class;
        
    } 

    // protected $files;

    // public function __construct(File $files){

    //     $this->files = $files;
    // }

    // public function create($attributes){
    //     return $this->files->create($attributes);
    // }

    // public function all(){

    //     return $this->files->all();
    // }

    // public function find($id){
    //     return $this->files->find($id);
    // }

    // public function update($id, array $attributes){
    //     return $this->files->find($id)->update($attributes);
    // }

    // public function delete($id){
    //     return $this->files->find($id)->delete();
    // }


}