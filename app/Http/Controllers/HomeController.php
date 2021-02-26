<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Cliente;
use App\Models\Estado;
use App\Models\Exame;
use App\Models\Medico;
use App\Models\Paciente;
// use App\Models\Pais;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
        // $paises = Pais::count();
        $paises = DB::table('paises')->count();
        $estados = Estado::count();
        $cidades = Cidade::count();
        $clientes = Cliente::count();
        $exames = Exame::count();
        $medicos = Medico::count();
        $pacientes = Paciente::count();
        return view('dashboard', compact('users', 'clientes', 'estados', 'cidades', 'exames', 'medicos', 'pacientes'));
    }
}
