<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Cidade;
use App\Estado;
use App\Pais;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        $cidades = Cidade::all(); // Modal add cidade
        $estados = Estado::all(); // Modal add estado
        $paises = Pais::all(); // Modal add pais
        return view('clientes.create', compact('cidades', 'estados', 'paises'));
    }

    public function store(Request $request)
    {

        $cpf = $request->input('cpf');
        $start_date = date('2004-01-01');

        if (!empty($cpf)) {
            $validatedData = $request->validate([
                'cpf' => 'unique:clientes,cpf',
                'rg' => 'unique:clientes,rg',
                'nascimento' => 'before_or_equal:' . $start_date,
            ]);
        } else {
            $validatedData = $request->validate([
                'cnpj' => 'unique:clientes,cnpj',
                'nascimento' => 'before_or_equal:' . $start_date,
            ]);
        }

        if ($validatedData) {
            $cliente = Cliente::create($request->except('_token', '_method', 'codigo_cidade', 'cidade', 'estado'));
            if ($cliente) {
                return redirect()->route('cliente.index')->with('Success', 'Cliente successfully created.');
            }
        }
    }

    public function edit($cliente_id)
    {
        $cliente = Cliente::findOrFail($cliente_id);
        $cidade = Cidade::findOrFail($cliente->id_cidade);
        $estado = Estado::findOrFail($cidade->id_estado);

        $cidades = Cidade::all(); // Modal add cidade
        $estados = Estado::all(); // Modal add estado
        $paises = Pais::all(); // Modal add pais

        if ($cliente) {
            return view('clientes.edit', compact('cliente', 'cidade', 'estado', 'cidades', 'estados', 'paises'));
        } else {
            return redirect()->back();
        }
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
            $cliente = Cliente::whereId($id)->update($request->except('_token', '_method', 'codigo_cidade', 'cidade', 'estado'));
            if ($cliente) {
                return redirect()->route('cliente.index')->with('Success', 'Cliente successfully updated.');
            }
        }
    }

    public function destroy($cliente_id)
    {
        $cliente = Cliente::where('id', $cliente_id)->delete();
        if ($cliente) {
            return redirect()->route('cliente.index')->with('Success', 'Cliente successfully deleted.');
        }
    }
}
