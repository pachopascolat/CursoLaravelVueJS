<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vianda;

class ViandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $viandas = Vianda::orderBy('id','DESC')->paginate(3);
        return view('vianda.index',compact('viandas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $vianda = new Vianda();
        
        return view('vianda.create')->with(['vianda'=>$vianda]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
        	'nombre'=>'required', 
        	'descripcion'=>'required', 
        	'precio'=>'required', 
        	'vegetariana'=>'required'
        ]);
        $vianda = Vianda::create($request->all());
        return redirect()->route('vianda.index')->with('success','Vianda creada satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $viandas = Vianda::find($id);
        return  view('vianda.show',compact('viandas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $vianda = Vianda::find($id);
        return view('vianda.edit',compact('vianda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)    {
        //
        $this->validate($request,[ 
        	'nombre'=>'required', 
        	'descripcion'=>'required', 
        	'precio'=>'required',
        	'vegetariana' => 'required'
        ]);

        Vianda::find($id)->update($request->all());
        return redirect()->route('vianda.index')->with('success','Vianda actualizada satisfactoriamente');

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
        Vianda::find($id)->delete();
        return redirect()->route('vianda.index')->with('success','Vianda eliminada satisfactoriamente');
    }
}