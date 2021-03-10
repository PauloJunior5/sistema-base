<?php

namespace App\Http\Controllers;

use App\Interfaces\ContratoInterface;
use App\Models\Contrato;
use App\Traits\ShowCliente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContratoController extends Controller
{

    public function __construct(ContratoInterface $contratoInterface)
    {
        $this->contratoInterface = $contratoInterface;
    }

    public function index()
    {
        $contratos = $this->contratoInterface->index();
        return view('contratos.index', compact('contratos'));
    }

    public function create()
    {
        $clientes = $this->contratoInterface->create();
        return view('contratos.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        
        $cliente = json_decode($this->showCliente($request->id_responsavel)->getContent());

        // $teste = get_object_vars($cliente);

        $teste = DB::table('paises')->where('id', 1)->first();

        $contrato = new Contrato;
        $contrato->setContrato($request->get('contrato'));
        $contrato->setResponsavel($teste);
        $contrato->setCreated_at(Carbon::now()->toDateTimeString());

        $this->contratoInterface->store($contrato);
    }

    public function show($id)
    {
        return $this->contratoInterface->show($id);
    }

    public function edit($id)
    {
        $resultado = $this->contratoInterface->edit($id);
        $clientes = $resultado['clientes'];
        $contrato = $resultado['contrato'];
        $cliente = $resultado['cliente'];
        return view('contratos.edit', compact('clientes', 'contrato', 'cliente'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}