<?php

namespace Codydev\Repositories\Agenda;

use Codydev\Abstracts\ARepository;
use Codydev\Models\Agenda;

class AgendaRepository extends ARepository implements IAgendaRepository{
    public function __construct(){
        parent::__construct();
        $this->modelClassName = Agenda::class;
        
    }

}

