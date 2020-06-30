<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Estado;
use App\Pais;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function index(Cidade $model)
    {
        return view('cidades.index', ['cidades' => Cidade::all()]);
    }
    public function create()
    {
        $estados = Estado::all(); // Modal add estado
        return view('cidades.create', compact('estados'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'estado' => 'exists:estados,id',
            'nome' => 'unique:cidades,nome',
        ]);
        $cidade = Cidade::create($request->all());
        if ($cidade) {
            return redirect()->route('cidade.index')->withStatus(__('Cidade successfully created.'));
        }
    }
    public function edit($id_cidade)
    {
        $cidade = Cidade::findOrFail($id_cidade);
        $estado = Estado::findOrFail($cidade->id_estado);
        $pais = Pais::findOrFail($estado->id_pais);
        $estados = Estado::all(); // Modal add estado
        if ($cidade) {
            return view('cidades.edit', compact('cidade', 'estado', 'pais', 'estados'));
        } else {
            return redirect()->back();
        }
    }
    public function update(Request $request)
    {
        $cidade = Cidade::whereId($request->get('id'))->update($request->except('_token', '_method'));
        if ($cidade) {
            return redirect()->route('cidade.index')->withStatus(__('Cidade successfully updated.'));
        }
    }
    public function destroy($cidade_id)
    {
        $cidade = Cidade::where('id', $cidade_id)->delete();
        if ($cidade) {
            return redirect()->route('cidade.index')->withStatus(__('Cidade successfully deleted.'));
        }
    }
    public function getEstado(Request $request)
    {
        $estado = Estado::find($request->id_estado);
        $pais = Pais::findOrFail($estado->id_pais);
        $dados = [
            'estado' => $estado,
            'pais' => $pais,
        ];
        return $dados;
    }
}
