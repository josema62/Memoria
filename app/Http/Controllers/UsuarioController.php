<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class UsuarioController extends Controller
{
    public function index()
    {
      $alumnos = Alumno::all();
    	return view('usuarios.usuario', ['alumnos' => $alumnos]);
    }

    public function edit()
    {
      return view('editar_autenticado');
    }

    public function update(Request $request)
    {
      $rol = Rol::find(3);
      $usuario = new User;
      $usuario->name =  $request->name;
      $usuario->apellido =  $request->apellido;
      $usuario->email =  $request->email;
      $usuario->password =  Hash::make($request->password);
      $usuario->refrol = $rol->id;
      $usuario->save();
    }
}
