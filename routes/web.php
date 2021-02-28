<?php


Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '', 'middleware' => [] ], function(){
    
    Route::get('login', ['uses' => 'LoginController@getLogin'])->name('public.login.index');
    Route::post('login', ['uses' => 'LoginController@postLogin'])->name('public.login.post');

});


// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// // Authentication Routes...
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// // Registration Routes...
// if ($options['register'] ?? true) {
//     Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//     Route::post('register', 'Auth\RegisterController@register');
// }

// // Password Reset Routes...
// if ($options['reset'] ?? true) {
//     Route::resetPassword();
// }

// // Email Verification Routes...
// if ($options['verify'] ?? false) {
//     Route::emailVerification();
// }





// Route::get('user/{nombre}/{id}', function($nombre, $id){

// })->where(['id' => '[0-9]+', 'nombre' => '[A-Za-z]+']);



// Route::get('/path',UserController::class);

// [Namespace\AppController::class, 'method']

// use App\Http\Controllers\UsuariosControllers;
// Route::get('users', ['UsuariosController::class', 'index']);

// Route::get('/path',[UserController::class, 'index']);
// Route::post('/path',[UserController::class, 'store']);
// Route::put('/path',[UserController::class, 'update']);
// Route::patch('/path',[UserController::class, 'update']);
// Route::delete('/path',[UserController::class, 'destroy']);


// //Sintaxis para rutas de tipo resource y apiResource
// Route::resource('users',UserController::class);
// Route::apiResource('users',UserController::class);

// // Sintaxis para action y redirect.
// action([UserController::class, 'index']);
// redirect()->action([UserController::class,'index']);




// Route::group(['prefix' => 'codybox', 'namespace' => 'Admin', 'middleware' => 'auth'], function(){
//     Route::get('creararchivo', 'FileController@form')->name('file.create');
//     Route::post('creararchivo', 'FileController@create')->name('file.store');

// });


// Route::get('creararchivo', 'FileController@form')->name('file.create');
// Route::post('creararchivo', 'FileController@create')->name('file.store');
// Route::get('ver-archivos/{name}', 'FileController@view')->name('file.view');



// Route::get('buscar', 'UsuariosController@search')->name('users.search');

// Route::get('crearusuario', 'UsuariosController@form')->name('users.create');
// Route::post('crearusuario', 'UsuariosController@create')->name('users.store');

// Route::get('editar/{id}', 'UsuariosController@edit')->name('users.edit');
// Route::put('actualizar/{id}', 'UsuariosController@update')->name('users.update');

// Route::get('editar/{id}', 'UsuariosController@edit')->name('users.edit');
// Route::put('actualizar/{id}', 'UsuariosController@update')->name('users.update');

// Route::get('ver/{id}', 'UsuariosController@show')->name('users.show');

// Route::delete('eliminar/{id}', 'UsuariosController@delete')->name('users.delete');




