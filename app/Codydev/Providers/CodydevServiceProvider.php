<?php  


namespace Codydev\Providers;

use Illuminate\Support\ServiceProvider;

use Codydev\Repositories\Agenda\{IAgendaRepository, AgendaRepository};
use Codydev\Validators\Agenda\{IAgendaValidator, AgendaValidator};

use Codydev\Repositories\Colaboradores\{IColaboradoresRepository, ColaboradoresRepository};
use Codydev\Validators\Colaboradores\{IColaboradoresValidator, ColaboradoresValidator};

use Codydev\Repositories\Entrenadores\{IEntrenadoresRepository, EntrenadoresRepository};
use Codydev\Validators\Entrenadores\{IEntrenadoresValidator, EntrenadoresValidator};



class CodydevServiceProvider extends ServiceProvider{

    public function register(){
        
        // repositorios
        $this->app->bind(IAgendaRepository::class, AgendaRepository::class);
       
        $this->app->bind(IColaboradoresRepository::class, ColaboradoresRepository::class);

        $this->app->bind(IEntrenadoresRepository::class, EntrenadoresRepository::class);


        //Validators
        $this->app->bind(IAgendaValidator::class, AgendaValidator::class);

        $this->app->bind(IColaboradoresValidator::class, ColaboradoresValidator::class);

        $this->app->bind(IEntrenadoresValidator::class, EntrenadoresValidator::class);

    }
}