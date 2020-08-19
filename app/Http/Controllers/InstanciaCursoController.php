<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\InstanciaCurso;
use App\User;

class InstanciaCursoController extends Controller
{
    //

    public function index($id)
    {

        $curso = Curso::find($id);
        $instanciacursos = $curso->instanciacursos;
        $users = User::where('refrol', 3)->get();
    	return view('instituciones.cursos.instanciacursos.index')->with(compact('curso', 'instanciacursos', 'users'));
    }

    public function create($id)
    {

        $curso = Curso::find($id);
        $instanciacursos = $curso->instanciacursos;
        $users = User::all();
    	return view('instituciones.cursos.instanciacursos.create')->with(compact('curso', 'instanciacursos', 'users'));
    }

            /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	
        $instanciacurso = new InstanciaCurso();
        $instanciacurso->ano = $request->get('ano');
        $instanciacurso->semestre = $request->get('semestre');
        $instanciacurso->refcurso = $request->refcurso;
        $instanciacurso->user_id = $request->get('user_id');
        $instanciacurso->save();
    	
        return back();
    }

    

}
