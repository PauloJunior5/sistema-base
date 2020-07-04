<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Cidade;
use App\Estado;
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
        return view('clientes.create', compact('cidades'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cpf' => 'unique:clientes,cpf',
        ]);

        if ($validatedData) {
            $cliente = Cliente::create($request->all());
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
        $cidades = Cidade::all(); // Modal add pais
        if ($cliente) {
            return view('clientes.edit', compact('cliente', 'cidade', 'estado', 'cidades'));
        } else {
            return redirect()->back();
        }
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'cpf' => 'unique:clientes,cpf,' . $id,
        ]);

        if ($validatedData) {
            $cliente = Cliente::whereId($request->get('id'))->update($request->except('_token', '_method'));
            if ($cliente) {
                return redirect()->route('cliente.index')->with('Success', 'Cliente successfully updated.');
            }
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
}
