<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Repositories\CidadeRepository;
use App\Repositories\ClienteRepository;
use App\Repositories\CondicaoPagamentoRepository;
use App\Repositories\EstadoRepository;
use App\Repositories\FormaPagamentoRepository;
use App\Repositories\PaisRepository;
use App\Services\ClienteService;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->clienteRepository = New ClienteRepository;
        $this->clienteService = New ClienteService;
        $this->paisRepository = New PaisRepository;
        $this->estadoRepository = New EstadoRepository;
        $this->cidadeRepository = New CidadeRepository;
        $this->formasPagamentoRepository = New FormaPagamentoRepository;
        $this->condicoesPagamentoRepository = New CondicaoPagamentoRepository;
    }

    public function index()
    {
        $clientes = $this->clienteRepository->mostrarTodos();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        $paises  = $this->paisRepository->mostrarTodos();
        $estados  = $this->estadoRepository->mostrarTodos();
        $cidades  = $this->cidadeRepository->mostrarTodos();
        $formasPagamento =  $this->formasPagamentoRepository->mostrarTodos();
        $condicoesPagamento = $this->condicoesPagamentoRepository->mostrarTodos();
        return view('clientes.create', compact('paises', 'estados', 'cidades', 'formasPagamento', 'condicoesPagamento'));
    }

    public function store(ClienteRequest $request)
    {
        $cliente = $this->clienteService->instanciarECriar($request);
        if ($cliente) {
            return redirect()->route('cliente.index')->with('Success', 'Cliente criado com sucesso.')->send();
        } else {
            return redirect()->route('cliente.index')->with('Warning', 'Não foi possivel criar cliente.')->send();
        }
    }

    public function show(ClienteRequest $request)
    {
        $cliente = $this->clienteRepository->findById($request->id_cliente);
        return response()->json($cliente);
    }

    public function edit(int $id)
    {
        $cliente = $this->clienteService->buscarEInstanciar($id);

        $paises  = $this->paisRepository->mostrarTodos();
        $estados  = $this->estadoRepository->mostrarTodos();
        $cidades  = $this->cidadeRepository->mostrarTodos();
        $formasPagamento =  $this->formasPagamentoRepository->mostrarTodos();
        $condicoesPagamento = $this->condicoesPagamentoRepository->mostrarTodos();

        return view('cliente.edit', compact('cliente', 'paises', 'estados', 'cidades', 'formasPagamento', 'condicoesPagamento'));
    }

    public function update(Request $request, $id)
    {
        $cpf = $request->input('cpf');
        $start_date = date('2004-01-01');

        if (!empty($cpf)) {
            $validatedData = $request->validate([
                'cpf' => 'unique:clientes,cpf,' . $id,
                'rg' => 'unique:clientes,rg,' . $id,
                'nascimento' => 'before_or_equal:' . $start_date,
            ]);
        } else {
            $validatedData = $request->validate([
                'cnpj' => 'unique:clientes,cnpj,' . $id,
                'nascimento' => 'before_or_equal:' . $start_date,
            ]);
        }

        if ($validatedData) {
            $cliente = Cliente::whereId($id)->update($request->except('_token', '_method', 'ddd_cidade', 'cidade', 'estado', 'id_condicao_pagamento', 'condicao_pagamento_input'));
            if ($cliente) {
                return redirect()->route('cliente.index')->with('Success', 'Cliente alterado com sucesso.');
            }
        }
    }

    public function destroy($cliente_id)
    {
        $cliente = Cliente::where('id', $cliente_id)->delete();
        if ($cliente) {
            return redirect()->route('cliente.index')->with('Success', 'Cliente excluido com sucesso.');
        }
    }
}
