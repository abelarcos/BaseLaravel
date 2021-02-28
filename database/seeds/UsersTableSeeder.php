<?php


use Illuminate\Database\Seeder;
use Codydev\Models\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::truncate();
      

        // $faker = \Faker\Factory::create();

        // $password = \Hash::make('abel123');

        // for($i=0; $i<100; $i++){

        // 	User::create([

	    //     	'name' => $faker->name,
	    //     	'email'  => $faker->email,
	    //     	'password' => $password

        // 	]);

        // }

        $user = new User;
        $user->name = "abel arcos";
        $user->email = "abel302010@hotmail.com";
        $user->password = \Hash::make('abel12345');
        $user->save();


    }
}
