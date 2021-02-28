<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Codydev\Models\Entrenador;
use Codydev\Services\EntrenadoresService;
use Codydev\Repositories\Entrenadores\{EntrenadoresRepository,IEntrenadoresRepository};

use Illuminate\Routing\Controller as BaseController;

class EntrenadoresController extends BaseController
{
    protected $repository;
    protected $service;

    public function __construct(IEntrenadoresRepository $repository, EntrenadoresService $service){
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index(Request $request){

        // $entrenadores = Entrenador::all();
        if($request->ajax()){

            $entrenadores = Entrenador::all();
            
           
            return response()->json($entrenadores, 200);
            
        }  
        // return response()->json(Entrenador::all()->toArray());
        return view('admin.entrenadores.index');


    }

    public function create(){

    }

    public function store(Request $request){


        

            // return Entrenador::create([
            //     'nombre' => $request->nombre,
            //     'foto' => $request->foto

            // ]);
            $entrenador = new Entrenador();
            if($request->hasFile('foto')){
                $file = $request->file('foto');
                $name = time().$file->getClientOriginalName();
                $entrenador->foto = $name;
                $file->move(public_path(). '/images/', $name);
            }
            $entrenador->nombre = $request->nombre;
            $entrenador->save();

            return response()->json(['message' => 'Creado Correctamente', 'entrenador' => $entrenador],200);

            // $pokemon = new Entrenador();
            // $pokemon->nombre = $request->get('nombre');
            // $pokemon->foto = $request->input('foto');
            // $pokemon->save();

            // return response()->json([
            //     "message" => "Entrenador creado correctamente.",
            //     "pokemon" => $pokemon
            // ], 200);
        

    }

    public function edit(){

    }

    public function update(){

    }

    public function show(int $id){

    }

    public function destroy(int $id){

    }
}
