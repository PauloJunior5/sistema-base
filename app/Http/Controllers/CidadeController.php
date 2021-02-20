<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Estado;
use App\Pais;
use Illuminate\Http\Request;
use Redirect;

class CidadeController extends Controller
{
    public function index()
    {
        return view('cidades.index', ['cidades' => Cidade::all()]);
    }
    public function create()
    {
        $estados = Estado::all(); // Modal add estado
        $paises = Pais::all(); // Modal add pais
        return view('cidades.create', compact('estados', 'paises'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_estado' => 'exists:estados,id',
            'cidade' => 'unique:cidades,cidade',
        ]);

        $cidade = Cidade::create($request->all());
        if ($cidade) {
            return redirect()->route('cidade.index')->withStatus(__('Cidade criada com sucesso.'));
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
        $cidade = Cidade::find($request->id_cidade);
        $estado = Estado::findOrFail($cidade->id_estado);
        $dados = [
            'cidade' => $cidade,
            'estado' => $estado,
        ];
        return $dados;
    }

    public function edit($id_cidade)
    {
        $cidade = Cidade::findOrFail($id_cidade);
        $estado = Estado::findOrFail($cidade->id_estado);
        $pais = Pais::findOrFail($estado->id_pais);

        $estados = Estado::all(); // Modal add estado
        $paises = Pais::all(); // Modal add pais
        if ($cidade) {
            return view('cidades.edit', compact('cidade', 'estado', 'pais', 'estados', 'paises'));
        } else {
            return redirect()->back();
        }
    }
    public function update(Request $request)
    {
        $cidade = Cidade::whereId($request->get('id'))->update($request->except('_token', '_method'));
        if ($cidade) {
            return redirect()->route('cidade.index')->withStatus(__('Cidade alterada com sucesso.'));
        }
    }
    public function destroy($cidade_id)
    {
        $cidade = Cidade::where('id', $cidade_id)->delete();
        if ($cidade) {
            return redirect()->route('cidade.index')->withStatus(__('Cidade excluida com sucesso.'));
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

    public function createCidade(Request $request)
    {
        $validatedData = $request->validate([
            'estado' => 'exists:estados,id',
            'cidade' => 'unique:cidades,cidade',
        ]);
        
        if ($validatedData) {
            $cidade = Cidade::create($request->all());
            if ($cidade) {
                return Redirect::back()->withInput()->with('error_code', 6);
            }
        }
    }

    public function createCidadeMedico(Request $request)
    {
        $validatedData = $request->validate([
            'estado' => 'exists:estados,id',
            'cidade' => 'unique:cidades,cidade',
        ]);
        
        if ($validatedData) {
            $cidade = Cidade::create($request->all());
            if ($cidade) {
                return Redirect::back()->withInput()->with('error_code', 8);
            }
        }
    }
}
