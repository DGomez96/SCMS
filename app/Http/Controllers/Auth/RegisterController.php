<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Roles;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //Recojo los dos documentos y hago una Uri por defecto
        $files = $_FILES;
        $URI_F = 'storage/uploads/DOCUMENTS/PDF';

        $usuario =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'company' => $data['company'],
            'description' => null,
            'status' => null,
            'landline' => $data['landline'],
            'mobilePhone' => $data['mobile-phone']
        ]);
        
        $usuario->save();
        
        //Trato los Documentos antes de los roles
        $contador = 0;
        foreach($files as $file){
            $contador++;
            $tmp_name = $file["tmp_name"];
            $name = strval($usuario->id)."-".basename($file["name"]);

            move_uploaded_file($tmp_name, "$URI_F/$name");

            //Aprovecho para hacer la consulta SQL
            
            DB::insert('insert into document (file, user_id,type,status) values (?,?,?,?)',[$name,$usuario->id,$contador,null]);
        }

        $roles =  Roles::create([
            'role_id' => 5,
            'user_id' => $usuario->id
        ]);

        $roles->save();

        return $usuario;
        
    }
}
