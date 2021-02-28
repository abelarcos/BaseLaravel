<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Codydev\Models\Colaborador;
use Codydev\Services\ColaboradoresService;
use Codydev\Repositories\Colaboradores\{ColaboradoresRepository, IColaboradoresRepository};

use Illuminate\Routing\Controller as BaseController;

class ColaboradoresController extends BaseController{
    
    protected $repository;
    protected $service;

    public function __construct(IColaboradoresRepository $repository, ColaboradoresService $service){

        $this->repository = $repository;
        $this->service = $service;
    }

    public function dashboard(){

        return view('admin.dashboard');

    }

    public function index(){
        
        $colaboradores = Colaborador::paginate(10);

        // return $colaboradores;
        return view('admin.colaboradores.index', compact('colaboradores'));
        
    }

    public function create(){

        return view('admin.colaboradores.agregar');

    }

    public function store(){

        $data = request()->all();
        $modelo = $this->service->create($data);

        if($modelo){ //null !== $modelo
            \Alert::success('Registyro creado correctamente')->flash();
            // return 'Registro creado correctamente';

        }else{
            // \Alert::error($this->getMessages()->all())->flash();
            // return redirect()->route('colaboradores.agregar')->withInput();
            return 'Error al guardar';
        }

        // dd($data);

    }

    public function edit($id = false){

        $colaborador = $this->repository->find($id);
        

        if($colaborador){

            return view('admin.colaboradores.editar', compact('colaborador'));
        }

        return 'Registro no Encontrado';

        return redirect()->route('colaboradores.index');

    }

    public function update($id = false){

        $data = request()->all();
        
        $response = $this->service->update($id, $data);

        if($response){

            // \Alert::success('Registro Actualizado correctamente')->flash();
            return 'Registro Editado Correctamente';

        }else{
            // \Alert::error($this->service->getMessages()->first())->flash();

            return 'Error Al Editar Un Colaborador';

            return redirect()->route('colaboradores.editar', ['id' => $id] )->withInput();
        }

        return redirect()->route('colaboradores.index');
    }

    public function show($id){
        
    }

    public function destroy($id){

       $colaborador = $this->service->delete($id);

       if($colaborador !== false){
        //    \Alert::success(_i('El Registro hasido eliminado correctamente'))->flash();
            return 'Registro Eliminado Correctamente';
       }else{
        //    \Alert::error(_i($this->service->getMessages()->first('errors')))->flash();
        return 'Error al eliminar un colaborador';
       }

       return redirect()->route('colaboradores.index');
    }

}
