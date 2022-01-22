<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Rules\Nif;
use PDF;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'dni' => [new Nif],
            'nombre' => 'required|min:3|max:12',
            'apellidos' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'f_nacimiento' => 'required',
        ]);

        Cliente::create($request->all());
        return redirect()->route('clientes.index');
    }

    public function show(Cliente $cliente)
    {
        //
    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $validated = $request->validate([
            'dni' => [new isValidni],
            'nombre' => 'required|min:3|max:12',
            'apellidos' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'f_nacimiento' => 'required',
        ]);

        $cliente->update($request->all());
        return redirect()->route('clientes.index');
    }

    public function destroy($id)
    {
        Cliente::find($id)->delete();
        return redirect()->route('clientes.index');
    }

    public function restore()    /*Si queremos que se restaure un solo usuario se pasaría un parámetro como el ($id)*/   
    {
        Cliente::withTrashed()->restore(); /*buscar en la papelera, luego método de restauración*/

        return redirect()->route('clientes.index');    
    }

    public function onlyTrashed()    /*Si queremos que se restaure un solo usuario se pasaría un parámetro como el ($id)*/   
    {
        Cliente::onlyTrashed()->forceDelete(); /*buscar en la papelera, luego método de borrado*/

        return redirect()->route('clientes.index');    
    }

    public function createPDF()
    {
        $clientes = Cliente::all();

        view()->share('clientes', $clientes);
        $pdf = PDF::loadview('clientes.pdf', $clientes);
        set_time_limit(500);
        return $pdf->stream();
    }
}
