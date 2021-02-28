<?php

namespace Codydev\Services;
use Codydev\Abstracts\AService;
use Codydev\Repositories\Entrenadores\IEntrenadoresRepository as EntrenadoresRepository;
use Codydev\Validators\Entrenadores\IEntrenadoresValidator as EntrenadoresValidator;

class EntrenadoresService extends AService{
    public function __construct(EntrenadoresRepository $repository, EntrenadoresValidator $validator){
        parent::__construct();
        $this->repository = $repository;
        $this->valuidator = $validator;
    }

    public function getIndex(){
        $this->repository->getall();
    }

    public function create(array $data){

    }

    public function update($id, array $data){

    }

    public function delete($id){

    }

    public function show($id = false){
        return $this->repository->find($id);
    }



}
