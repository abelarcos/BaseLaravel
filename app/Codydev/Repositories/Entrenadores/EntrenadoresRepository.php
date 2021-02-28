<?php
namespace Codydev\Repositories\Entrenadores;

use Codydev\Abstracts\ARepository;
use Codydev\Models\Entrenador;

class EntrenadoresRepository extends ARepository implements IEntrenadoresRepository{
    public function __construct(){
        parent::__construct();
        $this->modelClassName = Entrenador::class;
    }

}