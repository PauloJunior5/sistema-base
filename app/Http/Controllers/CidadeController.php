<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Estado;
use App\Pais;
use Illuminate\Http\Request;

class CidadeController extends Controller
{

    public function __construct()
    {

    }

    public function index(Cidade $model)
    {
        return view('cidades.index', ['cidades' => $model->paginate(15)]);
    }


    public function create()
    {
        $paises = Pais::all();
        $estados = Estado::all();
        return view('cidades.create', compact('paises','estados'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pais' => 'exists:paises,id',
            'estado' => 'exists:estados,id',
            'nome' => 'unique:cidades,nome', 
        ]);

        $cidade = Cidade::create($request->all());
        if ($cidade) {
            return redirect()->route('cidade.index')->withStatus(__('Cidade successfully created.'));
        }
    }

    public function edit($cidade_id)
    {
        $cidade = Cidade::findOrFail($cidade_id);
        $paises = Pais::all();
        $estados = Estado::all();

        if ($cidade) {
            return view('cidades.edit', compact('cidade','paises', 'estados'));
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

    public function getEstados(Request $request)
    {
        $estados = Estado::all()->where('pais', $request->id_pais);
        $options = "<option>Select</option>";
        foreach($estados as $estado){
            $options .= "<option value='".$estado->id."'>".$estado->nome."</option>";
        }
        return $options;

    }

}
