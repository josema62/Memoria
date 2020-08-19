<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\InstanciaCurso;

class ProyectoController extends Controller
{
    public function index($id)
    {
      $instancia = InstanciaCurso::findOrFail($id);
      $proyectos = $instancia->proyectos;
      $alumnos = InstanciaCurso::findOrFail($id)->alumnos()->where('estado', '=', 'false')->get();
      return view('instituciones.cursos.instanciacursos.proyectos.index')->with(compact('proyectos','instancia', 'alumnos'));
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $alumnos = Alumno::all();
        return view('proyectos.create', ['alumnos' => $alumnos]);
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	
    	$proyecto = new Proyecto();
        $proyecto->nombre = $request->nombre;
        $proyecto->estado = $request->estado;
        $proyecto->instancia_curso_id = $request->instancia_curso_id;
        $proyecto->save();
        return back();
    
    }

    public function asignaralumnos(Request $request)
    {
    //    $proyecto = Proyecto::find($request->proyecto_id);
    //    $instanciacurso = $proyecto->instanciacurso;
    //    $usuarios = $instanciacurso->alumnos;
    //    return view('instituciones/cursos/instanciacursos/'.$request->proyecto_id.'/proyectos')->with(compact('usuarios'));

    }






}
