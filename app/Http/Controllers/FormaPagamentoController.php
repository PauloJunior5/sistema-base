<?php

namespace App\Http\Controllers;

use App\Services\FormaPagamentoService;
use App\Http\Requests\FormaPagamentoRequest;
use App\Repositories\FormaPagamentoRepository;

class FormaPagamentoController extends Controller
{
    public function __construct()
    {
        $this->formaPagamentoService = new FormaPagamentoService; //Bind com FormaPagamentoService
        $this->formaPagamentoRepository = New FormaPagamentoRepository; //Bind com FormaPagamentoRepository
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
            return redirect()->route('formaPagamento.index')->with('Success', 'Forma de pagamento criada com sucesso.')->send();
        } else {
            return redirect()->route('formaPagamento.index')->with('Warning', 'Não foi possivel criar forma de pagamento.')->send();
        }
    }

    public function show(FormaPagamentoRequest $request)
    {
        $formaPagamento = $this->formaPagamentoRepository->findById($request->id_formaPagamento);
        return response()->json($formaPagamento);
    }

    public function edit($id)
    {
        $formaPagamento = $this->formaPagamentoService->buscarEInstanciar($id);
        return view('formasPagamento.edit', compact('formaPagamento'));
    }

    public function update(FormaPagamentoRequest $request)
    {
        $formaPagamento = $this->formaPagamentoService->instanciarEAtualizar($request);

        if ($formaPagamento) {
            return redirect()->route('formaPagamento.index')->with('Success', 'Forma de pagamento alterada com sucesso.')->send();
        } else {
            return redirect()->route('formaPagamento.index')->with('Warning', 'Não foi possivel alterar forma de pagamento.')->send();
        }
    }

    public function destroy($id)
    {
        $formaPagamento = $this->formaPagamentoRepository->remover($id);

        if ($formaPagamento) {
            return redirect()->route('formaPagamento.index')->with('Success', 'Forma de pagamento excluída com sucesso.')->send();
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