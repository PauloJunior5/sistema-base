<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContratoRequest;
use App\Repositories\ClienteRepository;
use App\Repositories\ContratoRepository;
use App\Services\ContratoService;

class ContratoController extends Controller
{

    public function __construct()
    {
        $this->contratoRepository = New ContratoRepository;
        $this->contratoService = New ContratoService;
        $this->clienteRepository = New ClienteRepository;
    }

    public function index()
    {
        $contratos = $this->contratoRepository->mostrarTodos();
        return view('contratos.index', compact('contratos'));
    }

    public function create()
    {
        $clientes = $this->clienteRepository->mostrarTodos();
        return view('contratos.create', compact('clientes'));
    }

    public function store(ContratoRequest $request)
    {
        $contrato = $this->contratoService->instanciarECriar($request);

        if ($contrato) {
            return redirect()->route('contrato.index')->with('Success', 'Contrato criado com sucesso.')->send();
        } else {
            return redirect()->route('contrato.index')->with('Warning', 'Não foi possivel criar contrato.')->send();
        }
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