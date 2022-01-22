<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\Request;
use PDF;

class CiudadController extends Controller
{
    public function index()
    {
        $ciudades = Ciudad::all();
        return view('ciudades.index', compact('ciudades'));
    }

    public function create()
    {
        return view('ciudades.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'provincia' => 'required',
            'pais' => 'required',
            'codigo_postal' => 'required',
        ]);

        Ciudad::create($request->all());
        return redirect()->route('ciudades.index');
    }

    public function show(Ciudad $ciudad)
    {
        //
    }

    public function edit($id)
    {
        $ciudad = Ciudad::find($id);
        return view('ciudades.edit', compact('ciudad'));
    }

    public function update(Request $request, Ciudad $ciudad)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'provincia' => 'required',
            'pais' => 'required',
            'codigo_postal' => 'required',
        ]);

        $ciudad->update($request->all());
        return redirect()->route('ciudades.index');
    }

    public function destroy($id)
    {
        Ciudad::find($id)->delete();
        return redirect()->route('ciudades.index');
    }

    public function restore()    /*Si queremos que se restaure un solo usuario se pasaría un parámetro como el ($id)*/   
    {
        Ciudad::withTrashed()->restore(); /*buscar en la papelera, luego método de restauración*/

        return redirect()->route('ciudades.index');    
    }

    public function onlyTrashed()    /*Si queremos que se restaure un solo usuario se pasaría un parámetro como el ($id)*/   
    {
        Ciudad::onlyTrashed()->forceDelete(); /*buscar en la papelera, luego método de borrado*/

        return redirect()->route('ciudades.index');    
    }
    public function createPDF()
    {
        $ciudades = Ciudad::all();

        view()->share('ciudades', $ciudades);
        $pdf = PDF::loadview('ciudades.pdf', $ciudades);
        set_time_limit(500);
        return $pdf->stream();
    }
}
