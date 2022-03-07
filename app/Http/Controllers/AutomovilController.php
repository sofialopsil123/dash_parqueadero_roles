<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Automovil;

//agregamos
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;



class AutomovilController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:ver-automovil|crear-rol|editar-rol|borrar-automovil', ['only' => ['index']]);
         $this->middleware('permission:crear-automovil', ['only' => ['create','store']]);
         $this->middleware('permission:editar-automovil', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-automovil', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con paginación
        $automoviles = Automovil::paginate(5);
        return view('automoviles.index',compact('automoviles'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $roles->links() !!} 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('automoviles.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'placa' => 'required',
            'color' => 'required',
            'marca' => 'required',
            'observaciones' => 'required',
        ]);
    
        Automovil::create($request->all());
    
        return redirect()->route('automoviles.index');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)

    
    {
        $automovil = Automovil::find($id);
        return view('automoviles.editar',compact('automovil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Automovil $automovil)
    {
    
        request()->validate([
            'placa' => 'required',
            'marca' => 'required',
            'color' => 'required',
            'observaciones' => 'required',
           
        ]);
    
        $automovil->update($request->all());
    
        return redirect()->route('automoviles.index');
    }
   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("automovil")->where('id',$id)->delete();
        return redirect()->route('automoviles.index');                        
    }
}

