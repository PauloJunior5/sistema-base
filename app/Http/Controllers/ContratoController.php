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
        $clientes = $this->clienteRepository->mostrarTodos();
        $contrato = $this->contratoService->buscarEInstanciar($id);
        return view('contratos.edit', compact('clientes', 'contrato'));
    }

    public function update(ContratoRequest $request)
    {
        $contrato = $this->contratoService->instanciarEAtualizar($request);

        if ($contrato) {
            return redirect()->route('contrato.index')->with('Success', 'Contrato alterado com sucesso.');
        } else {
            return redirect()->route('contrato.index')->with('Warning', 'Não foi possivel editar contrato.');
        }
    }

    public function destroy($id)
    {
        //
    }
}