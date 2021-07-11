<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteRequest;
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
        $this->pacienteService = new PacienteService;
        $this->paisRepository = new PaisRepository;
        $this->estadoRepository = new EstadoRepository;
        $this->cidadeRepository = new CidadeRepository;
        $this->medicoRepository = new MedicoRepository;
    }

    public function index()
    {
        $pacientes = $this->pacienteService->instanciarTodos();
        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        $paises  = $this->paisRepository->mostrarTodos();
        $estados  = $this->estadoRepository->mostrarTodos();
        $cidades  = $this->cidadeRepository->mostrarTodos();
        $medicos = $this->medicoRepository->mostrarTodos();
        return view('pacientes.create', compact('paises', 'estados', 'cidades', 'medicos'));
    }

    public function store(PacienteRequest $request)
    {
        $paciente = $this->pacienteService->instanciarECriar($request);
        if ($paciente) {
            return redirect()->route('paciente.index')->with('Success', 'Paciente criado com sucesso.')->send();
        } else {
            return redirect()->route('paciente.index')->with('Warning', 'Não foi possivel criar paciente.')->send();
        }
    }

    public function show(PacienteRequest $request)
    {
        $paciente = $this->pacienteRepository->findById($request->id_paciente);
        return response()->json($paciente);
    }

    public function edit($id)
    {
        $paciente = $this->pacienteService->buscarEInstanciar($id);
        $paises  = $this->paisRepository->mostrarTodos();
        $estados  = $this->estadoRepository->mostrarTodos();
        $cidades  = $this->cidadeRepository->mostrarTodos();
        $medicos  = $this->medicoRepository->mostrarTodos();

        return view('pacientes.edit', compact('paciente', 'paises', 'estados', 'cidades', 'medicos'));
    }

    public function update(PacienteRequest $request)
    {
        $paciente = $this->pacienteService->instanciarEAtualizar($request);
        if ($paciente) {
            return redirect()->route('paciente.index')->with('Success', 'Paciente alterado com sucesso.')->send();
        } else {
            return redirect()->route('paciente.index')->with('Warning', 'Não foi possivel alterar paciente.')->send();
        }
    }

    public function destroy($id)
    {
        $paciente = $this->pacienteRepository->remover($id);
        if ($paciente) {
            return redirect()->route('paciente.index')->with('Success', 'Paciente excluído com sucesso.')->send();
        } else {
            return redirect()->route('paciente.index')->with('Warning', 'Não foi possivel excluir paciente.')->send();
        }
    }

}