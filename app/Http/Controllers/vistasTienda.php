<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class vistasTienda extends Controller
{
    //

    //Vistas
    public function index()
    {
        return view('Tienda.index');
    }

    public function productos(){
        return view('Tienda.shop');
    }

    public function faq(){
        return view('Tienda.faq');
    }

    public function miCuenta(){
        //Cojo el Usuario completo
        $usuario =Auth::user();
        //Compruebo si hay alguien autentificado
        $autenticacion = Auth::check();
       
        if ($autenticacion == false ){
            return view('Tienda.register');
        }else{
             //Recojo el ID_ROL si esta autentificado
            $id_rol = Auth::user()->roles()->get()[0]['pivot']['role_id'];

            if($id_rol != 5){
                 //paso el usuario a la vista       

                 return redirect('panelAdministrador/')->with('usuario',$usuario);
            }else{
                //paso el usuario a la vista
                return view('Tienda.my-account')->with('usuario',$usuario);
            }
            
        }
    }


    public function sigin(){
        return view('Tienda.register');
    }

    public function myacc(){
        return view('Tienda.my-account');
    }

    public function shop(){

        $productos = Product::get();
        return view('Tienda.shop')
            ->with('productos',$productos);
    }

    public function login(){
        return view('Tienda.login');
    }
}
