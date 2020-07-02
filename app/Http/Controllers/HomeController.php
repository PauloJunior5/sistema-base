<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Cliente;
use App\Estado;
use App\Exame;
use App\Pais;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::count();
        $paises = Pais::count();
        $estados = Estado::count();
        $cidades = Cidade::count();
        $clientes = Cliente::count();
        $exames = Exame::count();
        return view('dashboard', compact('users', 'clientes', 'paises', 'estados', 'cidades', 'exames'));
    }
}
