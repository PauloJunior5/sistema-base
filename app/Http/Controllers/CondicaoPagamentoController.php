<?php

namespace App\Http\Controllers;

use App\Http\Requests\CondicaoPagamentoRequest;
use App\Repositories\CondicaoPagamentoRepository;
use App\Repositories\FormaPagamentoRepository;
use App\Repositories\ParcelaRepository;
use App\Services\CondicaoPagamentoService;

class CondicaoPagamentoController extends Controller
{
    public function __construct()
    {
        $this->condicaoPagamentoRepository = New CondicaoPagamentoRepository;
        $this->formaPagamentoRepository = New FormaPagamentoRepository;
        $this->parcelaRepository = New ParcelaRepository;
        $this->condicaoPagamentoService = New CondicaoPagamentoService;
    }

    public function index()
    {
        $condicoesPagamento = $this->condicaoPagamentoRepository->mostrarTodos();
        return view('condicoesPagamento.index', compact('condicoesPagamento'));
    }

    public function create()
    {
        $formasPagamento =  $this->formaPagamentoRepository->mostrarTodos();
        return view('condicoesPagamento.create', compact('formasPagamento'));
    }

    public function store(CondicaoPagamentoRequest $request)
    {
        $condicaoPagamento = $this->condicaoPagamentoService->instanciaECriar($request);
        if ($condicaoPagamento) {
            return redirect()->route('condicaoPagamento.index')->with('Success', 'Condição de Pagamento criada com sucesso.')->send();
        } else {
            return redirect()->route('condicaoPagamento.index')->with('Warning', 'Não foi possivel criar condição de pagamento.')->send();
        }
    }

    public function show(CondicaoPagamentoRequest $request)
    {
        $condicaoPagamento = $this->condicaoPagamentoRepository->findById($request->id_condicao_pagamento);
        return response()->json($condicaoPagamento);
    }

    public function edit($id)
    {
        $condicaoPagamento = $this->condicaoPagamentoService->buscarEInstanciar($id);
        $formasPagamento =  $this->formaPagamentoRepository->mostrarTodos();
        $parcelas = $this->parcelaRepository->findById($id);
        return view('condicoesPagamento.edit', compact('condicaoPagamento', 'formasPagamento', 'parcelas'));
    }

    public function update(CondicaoPagamentoRequest $request)
    {
        $condicaoPagamento = $this->condicaoPagamentoService->instanciarEAtualizar($request);
        if ($condicaoPagamento) {
            return redirect()->route('condicaoPagamento.index')->with('Success', 'Condição de Pagamento alterada com sucesso.')->send();
        } else {
            return redirect()->route('condicaoPagamento.index')->with('Warning', 'Não foi possivel condição de pagamento.')->send();
        }
    }

    public function destroy($id)
    {
        $parcelas = $this->parcelaRepository->remover($id);
        $condicaoPagamento = $this->condicaoPagamentoRepository->remover($id);
        if ($condicaoPagamento && $parcelas) {
            return redirect()->route('condicaoPagamento.index')->with('Success', 'Condição de Pagamento excluída com sucesso.')->send();
        }
    }

    public function createCondicao_pagamento(CondicaoPagamentoRequest $request)
    {
        $condicaoPagamento = $this->condicaoPagamentoService->instanciarECriar($request);
        if ($condicaoPagamento) {
            return redirect()->back()->withInput()->with('error_code', 3)->send();
        } else {
            return redirect()->back()->withInput()->send();
        }
    }
}