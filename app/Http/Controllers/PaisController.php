<?php

namespace App\Http\Controllers;

use App\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function index()
    {
        return view('paises.index', ['paises' => Pais::all()]);
    }
    public function create()
    {
        return view('paises.create');
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'pais' => 'unique:paises,pais',
        ]);

        if ($validatedData) {
            $pais = Pais::create($request->all());
            if ($pais) {
                return redirect()->route('pais.index')->with('Success', 'Pais successfully created.');
            }
        }
    }
    public function edit($pais_id)
    {
        $pais = Pais::findOrFail($pais_id);
        if ($pais) {
            return view('paises.edit', compact('pais'));
        } else {
            return redirect()->back();
        }
    }
    public function update(Request $request)
    {
        $pais = Pais::whereId($request->get('id'))->update($request->except('_token', '_method'));
        if ($pais) {
            return redirect()->route('pais.index')->with('Success', 'Pais successfully updated.');
        }
    }
    public function destroy($pais_id)
    {
        try {
            $pais = Pais::where('id', $pais_id)->delete();
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('pais.index')->with('Warning', 'Pais unsuccessfully deleted. Esse país possui vínculo com cidades e/ou estados.');
        }
        if ($pais) {
            return redirect()->route('pais.index')->with('Success', 'Pais successfully deleted.');
        }
    }

    public function createPais(Request $request)
    {
        $validatedData = $request->validate([
            'pais' => 'exists:paises,id',
            'estado' => 'unique:estados,estado',
        ]);

        if ($validatedData) {
            $pais = Pais::create($request->all());
        }

        dd($pais);

        if ($pais) {
            return Redirect::back();
        }
    }
}
