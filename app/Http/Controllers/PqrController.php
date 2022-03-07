<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pqr;
use Carbon\Carbon;

class PqrController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-pqr|crear-pqr|editar-pqr|borrar-pqr')->only('index');
         $this->middleware('permission:crear-pqr', ['only' => ['create','store']]);
         $this->middleware('permission:editar-pqr', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-pqr', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
         //Con paginación
         $pqrs= Pqr::paginate(5);
         return view('pqrs.index',compact('pqrs'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pqrs.crear');
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
            'solicitud' => 'required',
            'motivo' => 'required',
        ]);
    
        Pqr::create($request->all());
    
        return redirect()->route('pqrs.index');
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
    public function edit(Pqr $pqr)
    {
        return view('pqrs.editar',compact('pqr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pqr $pqr)
    {
         request()->validate([
            'solicitud' => 'required',
            'motivo' => 'required',
        ]);
    
        $pqr->update($request->all());
    
        return redirect()->route('pqrs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pqr $pqr)
    {
        $pqr->delete();
    
        return redirect()->route('pqrs.index');
    }
}