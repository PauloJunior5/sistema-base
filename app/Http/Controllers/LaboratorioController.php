<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Estado;
use App\Laboratorio;
use App\Pais;
use Illuminate\Http\Request;

class LaboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laboratorios = Laboratorio::all();
        return view('laboratorios.index', compact('laboratorios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cidades = Cidade::all(); // Modal add cidade
        $estados = Estado::all(); // Modal add estado
        $paises = Pais::all(); // Modal add pais
        return view('laboratorios.create', compact('cidades', 'estados', 'paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cnpj' => 'unique:laboratorios,cnpj',
        ]);

        if ($validatedData) {
            $laboratorio = Laboratorio::create($request->all());
            if ($laboratorio) {
                return redirect()->route('laboratorio.index')->with('Success', 'Laboratório successfully created.');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $laboratorio = Laboratorio::findOrFail($id);
        $cidade = Cidade::findOrFail($laboratorio->id_cidade);
        $estado = Estado::findOrFail($cidade->id_estado);

        $cidades = Cidade::all(); // Modal add cidade
        $estados = Estado::all(); // Modal add estado
        $paises = Pais::all(); // Modal add pais

        return view('laboratorios.edit', compact('laboratorio', 'cidade', 'estado', 'cidades', 'estados', 'paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'cnpj' => 'unique:laboratorios,cnpj,' . $id,
        ]);

        if ($validatedData) {
            $laboratorio = Laboratorio::whereId($id)->update($request->except('_token', '_method'));
            if ($laboratorio) {
                return redirect()->route('laboratorio.index')->with('Success', 'Laboratório successfully updated.');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laboratorio = Laboratorio::where('id', $id)->delete();
        if ($laboratorio) {
            return redirect()->route('laboratorio.index')->with('Success', 'Laboratório successfully deleted.');
        }
    }
}
