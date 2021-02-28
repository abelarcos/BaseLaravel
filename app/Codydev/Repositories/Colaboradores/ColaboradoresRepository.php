<?php

namespace Codydev\Repositories\Colaboradores;
use Codydev\Abstracts\ARepository;
use Codydev\Models\Colaborador;

class ColaboradoresRepository extends ARepository implements IColaboradoresRepository{

    public function __construct(){
        parent::__construct();
        $this->modelClassName = Colaborador::class;
    }
}