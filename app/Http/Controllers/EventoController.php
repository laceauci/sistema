<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['eventos']= Evento::paginate(10);
        return view('evento.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datosEvento = request()->all(); //Devuelve todos los datos
        $datosEvento = request()->except(['_token','_method']); //Devueltos all excepto los que se pasan ahí
        Evento::insert($datosEvento);
        //print_r($datosEvento);
        //return redirect('/evento')->with('mensaje','Evento agregado con éxito.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['eventos'] = Evento::all();
        return response()->json($data['eventos']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datosEvento = request()->except(['_token','_method']); //Devueltos all excepto los que se pasan ahí
        $respuesta = Evento::where('id','=',$id)->update($datosEvento);
        return response()->json($respuesta);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eventos = Evento::findOrfail($id);
        Evento::destroy($id);
        return response()->json($id);
    }
}
