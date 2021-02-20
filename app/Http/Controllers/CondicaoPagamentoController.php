<?php

namespace App\Http\Controllers;

use App\Models\CondicaoPagamento;
use App\FormaPagamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CondicaoPagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('condicoes_pagamento.index', ['condicoes_pagamento' => CondicaoPagamento::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formas_pagamento = FormaPagamento::all(); // Modal add forma de pagamento
        return view('condicoes_pagamento.create', compact('formas_pagamento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'condicao_pagamento' => 'required',
        ]);

        if ($validatedData) {
            $condicao_pagamento = CondicaoPagamento::create($request->all());
            if ($condicao_pagamento) {
                return redirect()->route('condicaoPagamento.index')->with('Success', 'Condição de Pagamento criada com sucesso.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $condicao_pagamento = CondicaoPagamento::findOrFail($request->id_condicao_pagamento);
        return $condicao_pagamento;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $condicao_pagamento = CondicaoPagamento::findOrFail($id);
        $formas_pagamento = FormaPagamento::all(); // Modal add forma de pagamento
        return view('condicoes_pagamento.edit', compact('condicao_pagamento', 'formas_pagamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'condicao_pagamento' => 'required',
        ]);

        if ($validatedData) {
            $condicao_pagamento = CondicaoPagamento::whereId($id)->update($request->except('_token', '_method', 'codigo_cidade', 'cidade', 'estado'));
            if ($condicao_pagamento) {
                return redirect()->route('condicaoPagamento.index')->with('Success', 'Condição de Pagamento alterada com sucesso.');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $condicao_pagamento = CondicaoPagamento::where('id', $id)->delete();
        if ($condicao_pagamento) {
            return redirect()->route('condicaoPagamento.index')->with('Success', 'Condição de Pagamento excluida com sucesso.');
        }
    }

    public function createCondicao_pagamento(Request $request)
    {
        $validatedData = $request->validate([
            'condicao_pagamento' => 'required',
        ]);

        if ($validatedData) {
            $condicao_pagamento = CondicaoPagamento::create($request->all());
            if ($condicao_pagamento) {
                return Redirect::back()->withInput()->with('error_code', 3);
            }
        }
    }
}
