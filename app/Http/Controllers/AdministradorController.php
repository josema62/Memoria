<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Rol;
use Illuminate\Support\Facades\Hash;

class AdministradorController extends Controller
{
    public function index()
    {
        $users = User::where('refrol', 2)->get();        
        return view('administradores.index')->with(compact('users'));
    }

    public function create()
    {
        $users = User::where('refrol', 2)->get();        
        return view('superadmin.administradores.index')->with(compact('users'));
    }

    public function edit()
    {
      return view('administradores.editar_autenticado');
    }

    public function store(Request $request)
    {
        $rol = Rol::find(2);
        $usuario = new User;
        $usuario->name =  $request->name;
        $usuario->apellido =  $request->apellido;
        $usuario->email =  $request->email;
        $usuario->password =  Hash::make($request->password);
        $usuario->refrol = $rol->id;
        $usuario->save();

        return back();
    }

    public function update(Request $request)
    {

        $user = User::findOrFail($request->user_id);

        $user->update($request->name, $request->apellido, $request->email, Hash::make($request->password));
       
        return back();
    }

    public function actualizar(Request $request)
    {
        
        $user = User::findOrFail($request->id);
        $user->name =  $request->name;
        $user->apellido =  $request->apellido;
        $user->email =  $request->email;
        $user->password =  Hash::make($request->password);
        $user->update();
        
        return view('administradores.index')->with('Perfil Actualizado');           
            
    }

    public function destroy(Request $request)
    {
        
        $user = User::findOrFail($request->user_id);
        $user->delete();

        return back();

    }
}


