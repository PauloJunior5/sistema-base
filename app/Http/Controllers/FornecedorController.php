<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\CondicaoPagamento;
use App\Models\Estado;
use App\Models\FormaPagamento;
use App\Models\Fornecedor;
use App\Models\Pais;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fornecedores = Fornecedor::all();
        return view('fornecedores.index', compact('fornecedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cidades = Cidade::all(); // Modal add cidade
        $estados = Estado::all(); // Modal add estado
        $paises = Pais::all(); // Modal add pais
        $condicoesPagamento = CondicaoPagamento::all(); //Modal add condição pagamento
        $formas_pagamento = FormaPagamento::all(); // Modal add forma de pagamento
        return view('fornecedores.create', compact('cidades', 'estados', 'paises', 'condicoesPagamento', 'formas_pagamento'));
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
            'cnpj' => 'unique:fornecedores,cnpj',
        ]);

        if ($validatedData) {
            $fornecedor = Fornecedor::create($request->all());
            if ($fornecedor) {
                return redirect()->route('fornecedor.index')->with('Success', 'Fornecedor criado com sucesso.');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $cidade = Cidade::findOrFail($fornecedor->id_cidade);
        $estado = Estado::findOrFail($cidade->id_estado);
        // $condicaoPagamento = CondicaoPagamento::findOrFail($fornecedor->id_condicao_pagamento);

        $cidades = Cidade::all(); // Modal add cidade
        $estados = Estado::all(); // Modal add estado
        $paises = Pais::all(); // Modal add pais

        $condicoesPagamento = CondicaoPagamento::all(); //Modal add condição pagamento
        $formas_pagamento = FormaPagamento::all(); // Modal add forma de pagamento

        return view('fornecedores.edit', compact('fornecedor', 'cidade', 'estado', 'cidades', 'estados', 'paises', 'condicoesPagamento', 'formas_pagamento'));
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
            'cnpj' => 'unique:fornecedores,cnpj,' . $id,
        ]);

        if ($validatedData) {
            $fornecedor = Fornecedor::findOrFail($id)->update($request->except('_token', '_method'));
            if ($fornecedor) {
                return redirect()->route('fornecedor.index')->with('Success', 'Fornecedor alterado com sucesso.');
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
        $fornecedor = Fornecedor::where('id', $id)->delete();
        if ($fornecedor) {
            return redirect()->route('fornecedor.index')->with('Success', 'Fornecedor excluido com sucesso.');
        }
    }
}
