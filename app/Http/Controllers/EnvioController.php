<?php

namespace App\Http\Controllers;

use App\Models\Envio;
use Illuminate\Http\Request;
use PDF;

class EnvioController extends Controller
{

    public function index()
    {
        $envios = Envio::all();
        return view('envios.index', compact('envios'));
    }

    public function create()
    {
        return view('envios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'producto' => 'required|min:3|max:12',
            'destino_id' => 'required',
            'cliente_id' => 'required',
            'repartidor_id' => 'required',
        ]);

        Envio::create($request->all());
        return redirect()->route('envios.index');
    }

    public function show(Envio $envio)
    {
        //
    }

    public function edit(Envio $envio)
    {
        //
    }

    public function update(Request $request, Envio $envio)
    {
        //
    }

    public function destroy($id)
    {
        Envio::find($id)->delete();
        return redirect()->route('envios.index');
    }

    public function restore()    /*Si queremos que se restaure un solo usuario se pasaría un parámetro como el ($id)*/   
    {
        Envio::withTrashed()->restore(); /*buscar en la papelera, luego método de restauración*/

        return redirect()->route('envios.index');    
    }

    public function onlyTrashed()    /*Si queremos que se restaure un solo usuario se pasaría un parámetro como el ($id)*/   
    {
        Envio::onlyTrashed()->forceDelete(); /*buscar en la papelera, luego método de borrado*/

        return redirect()->route('envios.index');    
    }

    public function createPDF()
    {
        $envios = Envio::all();

        view()->share('envios', $envios);
        $pdf = PDF::loadview('envios.pdf', $envios);
        set_time_limit(500);
        return $pdf->stream();
    }
}
