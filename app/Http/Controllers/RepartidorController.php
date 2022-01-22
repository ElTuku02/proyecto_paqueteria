<?php

namespace App\Http\Controllers;

use App\Models\Repartidor;
use Illuminate\Http\Request;
use App\Rules\Nif;
use PDF;

class RepartidorController extends Controller
{
    public function index()
    {
        $repartidores = Repartidor::all();
        return view('repartidores.index', compact('repartidores'));
    }

    public function create()
    {
        return view('repartidores.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'dni' => [new Nif],
            'nombre' => 'required|min:3|max:12',
            'apellidos' => 'required',
            'telefono' => 'required',
            'email' => 'required',
        ]);

        Repartidor::create($request->all());
        return redirect()->route('repartidores.index');
    }

    public function show(Repartidor $Repartidor)
    {
        //
    }

    public function edit($id)
    {
        $repartidor = Repartidor::find($id);
        return view('repartidores.edit', compact('repartidor'));
    }

    public function update(Request $request, Repartidor $repartidor)
    {
        $validated = $request->validate([
            'dni' => 'required',
            'nombre' => 'required|min:3|max:12',
            'apellidos' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'f_nacimiento' => 'required',
            'ciudad_id' => 'required',
        ]);

        $repartidor->update($request->all());
        return redirect()->route('repartidores.index');
    }

    public function destroy($id)
    {
        Repartidor::find($id)->delete();
        return redirect()->route('repartidores.index');
    }

    public function restore()    /*Si queremos que se restaure un solo usuario se pasaría un parámetro como el ($id)*/   
    {
        Repartidor::withTrashed()->restore(); /*buscar en la papelera, luego método de restauración*/

        return redirect()->route('repartidores.index');    
    }

    public function onlyTrashed()    /*Si queremos que se restaure un solo usuario se pasaría un parámetro como el ($id)*/   
    {
        Repartidor::onlyTrashed()->forceDelete(); /*buscar en la papelera, luego método de borrado*/

        return redirect()->route('repartidores.index');    
    }

    public function repartidorEnvios($repartidorId)
    {
        $envios = Envio::where('repartidor',$repartidorId)->get();
        return view('repartidores.index', compact('envios'));
    }

    public function createPDF()
    {
        $repartidores = Repartidor::all();

        view()->share('repartidores', $repartidores);
        $pdf = PDF::loadview('repartidores.pdf', $repartidores);
        set_time_limit(500);
        return $pdf->stream();
    }
}
