<?php

namespace App\Http\Controllers;

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
        $clientes =  DB::table('clientes')->count();
        $medicos = DB::table('medicos')->count();
        $pacientes = DB::table('pacientes')->count();
        $exames = DB::table('exames')->count();

        return view('dashboard', compact('clientes', 'medicos', 'pacientes', 'exames'));
    }
}
