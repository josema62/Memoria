<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Institucion;

class CursoController extends Controller
{
    public function index($id)
    {

        $institucion = Institucion::find($id);
        $cursos = $institucion->cursos;
    	return view('instituciones.cursos.index')->with(compact('institucion', 'cursos'));
    }
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $institucion = Institucion::find($id);
        $cursos = $institucion->cursos;
    	return view('instituciones.cursos.create')->with(compact('institucion', 'cursos'));
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $curso = new Curso();
        $curso->nombre = $request->get('nombre');
        $curso->refinstitucions = $request->get('refinstitucions');
        $curso->save();
    	
        return redirect('/instituciones/'.$id.'/cursos')->with('success', 'Curso Agregado');
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('usuarios/profesores');
    }
    public function edit($id)
    {
        $profesor = Profesor::find($id);
        
        return view('usuarios/profesores.edit', compact('profesor'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'nombre'=>'required',
            'apellido'=> 'required|string',
            'correo' => 'required|string',
            'password' => 'required|string'
          ]);

        $profesor = Profesor::find($id);
        $profesor->nombre = $request->get('nombre');
        $profesor->apellido = $request->get('apellido');
        $profesor->correo = $request->get('correo');
        $profesor->password = $request->get('password');
        $profesor->save();
        return redirect('usuarios/profesores')->with('success', 'Profesor actualizado');
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $profesor = Profesor::find($id);
        $profesor->delete();
  
        return redirect('usuarios/profesores')->with('success', 'Profesor Eliminado');
    }
}
