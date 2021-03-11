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
        return view('formas_pagamento.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'forma_pagamento' => 'required',
        ]);

        if ($validatedData) {
            $forma_pagamento = FormaPagamento::create($request->all());
            if ($forma_pagamento) {
                return redirect()->route('formaPagamento.index')->with('Success', 'Forma de Pagamento criada com sucesso.');
            }
        }
    }

    public function show(Request $request)
    {
        $forma_pagamento = FormaPagamento::findOrFail($request->id_forma_pagamento);
        return $forma_pagamento;
    }

    public function edit($id)
    {
        $forma_pagamento = FormaPagamento::findOrFail($id);
        return view('formas_pagamento.edit', compact('forma_pagamento'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'forma_pagamento' => 'required',
        ]);

        if ($validatedData) {
            $forma_pagamento = FormaPagamento::whereId($id)->update($request->except('_token', '_method'));
            if ($forma_pagamento) {
                return redirect()->route('formaPagamento.index')->with('Success', 'Forma de Pagamento alterada com sucesso.');
            }
        }
    }

    public function destroy($id)
    {
        $forma_pagamento = FormaPagamento::where('id', $id)->delete();
        if ($forma_pagamento) {
            return redirect()->route('formaPagamento.index')->with('Success', 'Forma de Pagamento excluida com sucesso.');
        }
    }

    public function createForma_pagamento(Request $request)
    {
        $validatedData = $request->validate([
            'forma_pagamento' => 'required',
        ]);

        if ($validatedData) {
            $forma_pagamento = FormaPagamento::create($request->all());
            if ($forma_pagamento) {
                return Redirect::back()->withInput()->with('error_code', 9);
            }
        }
    }
}