<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
// use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller  //BaseController
{
    public function __construct(){

    }

    public function getLogin(){
        return view('auth.login');

    }

    public function postLogin(){

        // $email = \Request::get('email', null);

        // $password = \Request::get('password', null);

        // $remember = \Request::get('remember', false);


        // try {

        //     if(null === $email) throw new \Exception('por favor ingresa tu usuario o tu correo electronico');
        //     if(null === $password) throw new \Exception('por favor ingresa tu contraseña');

        //     $credentials = compact('email', 'password');

        //     $user = \Auth::attempt($credentials, $remember !== false);

        
        //     if(null === $user || false === $user) throw new \Exception('No se logro iniciar sesion');
           
        //     dd($user);

        //     return redirect()->route('dashboard');

        //     //code...
        // } catch (\Exception $e) {

        //     // \Alert::error(_i('Tu cuenta no ha sido activada todavía.'))->flash();

        //     return 'tu cuenta no ha sido activadda todavia';
        //     return redirect()->route('public.login.index');
        //     //throw $th;
        // }catch(\Exception $e){
        //     \Log::error($e);
        //     // \Alert::error($e->getMessage())->flash();
        //     return redirect(route('public.login.index'));

        // }

        // dd($request->all());

        // dd(request()->all());

        // $credentials = $this->validate($request, [

        //     'email' => 'required|email|string',
        //     'password' => 'required|string'
        // ]);
        
        $credentials = $this->validate(request(),[
            'email' => 'required|email|string',
            'password' => 'required|string'
            
        ]);

        if(Auth::attempt($credentials)){

            // return redirect()->route('home'); 
            'has iniciado sesion correctamente';
        }
        
        return 'Error en la autenticacion';
      
        return back()
            ->withErrors(['email' => trans('auth.failed')])
            ->withInput(request(['email']));

    }

    public function getLogout(){

    }

    public function getForgot(){

    }
}
