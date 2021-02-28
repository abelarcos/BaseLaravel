<?php

namespace Codydev\Services;

use Codydev\Abstracts\AService;
use Codydev\Repositories\Colaboradores\IColaboradoresRepository as ColaboradoresRepository;
use Codydev\Validators\Colaboradores\IColaboradoresValidator as ColaboradoresValidator;
use Storage;

class ColaboradoresService extends  AService{

    public function __construct(ColaboradoresRepository $repository, ColaboradoresValidator $validator){
        parent::__construct();
        $this->repository = $repository;
        $this->validator = $validator;

    }

    public function getIndex(){
        $this->repository->getAll();
        
    }

    public function create(array $data){
        if($this->validator->with($data)->success('create')){

            try{

                \DB::beginTransaction();

                if(isset($data['foto'])){
                    $colaborador = \Storage::disk('public')
                    ->putFileAs('uploads/colaboradores', $data['foto'], uniqid().str_replace(' ', '-', $data['foto']->getClientOriginalName()));
                    $data['foto'] = 'storage/' . $colaborador;
                }
                
                $result = $this->repository->create($data);
                \DB::commit();
                return $result;
            }catch(\Exception $e){
                \Log::error($e);
                \DB::rollBack();
                $this->addMessage('Error', $e->getMessage());
                return null;

            }

        }
        $this->messages = $this->validator->getErrors();
        return null;
    }

    public function update ($id, array $data){

        if($this->validator->with($data)->success('update')){

            try {

                \DB::beginTransaction();

                if(isset($data['foto'])){

                    $colaboradorFoto = $this->repository->find($id, ['foto'])->foto;
                   
                    $pathFoto = str_replace('storage/', '', $colaboradorFoto);
            
                    if(Storage::disk('public')->exists($pathFoto)){

                        Storage::disk('public')->delete($pathFoto);
                    }

                    $colaborador = Storage::disk('public')
                    ->putFileAs('uploads/colaboradores', $data['foto'], uniqid().str_replace(' ', '-', $data['foto']->getClientOriginalName()));
                    $data['foto'] = 'storage/' . $colaborador;


                }
                
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
        $this->messages = $this->validator->getErrors();
        return false;

    }

    public function delete($id){
        try {
            
            \DB::beginTransaction();
            $colaboradorFoto = $this->repository->find($id, ['foto'])->foto;
            $pathFoto = str_replace('storage/', '', $colaboradorFoto);

            if(Storage::disk('public')->exists($pathFoto)){
                Storage::disk('public')->delete($pathFoto);
            }

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

    

    // public function getByQuery(array $query = [], $limit = 10) {
    //     return $this->repository->pushCriteria(new SearchCriteria($query))->orderBy('nombre')->paginate($limit);
    // }


}