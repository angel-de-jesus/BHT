<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Proyecto;
use App\Tarea;
class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $proyectos = Proyecto::where('delete', '=', 0)->paginate(10);
      
      return view('admin.proyecto.index', compact('proyectos'))->with('i', (request()->input('page',1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.proyecto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // -----------obtenemos los dato del formulario y lo almacenamos en variale-------------------
         $nombre = $request['name'];
         $descripcion = $request['descripcion'];
         $buscador = $request['buscador'];
         $fechaFin = $request['fechaEntrega'];
         $responsable = $request['responsable'];
    
         // --------------creamos un nuevo proyecto y almacenamos los datos del proyecto a la base de datos----------
         $proyecto = new proyecto();
         $proyecto ->nombre = $nombre;
         $proyecto ->descripcion = $descripcion;
         $proyecto ->buscador = $buscador;
         $proyecto ->fechaFin = $fechaFin;
         $proyecto ->responsable = $responsable;
         $proyecto ->delete = 0;
         $proyecto ->save();
            
        
         return redirect('/proyecto')->with('success', 'proyecto guardado');
     
                      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $proyectos = proyecto::find($id);
      $tareas = $proyectos->tareas()->paginate(6);
      return view('admin.proyecto.detail')->with(compact('proyectos', 'tareas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyecto = Proyecto::find($id);
        return view('admin.proyecto.edit', compact('proyecto'));
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
        'buscador' => 'required',
        'fechaEntrega' => 'required',
        'responsable' => 'required',
      ]);
      $proyecto = Proyecto::find($id);
      $proyecto->nombre = $request->get('name');
      $proyecto->descripcion = $request->get('descripcion');
      $proyecto->buscador = $request->get('buscador');
      $proyecto->fechaFin = $request->get('fechaEntrega');
      $proyecto->responsable = $request->get('responsable');
      $proyecto->save();
      return redirect()->route('proyecto.index')->with('success', 'Proyecto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){   
      $proyecto = Proyecto::find($id);
      $proyecto->delete = True;
      $proyecto->save();
      return redirect()->route('proyecto.index')->with('success', 'Proyecto eliminado');
    }

    // public function buscar(Request $request){
    //   $buscar = $request['buscar'];
    //   $proyectos = Proyecto::where('nombre', '=', $buscar)->paginate(5);
    //   return view('admin.proyecto.index', compact('proyectos'))->with('i', (request()->input('page',1) -1)*5);
    // }
}
