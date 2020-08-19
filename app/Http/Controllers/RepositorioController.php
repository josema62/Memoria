<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repositorio;
use App\Models\Proyecto;

class RepositorioController extends Controller
{
    public function index($id)
    {

      $proyecto = Proyecto::findOrFail($id);
      $repositorios = $proyecto->repositorios;
      return view('instituciones.cursos.instanciacursos.proyectos.repositorios.index')->with(compact('proyecto','repositorios'));
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $proyecto = Proyecto::find($request->id);
        return view('repositorios.create', ['proyecto' => $proyecto]);
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
    	$repositorio = new Repositorio();
        $repositorio->linkgit = $request->linkgit;
        $repositorio->refproyecto = $id;
        $repositorio->save();
        
        return redirect('/instituciones/cursos/instanciacursos/proyectos/'.$id.'/repositorios')->with('success', 'Instancia Agregada');
    }



    public function clone(Request $request)
    {
        
    	 \Cz\Git\GitRepository::cloneRepository($request->linkgit);

    	 return 'Clonado';
    }

    public function show()
    {
        
    }
}
