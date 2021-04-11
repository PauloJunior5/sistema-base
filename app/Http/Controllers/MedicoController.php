<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicoRequest;
use App\Repositories\CidadeRepository;
use App\Repositories\EstadoRepository;
use App\Repositories\MedicoRepository;
use App\Repositories\PaisRepository;
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
        $medicos = $this->medicoRepository->mostrarTodos();
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedicoRequest $request)
    {
        $validatedData = $request->validate([
            'crm' => 'unique:medicos,crm,' . $id,
            'cpf' => 'unique:medicos,cpf,' . $id,
            'rg' => 'unique:medicos,rg,' . $id,
        ]);

        if ($validatedData) {
            $medico = Medico::whereId($id)->update($request->except('_token', '_method'));
            if ($medico) {
                return redirect()->route('medico.index')->with('Success', 'Médico alterado com sucesso.');
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
        try {
            $medico = Medico::where('id', $id)->delete();
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('medico.index')->with('Warning', 'Não foi possivel excluir médico. Esse Médico possui vínculo com Pacientes.');
        }
        if ($medico) {
            return redirect()->route('medico.index')->with('Success', 'Médico excluido com sucesso.');
        }
    }

    public function createMedico(Request $request)
    {
        $validatedData = $request->validate([
            'crm' => 'unique:medicos,crm',
            'cpf' => 'unique:medicos,cpf',
            'rg' => 'unique:medicos,rg',
        ]);

        if ($validatedData) {
            $medico = Medico::create($request->all());
            if ($medico) {
                return Redirect::back()->withInput()->with('error_code', 7);
            }
        }
    }
}
