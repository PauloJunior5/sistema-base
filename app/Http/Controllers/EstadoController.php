<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Medico;
use App\Models\Pais;
use Illuminate\Http\Request;
use Redirect;

class EstadoController extends Controller
{
    public function index()
    {
        // $pacientes = Medico::find(3)->cidades;
        // dd($cidades);
        return view('estados.index', ['estados' => Estado::all()]);
    }
    public function create()
    {
        $paises = Pais::all(); // Modal add pais
        return view('estados.create', compact('paises'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_pais' => 'exists:paises,id',
            'estado' => 'unique:estados,estado',
        ]);

        if ($validatedData) {
            $estado = Estado::create($request->all());
            if ($estado) {
                return redirect()->route('estado.index')->with('Success', 'Estado criado com sucesso.');
            }
        }
    }
    public function edit($estado_id)
    {
        $estado = Estado::findOrFail($estado_id);
        $pais = Pais::findOrFail($estado->id_pais);
        $paises = Pais::all(); // Modal add pais
        if ($estado) {
            return view('estados.edit', compact('estado', 'pais', 'paises'));
        } else {
            return redirect()->back();
        }
    }
    public function update(Request $request)
    {
        $estado = Estado::whereId($request->get('id'))->update($request->except('_token', '_method'));
        if ($estado) {
            return redirect()->route('estado.index')->with('Success', 'Estado alterado com sucesso.');
        }
    }
    public function destroy($estado_id)
    {
        try {
            $estado = Estado::where('id', $estado_id)->delete();
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('estado.index')->with('Warning', 'Não foi possivel excluir estado. Esse estado possui vínculo com cidades.');
        }
        if ($estado) {
            return redirect()->route('estado.index')->with('Success', 'Estado excluido com sucesso.');
        }
    }

    public function getPais(Request $request)
    {
        $pais = Pais::find($request->id_pais);
        return $pais;
    }

    public function createEstado(Request $request)
    {
        $validatedData = $request->validate([
            'id_pais' => 'exists:paises,id',
            'estado' => 'unique:estados,estado',
        ]);

        if ($validatedData) {
            $estado = Estado::create($request->all());
            if ($estado) {
                return Redirect::back()->withInput()->with('error_code', 5);
            }
        }
    }
}
