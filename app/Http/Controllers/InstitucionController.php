<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institucion;
use App\User;

class InstitucionController extends Controller
{
    public function index()
    {

        $instituciones = Institucion::all();
        $users = User::where('refrol', 2)->get();
    	return view('instituciones.index')->with(compact('instituciones', 'users'));
    }
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instituciones = Institucion::all();
        $users = User::where('refrol', 2)->get();
    	return view('superadmin.instituciones.index')->with(compact('instituciones', 'users'));
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	
        $institucion = new Institucion;
        $institucion->nombre = $request->nombre;
        $institucion->razonsocial = $request->razonsocial;
        $institucion->refadmin = $request->refadmin;
        $institucion->save();
        return back();
    }

    public function update(Request $request)
    {

        $institucion = Institucion::findOrFail($request->institucion_id);

        $institucion->update($request->all());
       
        return back();
    }

    public function destroy(Request $request)
    {
        
        $institucion = Institucion::findOrFail($request->institucion_id);
        $institucion->delete();

        return back();

    }
}
