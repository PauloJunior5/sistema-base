<?php

namespace App\Http\Controllers;

use App\FormaPagamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FormaPagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('formas_pagamento.index', ['formas_pagamento' => FormaPagamento::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formas_pagamento.create');
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
            'forma_pagamento' => 'required',
        ]);

        if ($validatedData) {
            $forma_pagamento = FormaPagamento::create($request->all());
            if ($forma_pagamento) {
                return redirect()->route('formaPagamento.index')->with('Success', 'Forma de Pagamento criada com sucesso.');
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
        $forma_pagamento = FormaPagamento::findOrFail($request->id_forma_pagamento);
        return $forma_pagamento;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $forma_pagamento = FormaPagamento::findOrFail($id);
        return view('formas_pagamento.edit', compact('forma_pagamento'));
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
            'forma_pagamento' => 'required',
        ]);

        if ($validatedData) {
            $forma_pagamento = FormaPagamento::whereId($id)->update($request->except('_token', '_method'));
            if ($forma_pagamento) {
                return redirect()->route('formaPagamento.index')->with('Success', 'Forma de Pagamento alterada com sucesso.');
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
