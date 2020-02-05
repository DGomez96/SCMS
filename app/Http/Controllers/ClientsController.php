<?php

namespace App\Http\Controllers;

use App\Roles;
use App\User;
use App\UserImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//Librerias 
use Carbon\Carbon;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuarios = User::all();
        $imagenesU = UserImg::all();
        $roles = json_decode(DB::table('roles')->get());

        
    
        return view('/Panel-Admin/Clients/index')
        ->with('users',$usuarios)
        ->with('imgs',$imagenesU)
        ->with('roles',$roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //return $request->file('img')->getClientOriginalExtension();
        $usuario= $request->except(['_token','password','re-password','Rol','img']);
        $pwd1 = $request->input('password');
        $pwd2 = $request->input('re-password');
        $rol = $request->input('Rol');
        $nombreImg =  $request->file('img')->getClientOriginalName();
        $opt_enc = [
            'cost' => 15
        ];
        if($pwd1 === $pwd2){
            $passEnc = password_hash($pwd1,PASSWORD_BCRYPT,$opt_enc);

            $usuario['password'] = $passEnc;
            $usuario['created_at']=  Carbon::now()->toDateTimeString();
            $usuario['updated_at'] =  Carbon::now()->toDateTimeString();

            User::insert($usuario);

            $last_ID = User::all()->last()['id'];

            $rol_u = [
                'role_id' => $rol,
                'user_id' => $last_ID,
                'created_at' =>Carbon::now()->toDateTimeString(),
                'updated_at' =>Carbon::now()->toDateTimeString()
            ];

            Roles::insert($rol_u);

            $img_u = [
                'img' => $request->file('img')->store('uploads','public'),
                'id_user' => $last_ID,
                'created_at' =>Carbon::now()->toDateTimeString(),
                'updated_at' =>Carbon::now()->toDateTimeString()
            ];

            UserImg::INSERT($img_u);

            return $this->index();
            
        }else{
            return 0;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        if(isset($_GET['edit'])){
            $edit = $_GET['edit'];
                $usuario = User::find($id);
                $imgProfile = UserImg::where('id_user',$usuario->id)->get();
                $rol =DB::select('SELECT R.name FROM role_user as R_U,roles as R  WHERE R_U.user_id = '.$id.' AND R_U.role_id = R.id ');

                $rol = json_decode(json_encode($rol),true);
                return view('Panel-Admin/Clients/show')
                ->with('user',$usuario)
                ->with('imgProfile',$imgProfile)
                ->with('rol',$rol);
        }else{
            $usuario = User::find($id);
            $imgProfile = UserImg::where('id_user',$usuario->id)->get();
            $rol =DB::select('SELECT R.name FROM role_user as R_U,roles as R  WHERE R_U.user_id = '.$id.' AND R_U.role_id = R.id ');

            return view('Panel-Admin/Clients/show')
                ->with('user',$usuario)
                ->with('imgProfile',$imgProfile)
                ->with('rol',$rol);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);
        $imgProfile = UserImg::where('id_user',$usuario->id)->get();

        return view('Panel-Admin/Clients/edit')
            ->with('user',$usuario)
            ->with('imgProfile',$imgProfile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $update_user = $request->except(['_token','_method','id','edit']);
        
        $id = $request->id;

        User::where('id','=',$id)->update($update_user);

        if(isset($_GET['edit'])){
            return $this->index();
        }else{
            return $this->show($id);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::destroy($id);

        return $this->index();
    }
}
