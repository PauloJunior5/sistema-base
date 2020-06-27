<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Cidade;
use App\Estado;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Cliente $model)
    {
        // $clientes = Cliente::all();
        return view('clientes.index', ['clientes' => $model->paginate(10)]);
    }
    public function create()
    {
        $cidades = Cidade::all();
        return view('clientes.create', compact('cidades'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cpf' => 'unique:clientes,cpf',
        ]);
        $cliente = Cliente::create($request->all());
        if ($cliente) {
            return redirect()->route('cliente.index')->with('Success', 'Cliente successfully created.');
        }
    }
    public function edit($cliente_id)
    {
        $cliente = Cliente::findOrFail($cliente_id);
        $cidade = Cidade::findOrFail($cliente->id_cidade);
        $estado = Estado::findOrFail($cidade->estado);
        $cidades = Cidade::all();
        if ($cliente) {
            return view('clientes.edit', compact('cliente', 'cidade', 'estado', 'cidades'));
        } else {
            return redirect()->back();
        }
    }
    public function update(Request $request)
    {
        $cliente = Cliente::whereId($request->get('id'))->update($request->except('_token', '_method'));
        if ($cliente) {
            return redirect()->route('cliente.index')->with('Success', 'Cliente successfully updated.');
        }
    }
    public function destroy($cliente_id)
    {
        try {
            $cliente = Cliente::where('id', $cliente_id)->delete();
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('cliente.index')->with('Warning', 'Cliente unsuccessfully deleted. Esse cliente possui vínculo com cidades e/ou estados.');
        }
        if ($cliente) {
            return redirect()->route('cliente.index')->with('Success', 'Cliente successfully deleted.');
        }
    }
    public function getCidade(Request $request)
    {
        $cidade = Cidade::find($request->id_cidade);
        $estado = Estado::findOrFail($cidade->estado);
        $dados = [
            'cidade' => $cidade,
            'estado' => $estado,
        ];
        return $dados;
    }
}
