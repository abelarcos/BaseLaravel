<?php

namespace Codydev\Services;

use Codydev\Abstracts\AService;
use Codydev\Repositories\Agenda\IAgendaRepository as AgendaRepository;
use Codydev\Validators\Agenda\IAgendaValidator as AgendaValidator;
use Storage;

class AgendaService extends AService{

    public function __construct(AgendaRepository $repository, AgendaValidator $validator){
        parent::__construct();
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function getIndex(){
        $this->repository->getAll();
    }

    public function create(array $data){
        if($this->validator->with($data)->success('create')){

           try {
                \DB::beginTransaction();
                $result = $this->repository->create($data);
                \DB::commit();
                return $result;
           } catch (\Exception $e) {

               \Log::error($e);
               \DB::rollBack();
               $this->addMessage('Error', $e->getMessage());
               return null;


           }

        }



    }

    public function update($id, array $data){
        if($this->validator->with($data)->success('update')){

            try {
                \DB::beginTransaction();

                $this->repository->update($id, $data);

                \DB::commit();

                return $this->repository->find($id);

            } catch (\Exception $e) {
                \Log::error($e);
                \DB::rollBack();
                $this->addMessage('Error', $e->getMessage());
                return false;
            }
        }
        $this->messages = $this->validator->getErors();
        return false;

    }


    public function find($id = false){

        return $this->repository->find($id);

    }

    public function delete($id){

        try {

            \DB::beginTransaction();

            $this->repository->delete($id);

            \DB::commit();

            return true;
            
        } catch (\Exception $e) {
            \Log::error($e);
            \DB::rollBack();
            $this->addMessage('Error', $e->getMessage());
            return false;
        }

    }



}