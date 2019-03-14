<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Servicio;
use Illuminate\Support\Facades\Auth;



class ServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Servicio::where('user_id', auth()->id())->get();
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
        $servicio = new Servicio();
        $servicio->descripcion      = $request->cliente;
        $servicio->cliente          = $request->cliente;
        $servicio->fecha_servicio   = $request->fecha_servicio;
        $servicio->user_id          = auth()->id();
        $servicio->save();

        return $servicio;
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $servicio = Servicio::find($id);
        $servicio->descripcion = $request->descripcion;
        $servicio->save();

        return $servicio;
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
        $servicio = Servicio::find($id);
        $servicio->delete();
    }
}
