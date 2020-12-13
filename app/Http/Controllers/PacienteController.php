<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Estado;
use App\Medico;
use App\Paciente;
use App\Pais;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view('pacientes.index', compact('pacientes'));
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
        $medicos = Medico::all(); // Modal add medico
        return view('pacientes.create', compact('cidades', 'estados', 'paises', 'medicos'));
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
            'cpf' => 'unique:pacientes,cpf',
            'rg' => 'unique:pacientes,rg',
        ]);

        if ($validatedData) {
            $paciente = Paciente::create($request->all());
            if ($paciente) {
                return redirect()->route('paciente.index')->with('Success', 'Paciente criado com sucesso.');
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
        $paciente = Paciente::findOrFail($id);
        $medico = Medico::findOrFail($paciente->id_medico);
        $cidade = Cidade::findOrFail($paciente->id_cidade);
        $estado = Estado::findOrFail($cidade->id_estado);
        
        $cidades = Cidade::all(); // Modal add cidade
        $estados = Estado::all(); // Modal add estado
        $paises = Pais::all(); // Modal add pais
        $medicos = Medico::all(); // Modal add medico

        return view('pacientes.edit', compact('paciente', 'medico', 'cidade', 'estado', 'cidades', 'estados', 'paises', 'medicos'));
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
            'cpf' => 'unique:pacientes,cpf,' . $id,
            'rg' => 'unique:pacientes,rg,' . $id,
        ]);
        
        if ($validatedData) {
            $paciente = Paciente::whereId($id)->update($request->except('_token', '_method'));
            if ($paciente) {
                return redirect()->route('paciente.index')->with('Success', 'Paciente alterado com sucesso.');
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
        $paciente = Paciente::where('id', $id)->delete();
        if ($paciente) {
            return redirect()->route('paciente.index')->with('Success', 'Paciente excluido com sucesso.');
        }
    }

}
