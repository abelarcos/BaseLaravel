<?php

use Illuminate\Database\Seeder;
use Codydev\Models\Skill;
class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::truncate();

        $faker = \Faker\Factory::create();

        for($i=0; $i<10; $i++){

        	Skill::create([

        		'descripcion' => $faker->title

        	]);

        }
        
    }
}
