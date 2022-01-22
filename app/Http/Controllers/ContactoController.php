<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EmailContact;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function index(){
        return view('contactos.index');
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mensaje' => 'required',
        ]);

        $correo = new EmailContact($request->all());     
        Mail::to('gf9860755@gmail.com')->send($correo);
        return redirect()->route('home')->with('info','Correo enviado');
    }
}
