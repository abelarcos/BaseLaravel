<?php

namespace Codydev\Services;

use Codydev\Repositories\Archivos\IArchivoRepository as ArchivoRepository;
use Codydev\Validators\Archivos\IArchivosValidator as ArchivoValidator;
use Codydev\Models\File;
use Codydev\Abstracts\AService;
// use Ivy\Criterias\General\SearchCriteria;
use Illuminate\Http\Request;
use Storage;


class ArchivosService extends AService{

    public function __construct(ArchivoRepository $repository, ArchivoValidator $validator){
        
        parent::__construct();
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function getIndex(){
        return $this->repository->getall();
    }

    public function create(array $data){
        if($this->validator->with($data)->success('create')){

            try{
                \DB::beginTransaction();

                if(isset($data['file'])){

                    $archivo = \Storage::disk('public')->putFileAs('uploads/archivos', $data['file'], uniqid().str_replace('', '-', $data['file']->getClientOriginalName()));
                    $data['file'] = '/storage' . $archivo;
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

    public function update(int $id, array $data){
        if($this->validator->with($data)->success('update')){

            try{
                \DB::beginTransaction();
                $this->respository->update($id, $data);
                \DB::commit();
                return $this->repository->find($id);

            }catch(\Exception $e){
                \Log::error($e);
                \DB::rolllBack();
                $this->addMessage('Error', $e->getMessage());
                return false;
            }
        }
        $this->messages = $this->validator->getErrors();
        return false;
    }

    public function delete(int $id){

        try{

            \DB::beginTransaction();
            $this->repository->delete($id);
            \DB::commit();
            return true;

        }catch(\Exception $e){
            \DB::rollBack();
            \Log::error($e);
            $this->addMessage('Error', $e->getMessage());
            return false;
        

        }

    }

    // public function getByQuery(array $query = [], $limit = 10) {
    //     return $this->repository->pushCriteria(new SearchCriteria($query))->orderBy('nombre')->paginate($limit);
    // }


    
    


    

}