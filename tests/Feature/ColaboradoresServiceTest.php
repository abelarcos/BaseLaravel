<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Codydev\Models\Colaborador;
use Codydev\Services\ColaboradoresService;

class ColaboradoresServiceTest extends TestCase {
    use RefreshDatabase;

    private $service;
    private $faker;


    public function __construct(?string $name = null, array $data = [], string $dataName = '' ){
        parent::__construct($name,$data,$dataName);

        $this->service = $this->app->make(ColaboradoresService::class);
        $this->faker = \Faker\Factory::create();
    }

    public function getValidData(array $custom = []){

        return array_filter(array_merge([

            'nombre' => $this->faker->name,
            'especialidad' => $this->faker->text(150),
            'foto' => null,
            'twitter' => $this->faker->url,
            'github' => $this->faker->url,
            'linkedin' => $this->faker->url,
            'correo_electronico' => $this->faker->email,
            'descripcion' => $this->faker->text


        ], $custom));

    }
    /**
     * @test
     */

    /**Test para Crear un Colaborador */
    public function test_Create(){
        $result = $this->service->create($this->getValidData(['foto' => null ]));
        $this->assertNotNull($result);
    
    }

    /** Test para crear un colaborador con datos faltantes  */
    public function test_Fail_Create(){
        $result = $this->service->create($this->getValidData(['especialidad' => null]));
        $this->assertNull($result);

    }

    /**Test para editar un colaborador con datos completos */
    public function test_Update(){
        $colaborador = factory(Colaborador::class)->create();
        $result = $this->service->update($colaborador->id, $this->getValidData());
        $this->assertNotFalse($result);
    }

    /**Tets para editar un colaborador con datos faltantes */
    public function test_Fail_Update(){
        $colaborador = factory(Colaborador::class)->create();
        $result = $this->service->update($colaborador->id, $this->getValidData(['descripcion' => null]));
        $this->assertFalse($result);

    }

    /**Test para Eliminar un Colaborador */
    public function test_Delete(){

        $colaborador = factory(Colaborador::class)->create();
        $result = $this->service->delete($colaborador->id);
        $this->assertTrue($result);

    }

    
}