<?php

namespace App\Http\Controllers;

class InicioController extends Controller
{
    /**
     * Muestra la página de inicio.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        return view('inicio');
    }
}
    