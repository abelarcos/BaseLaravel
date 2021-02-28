<?php

namespace App\Servicios;

use App\Repositorios\UserRepository;
use App\Agenda;
use Illuminate\Http\Request;

class UserService{

    public function __construct(UserRepository $user){
        $this->user = $user;

    }

    public function index(){
        return $this->user->all();
    }

    public function create(Request $request){
        $attributes = $request->all();
        return $this->user->create($attributes);
    }

    public function edit($id){

        return $this->user->find($id);
        
    }

    public function update(Request $request, $id){
        $attributes = $request->all();
        return $this->user->find($id)->update($attributes);
    }

    public function delete($id){
        return $this->user->delete($id);



    }



}