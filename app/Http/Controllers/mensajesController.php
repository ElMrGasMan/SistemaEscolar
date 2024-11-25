<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mensajesController extends Controller
{
    public function saludo() {
        return view('Saludos.saludo');
    }
}
