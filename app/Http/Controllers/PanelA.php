<?php

namespace App\Http\Controllers;
use App\User;
use App\UserImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanelA extends Controller
{
    
    //Parte Indice
    public function index()
    {
        return view('Panel-Admin.index');
    }


    //Parte Clientes

    //index
    public function clientes(){

        $usuarios = User::all();
        $imagenesU = UserImg::all();
        return view('/Panel-Admin/Clientes/index')
            ->with('users',$usuarios)
            ->with('imgs',$imagenesU);
    }

    //edit
    public function editclientes($id){
        return view('Panel-Admin/Clientes/edit');
    }

    //Parte Factura
    public function factura(){
        return view('/Panel-Admin/factura');
    }

    //Parte Chat
    public function chat(){
        $usuario = Auth::user()->name;
        return view('/Panel-Admin/chat')
        ->with('usuario',$usuario);
    }
    /*
    public function send(Request $request){
        $user = User::find(Auth::id());
        event (new ChatEvent($request->message, $user));
    }
    public function send(){
        $message = 'Hola como vas!';
        $user = User::find(Auth::id());
        return event (new ChatEvent($message, $user) );
    }*/
}
