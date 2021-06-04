<?php

namespace App\Http\Controllers;

use App\Repositories\CidadeRepository;
use App\Repositories\EstadoRepository;
use App\Repositories\PaisRepository;
use App\Http\Requests\MedicoRequest;
use App\Repositories\MedicoRepository;
use App\Services\MedicoService;

class MedicoController extends Controller
{
    public function __construct()
    {
        $this->medicoRepository = new MedicoRepository;
        $this->medicoService = new MedicoService;
        $this->paisRepository = new PaisRepository;
        $this->estadoRepository = new EstadoRepository;
        $this->cidadeRepository = new CidadeRepository;
    }

    public function index()
    {
        $medicos = $this->medicoService->instanciarTodos();
        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        $paises  = $this->paisRepository->mostrarTodos();
        $estados  = $this->estadoRepository->mostrarTodos();
        $cidades  = $this->cidadeRepository->mostrarTodos();
        return view('medicos.create', compact('paises', 'estados', 'cidades'));
    }

    public function store(MedicoRequest $request)
    {
        $medico = $this->medicoService->instanciarECriar($request);
        if ($medico) {
            return redirect()->route('medico.index')->with('Success', 'Médico criado com sucesso.')->send();
        } else {
            return redirect()->route('medico.index')->with('Warning', 'Não foi possivel criar médico.')->send();
        }
    }

    public function show(MedicoRequest $request)
    {
        $medico = $this->medicoRepository->findById($request->id_medico);
        return response()->json($medico);
    }

    public function edit(int $id)
    {
        $medico = $this->medicoService->buscarEInstanciar($id);
        $paises  = $this->paisRepository->mostrarTodos();
        $estados  = $this->estadoRepository->mostrarTodos();
        $cidades  = $this->cidadeRepository->mostrarTodos();
        return view('medicos.edit', compact('medico', 'paises', 'estados', 'cidades'));
    }

    public function update(MedicoRequest $request)
    {
        $medico = $this->medicoService->instanciarEAtualizar($request);
        if ($medico) {
            return redirect()->route('medico.index')->with('Success', 'Médico alterado com sucesso.')->send();
        } else {
            return redirect()->route('medico.index')->with('Warning', 'Não foi possivel alterar médico.')->send();
        }
    }

    public function destroy($id)
    {
        $medico = $this->medicoRepository->remover($id);
        if ($medico) {
            return redirect()->route('medico.index')->with('Success', 'Médico excluído com sucesso.')->send();
        } else {
            return redirect()->route('medico.index')->with('Warning', 'Não foi possivel excluir médico.')->send();
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Create Modal
    |--------------------------------------------------------------------------
    |
    | Cria obj para ser retornado para dentro de uma modal
    |
    */
    public function createMedico(MedicoRequest $request)
    {
        $medico = $this->medicoService->instanciarECriar($request);
        if ($medico) {
            return redirect()->back()->withInput()->with('error_code', 7)->send();
        } else {
            return redirect()->back()->withInput()->send();
        }
    }
}
