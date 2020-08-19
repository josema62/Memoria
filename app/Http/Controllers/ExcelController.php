<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use Maatwebsite\Excel\Excel;

class ExcelController extends Controller
{
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
    $instanciacurso = InstanciaCurso::find($id);
    return view('instituciones.cursos.instanciacursos.alumnos.index')->with(compact('alumnos','instanciacurso'));
}
}
