<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\InstanciaCurso;
use App\User;
use App\Models\Rol;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Excel;

class AlumnoController extends Controller
{
    public function index($id)
    {
      $instancia = InstanciaCurso::findOrFail($id);
      $alumnos = $instancia->alumnos;
    	return view('instituciones.cursos.instanciacursos.alumnos.index')->with(compact('alumnos','instancia'));
    }

    public function show()
    {

    	
    }

    public function importUsers(Request $request, $id)
{
    \Excel::load($request->excel, function($reader) {
 
        $excel = $reader->get();
 
        // iteracción
        $reader->each(function($row) {
 
            $user = new Alumno;

            if (strpos($row->correo, 'alumnos.utalca.cl') !== false) {
            $user->nombre = $row->nombre;
            $user->apellido = $row->apellido;
            $user->correo = $row->correo;
            $user->save();

        }

 
        });
    
    });
 
            $alumnos = Alumno::all();
            $rol = Rol::find(4);
            foreach($alumnos as $alumno){
            $usuario = new User;
            $usuario->name = $alumno->nombre;
            $usuario->apellido = $alumno->apellido;
            $usuario->email = $alumno->correo;
            $usuario->password = Hash::make('12345678');
            $usuario->refrol = $rol->id;
            $usuario->save();
            $alumno->delete();
            $instancia = InstanciaCurso::findOrFail($id);
            $instancia->alumnos()->attach($usuario->id);
            }           
    return redirect('/instituciones/cursos/instanciacursos/'.$id.'/alumnos')->with(compact('alumnos','instancia'));
}

public function load($id)
    {

        $alumnos = Alumno::all();

        $rol = Rol::find(4);
            foreach($alumnos as $alumno){
            $usuario = new User;
            $usuario->name = $alumno->nombre;
            $usuario->apellido = $alumno->apellido;
            $usuario->email = $alumno->correo;
            $usuario->password = Hash::make('12345678');
            $usuario->refrol = $rol->id;
            $usuario->save();
            $instanciacurso = InstanciaCurso::findOrFail($id);
            $instanciacurso->users()->sync($usuario->email);
            }


    }

    public function update(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        $user->update($request->all());
       
        return back();
    }
}
