<?php

namespace App\Http\Controllers;

use App\Http\Requests\CidadeRequest;
use App\Repositories\CidadeRepository;
use App\Services\CidadeService;

use App\Repositories\PaisRepository;
use App\Repositories\EstadoRepository;

class CidadeController extends Controller
{
    public function __construct()
    {
        $this->cidadeRepository = New CidadeRepository; //Bind com CidadeRepository
        $this->cidadeService = New CidadeService; //Bind com CidadeService
        $this->estadoRepository = New EstadoRepository; //Bind com EstadoRepository
        $this->paisRepository = New PaisRepository; //Bind com PaisRepository
    }
    
    public function index()
    {
        $cidades = $this->cidadeRepository->mostrarTodos();
        return view('cidades.index', compact('cidades'));
    }

    public function create()
    {
        $paises  = $this->paisRepository->mostrarTodos();
        $estados  = $this->estadoRepository->mostrarTodos();
        return view('cidades.create', compact('paises', 'estados'));
    }

    public function store(CidadeRequest $request)
    {
        $cidade = $this->cidadeService->instanciarECriar($request);

        if ($cidade) {
            return redirect()->route('cidade.index')->with('Success', 'Cidade criada com sucesso.')->send();
        } else {
            return redirect()->route('cidade.index')->with('Warning', 'Não foi possivel criar cidade.')->send();
        }
    }

    public function show(CidadeRequest $request)
    {
        $cidade = $this->cidadeRepository->findById($request->id_cidade);
        $estado = $this->estadoRepository->findById($cidade->id_estado);

        $dados = [
            'estado' => $estado,
            'cidade' => $cidade,
        ];

        return response()->json($dados);
    }

    public function edit(int $id)
    {
        $paises  = $this->paisRepository->mostrarTodos();
        $estados  = $this->EstadoRepository->mostrarTodos();
        $cidade = $this->cidadeService->buscarEInstanciar($id);

        return view('cidades.edit', compact('paises', 'estados', 'cidade'));
    }

    public function update(CidadeRequest $request)
    {
        $cidade = $this->cidadeService->instanciarEAtualizar($request);

        if ($cidade) {
            return redirect()->route('cidade.index')->with('Success', 'Cidade alterada com sucesso.');
        } else {
            return redirect()->route('cidade.index')->with('Warning', 'Não foi possivel editar cidade.');
        }
    }

    public function destroy(int $id)
    {
        $cidade = $this->cidadeRepository->remover($id);

        if ($cidade) {
            return redirect()->route('cidade.index')->with('Success', 'Cidade excluída com sucesso.');
        } else {
            return redirect()->route('cidade.index')->with('Warning', 'Não foi possivel excluir Cidade.');
        }
    }

    public function createCidade(CidadeRequest $request)
    {
        $cidade = $this->cidadeService->instanciarECriar($request);

        if ($cidade) {
            return redirect()->back()->withInput()->with('error_code', 6)->send();
        } else {
            return redirect()->back()->withInput()->send();
        }
    }

    public function createCidadeMedico(CidadeRequest $request)
    {
        $cidade = $this->cidadeService->instanciarECriar($request);

        if ($cidade) {
            return redirect()->back()->withInput()->with('error_code', 8)->send();
        } else {
            return redirect()->back()->withInput()->send();
        }
    }
}