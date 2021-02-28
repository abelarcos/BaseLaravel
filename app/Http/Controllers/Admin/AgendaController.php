<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Codydev\Models\Agenda;
use Codydev\Services\AgendaService;
use Codydev\Repositories\Agenda\{IAgendaRepository, AgendaRepository};


use Illuminate\Routing\Controller as BaseController;

class AgendaController extends BaseController{
    
    protected $repository;
    protected $service;

    public function __construct(AgendaRepository $repository, AgendaService $service){
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index(Request $request){

        if($request->ajax()){
            
            // $agenda = Agenda::all();
            // $agenda = DB::table('agendas')->paginate(2);
            //  $agenda = Agenda::paginate(2);
            $buscar = $request->buscar;
            $criterio = $request->criterio;

            if($buscar == ''){
                $agenda = Agenda::orderBy('id', 'desc')->paginate(3);

            }else{

                $agenda = Agenda::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(3);

            }
           
            // return response()->json($agenda, 200);
            // return $agenda;
            return [

                'pagination' => [
                    'total' => $agenda->total(),
                    'current_page' => $agenda->currentPage(),
                    'per_page' => $agenda->perPage(),
                    'last_page' => $agenda->lastPage(),
                    'from' => $agenda->firstItem(),
                    'to' => $agenda->lastItem()
                ],

                'agenda' => $agenda


            ];

        }

        return view('admin.agenda.index');
    }

    // public function getAgregar(){

    //     return view('admin.agenda.agregar');

    // }

    public function store(Request $request){

        // $data = request()->all();


        //     $modelo = $this->service->create($data);

        //     if($modelo){ //null !== $modelo
        //         // \Alert::success('Registyro creado correctamente')->flash();
        //         return 'Registro creado correctamente';

        //     }else{
        //         // \Alert::error($this->getMessages()->all())->flash();
        //         // return redirect()->route('colaboradores.agregar')->withInput();
        //         return 'Error al guardar';
        //     }
            
            $agenda = new Agenda;
            $agenda->nombres = $request->nombres;
            $agenda->apellidos = $request->apellidos;
            $agenda->telefono = $request->telefono;
            $agenda->sexo = $request->sexo;
            $agenda->email = $request->email;
            $agenda->posicion = $request->posicion;
            $agenda->departamento = $request->departamento;
            $agenda->salario = $request->salario;
            $agenda->fechadenacimiento = $request->fechadenacimiento;
            $agenda->condicion = true;
            $agenda->save();

            return response()->json([
                "message" => "Agenda Registrada Correctamente.",
                "agenda" => $agenda
            ], 200);

    }
    

    // public function edit($id = false){

        // $agenda = $this->repository->find($id);

        // if($agenda){

        //     return view('admin.agenda.partials.modaleditar', compact('agenda'));
        // }

        // return 'Registro no Encontrado';

        // return redirect()->route('agenda.index');

    // }

    // public function update($id = false){

    // }

    public function update(Request $request){

        if($request->ajax()){

            $agenda = Agenda::findOrFail($request->id);
            $agenda->nombres = $request->nombres;
            $agenda->apellidos = $request->apellidos;
            $agenda->telefono = $request->telefono;
            $agenda->sexo = $request->sexo;
            $agenda->email = $request->email;
            $agenda->posicion = $request->posicion;
            $agenda->departamento = $request->departamento;
            $agenda->salario = $request->salario;
            $agenda->fechadenacimiento = $request->fechadenacimiento;
            $agenda->condicion = true;
            $agenda->save();

            return response()->json([
                "message" => "Agenda Actualizada Correctamente.",
                "agenda" => $agenda
            ], 200);
        }

    }

    public function activar(Request $request){
        if($request->ajax()){
            $agenda = Agenda::findOrFail($request->id);
            $agenda->condicion = true;
            $agenda->save();

            return response()->json([
                'message' => 'Activado Correctamente',
                'agenda' => $agenda
            ], 200);
        }

    }

    public function desactivar(Request $request){
        if($request->ajax()){
            $agenda = Agenda::findOrFail($request->id);
            $agenda->condicion = false;
            $agenda->save();

            return response()->json([
                'message' => 'Desactivado Correctamente',
                'agenda' => $agenda
            ], 200);
        }

    }

    public function show($id){

        // $agenda = $this->repository->find($id);

        // if($agenda){
        //     return view('admin.agenda.detail', compact('agenda'));
        // }

        // // \Alert::error(_i('El registro seleccionado no existe'))->flash();
        // return 'el registro seleccionado no existe';

        // return redirect()->route('agenda.index');

    }

    public function destroy($id){

    }


}
