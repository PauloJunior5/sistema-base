<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index() // FALTA CRIAR MODEL CLIENTE !!!
    {
        return view('clientes.index');
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
        die;
        $validatedData = $request->validate([
            'nome' => 'unique:clientes,nome',
        ]);

        $cliente = Cliente::create($request->all());
        if ($cliente) {
            return redirect()->route('cliente.index')->with('Success', 'Cliente successfully created.');
        }
    }

    public function edit($cliente_id)
    {
        $cliente = Cliente::findOrFail($cliente_id);
        if ($cliente) {
            return view('clientes.edit', compact('cliente'));
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
}
