<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Pais;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public function index(Estado $model)
    {
        return view('estados.index', ['estados' => $model->paginate(10)]);
    }
    public function create()
    {
        $paises = Pais::all();
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
                return redirect()->route('estado.index')->with('Success', 'Estado successfully created.');
            }
        }
    }
    public function edit($estado_id)
    {
        $estado = Estado::findOrFail($estado_id);
        $pais = Pais::findOrFail($estado->id_pais);
        $paises = Pais::all();
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
            return redirect()->route('estado.index')->with('Success', 'Estado successfully updated.');
        }
    }
    public function destroy($estado_id)
    {
        try {
            $estado = Estado::where('id', $estado_id)->delete();
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('estado.index')->with('Warning', 'Estado unsuccessfully deleted. Esse estado possui vínculo com cidades.');
        }
        if ($estado) {
            return redirect()->route('estado.index')->with('Success', 'Estado successfully deleted.');
        }
    }

    public function getPais(Request $request)
    {
        $pais = Pais::find($request->id_pais);
        return $pais;
    }
}
