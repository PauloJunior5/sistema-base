<?php

namespace App\Http\Controllers;

use App\Services\FormaPagamentoService;
use App\Repositories\FormaPagamentoRepository;
use App\Http\Requests\FormaPagamentoRequest;

class FormaPagamentoController extends Controller
{
    public function __construct()
    {
        $this->formaPagamentoRepository = New FormaPagamentoRepository; //Bind com FormaPagamentoRepository
        $this->formaPagamentoService = new FormaPagamentoService; //Bind com FormaPagamentoService
    }

    public function index()
    {
        $formasPagamento = $this->formaPagamentoRepository->mostrarTodos();
        return view('formasPagamento.index', compact('formasPagamento'));
    }

    public function create()
    {
        return view('formasPagamento.create');
    }

    public function store(FormaPagamentoRequest $request)
    {
        $formaPagamento = $this->formaPagamentoService->instanciarECriar($request);

        if ($formaPagamento) {
            return redirect()->route('formasPagamento.index')->with('Success', 'Forma de pagamento criada com sucesso.')->send();
        } else {
            return redirect()->route('formasPagamento.index')->with('Warning', 'Não foi possivel criar forma de pagamento.')->send();
        }
    }

    public function show(FormaPagamentoRequest $request)
    {
        $formaPagamento = $this->formaPagamentoRepository->findById($request->id_formaPagamento);
        return response()->json($formaPagamento);
    }

    public function edit($id)
    {
        $formaPagamento = $this->formaPagamento->buscarEInstanciar($id);
        return view('formasPagamento.edit', compact('formaPagamento'));
    }

    public function update(FormaPagamentoRequest $request)
    {
        $formaPagamento = $this->formPagamentoService->instanciarEAtualizar($request);

        if ($formaPagamento) {
            return redirect()->route('formasPagamento.index')->with('Success', 'Forma de pagamento alterada com sucesso.')->send();
        } else {
            return redirect()->route('formasPagamento.index')->with('Warning', 'Não foi possivel alterar forma de pagamento.')->send();
        }
    }

    public function destroy($id)
    {
        $formaPagamento = $this->formPagamentoRepository->remover($id);

        if ($formaPagamento) {
            return redirect()->route('formasPagamento.index')->with('Success', 'Forma de pagamento excluída com sucesso.')->send();
        }
    }

    public function createForma_pagamento(FormaPagamentoRequest $request)
    {
        $formaPagamento = $this->formaPagamentoService->instanciarECriar($request);

        if ($formaPagamento) {
            return redirect()->back()->withInput()->with('error_code', 9)->send();
        } else {
            return redirect()->back()->withInput()->send();
        }
    }
}