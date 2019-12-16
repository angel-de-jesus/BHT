<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tarea;
use App\Proyecto;
class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = DB::table('tareas')->paginate(15);
        return view('admin.tarea.index')->with(compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $proyecto = Proyecto::orderBy('nombre')->get();
        // return view('tarea.create')->with(compact('proyecto')); //formulario para nuevo registro
        return view('admin.tarea.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre = $request['name'];
        $descripcion = $request['descripcion'];
        $fechaFin = $request['fechaEntrega'];
        $horaEntrega = $request['horaEntrega'];
        $responsable = $request['responsable'];
        $proyecto = $request['proyecto_id'];
    
       
        $tarea = new Tarea();
        $tarea ->nombre = $nombre;
        $tarea ->descripcion = $descripcion;
        $tarea ->fechaFin = $fechaFin;
        $tarea ->horaEntrega = $horaEntrega;
        $tarea ->responsable = $responsable;
        $tarea ->proyecto_id =$proyecto;
        $tarea ->save();
        
        return redirect('/tarea')->with('success', 'tarea guardada');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tareas = Tarea::find($id);
        return view('admin.tarea.detail')->with(compact('tareas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarea = Tarea::find($id);
        return view('admin.tarea.edit', compact('tarea'));
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
            'name' => 'required',
            'descripcion' => 'required',
            'fechaEntrega' => 'required',
            'horaEntrega' => 'required',
            'responsable' => 'required',
        ]);
        $tarea = Tarea::find($id);
        $tarea->nombre = $request->get('name');
        $tarea->descripcion = $request->get('descripcion');
        $tarea->fechaFin = $request->get('fechaEntrega');
        $tarea->horaEntrega = $request->get('horaEntrega');
        $tarea->responsable = $request->get('responsable');
        $tarea->save();
        return redirect()->route('tarea.index')->with('success', 'Tarea actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
