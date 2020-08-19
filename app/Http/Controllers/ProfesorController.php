<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Rol;
use Illuminate\Support\Facades\Hash;

class ProfesorController extends Controller
{

    public function index()
    {
        $users = User::where('refrol', 3)->get();        
        return view('profesores.index')->with(compact('users'));
    }

    public function create()
    {
        $users = User::where('refrol', 3)->get();        
        return view('administradores.profesores.index')->with(compact('users'));
    }

    public function edit()
    {
      return view('profesores.editar_autenticado');
    }

    public function store(Request $request)
    {
        
        $rol = Rol::find(3);
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

        $user->update($request->all());
        
        return back();
        
    }

    public function actualizar(Request $request)
    {
        $user = User::findOrFail($request->id);

        $user->update($request->all());
        
        return view('profesores.index')->with('Perfil Actualizado');
    }

    public function destroy(Request $request)
    {
        
        $user = User::findOrFail($request->user_id);
        $user->delete();

        return back();

    }

}
