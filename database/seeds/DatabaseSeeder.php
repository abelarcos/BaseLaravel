<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //DESABILITAR LA REVISION DE LAS LLAVES FORANEAS
            //DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // $this->call(UsersTableSeeder::class);
        // $this->call(SkillsTableSeeder::class);
            //DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        //HABILITAR LA REVISION DE LAS LLAVES FORANEAS

        // $this->call(UsersTableSeeder::class);
        // $this->call(SkillsTableSeeder::class);
        // $this->call(AgendasTableSeeder::class);
        // $this->call(ColaboradorTableSeeder::class);
        // $this->call(EntrenadoresTableSeeder::class);

        //Cargar seedeers de forma configurable en produccion y local

            $this->truncateTables([
                'users',
                'skills',
                'user_skill',
                'agendas',
                'files',
                'post_files',
                'categories',
                'colaboradores',
                'entrenadores',
                'pokemones'

            ]);

            // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            collect(config('seeders')[app()->environment()])
                ->where('callable', true)
                ->each(function($seeder){
                    $this->call($seeder['name']);
                });
            // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
      
    }

    public function truncateTables(array $tables){

        foreach($tables as $table){
            DB::table($table)->truncate();
        }

    }


}
