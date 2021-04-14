<?php

namespace App\Http\Controllers;

use App\Repositories\CidadeRepository;
use App\Repositories\EstadoRepository;
use App\Repositories\PaisRepository;
use App\Repositories\MedicoRepository;
use App\Repositories\PacienteRepository;
use App\Services\PacienteService;

class PacienteController extends Controller
{
    public function __construct()
    {
        $this->pacienteRepository = new PacienteRepository;
        $this->pacienteSerivce = new PacienteService;
        $this->paisRepository = new PaisRepository;
        $this->estadoRepository = new EstadoRepository;
        $this->cidadeRepository = new CidadeRepository;
        $this->medicoRepository = new MedicoRepository;
    }

    public function index()
    {
        $pacientes = $this->pacienteRepository->mostrarTodos();
        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        $cidades = Cidade::all(); // Modal add cidade
        $estados = Estado::all(); // Modal add estado
        $paises = Pais::all(); // Modal add pais
        $medicos = Medico::all(); // Modal add medico
        return view('pacientes.create', compact('cidades', 'estados', 'paises', 'medicos'));
    }

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

    public function destroy($id)
    {
        $paciente = Paciente::where('id', $id)->delete();
        if ($paciente) {
            return redirect()->route('paciente.index')->with('Success', 'Paciente excluido com sucesso.');
        }
    }

}