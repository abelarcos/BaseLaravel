<?php

// namespace Tests\Unit;

// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
// use Tests\TestCase;
// use App\User;

// class LoginTest extends TestCase
// {
//     use RefreshDatabase, WithFaker;
//     /**
//      * A basic unit test example.
//      *
//      * @return void
//      */
//     public function login_displays_the_login_form()
//     {
//         $response = $this->get(route('login'));

//         $response->assertStatus(200);

//         $response->assertViewIs('auth.login');
//     }

//     /**
//      * @test
//      */
//     public function login_displays_validation_errors(){

//         $response = $this->post(route('login'), []);

//         $response->assertStatus(302);
//         $response->assertSessionHasErrors('email');
//     }

    
//     /**
//      * @test
//      */
//     public function login_autenticates_and_redirects_user(){

//         $user = factory(User::class)->create();

//         $response = $this->post(route('login'), [

//             'email' => $user->email,
//             'password' => 'password'

//         ]);


//         $response->assertRedirect(route('home'));
//         $this->assertAuthenticatedAs($user);
//     }

//     /**
//      * @test
//      */
//     public function register_creates_and_authenticates_a_user(){

//         $response = $this->post(route('register'), [
//             'name' => 'JMac',
//             'email' => 'abel302010@hotmail.com',
//             'password' => 'abel12345',
//             'password_confirmation' => 'abel12345',
//         ]);
    
//         $response->assertRedirect(route('home'));

//         // $this->assertDatabaseHas('users', [
//         //     'name' => 'abel arcos',
//         //     'email' => 'abel302010@hotmail.com'
//         // ]);
        
//     //     $name = $this->faker->name;
//     //     $email = $this->faker->safeEmail;
//     //     $password = $this->faker->password(8);

//     //     $response = $this->post('register', [
//     //         'name' => $name,
//     //         'email' => $email,
//     //         'password' => $password,
//     //         'password_confirmation' => $password,

//     //     ]);
//     //     $response->assertRedirect(route('home'));

//     //     $this->assertDatabaseHas('users', [
//     //         'name' => $name,
//     //         'email' => $email,

//     //     ]);
//     }

// }
