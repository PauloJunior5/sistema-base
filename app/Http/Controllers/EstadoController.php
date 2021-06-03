<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstadoRequest;
use App\Repositories\EstadoRepository;
use App\Services\EstadoService;
use App\Repositories\PaisRepository;

class EstadoController extends Controller
{
    public function __construct()
    {
        $this->estadoRepository = new EstadoRepository;
        $this->estadoService = new EstadoService;
        $this->paisRepository = new PaisRepository;
    }

    public function index()
    {
        $estados = $this->estadoService->instanciarTodos();
        return view('estados.index', compact('estados'));
    }

    public function create()
    {
        $paises  = $this->paisRepository->mostrarTodos();
        return view('estados.create', compact('paises'));
    }

    public function store(EstadoRequest $request)
    {
        $estado = $this->estadoService->instanciarECriar($request);
        if ($estado) {
            return redirect()->route('estado.index')->with('Success', 'Estado criado com sucesso.')->send();
        } else {
            return redirect()->route('estado.index')->with('Warning', 'Não foi possivel criar estado.')->send();
        }
    }

    public function show(EstadoRequest $request)
    {
        $estado = $this->estadoRepository->findById($request->id_estado);
        $pais = $this->paisRepository->findById($estado->id_pais);
        $dados = [
            'pais' => $pais,
            'estado' => $estado,
        ];
        return response()->json($dados);
    }

    public function edit(int $id)
    {
        $paises  = $this->paisRepository->mostrarTodos();
        $estado = $this->estadoService->buscarEInstanciar($id);
        return view('estados.edit', compact('paises', 'estado'));
    }

    public function update(EstadoRequest $request)
    {
        $estado = $this->estadoService->instanciarEAtualizar($request);
        if ($estado) {
            return redirect()->route('estado.index')->with('Success', 'Estado alterado com sucesso.');
        } else {
            return redirect()->route('estado.index')->with('Warning', 'Não foi possivel editar estado.');
        }
    }

    public function destroy(int $id)
    {
        $estado = $this->estadoRepository->remover($id);
        if ($estado) {
            return redirect()->route('estado.index')->with('Success', 'Estado excluído com sucesso.');
        } else {
            return redirect()->route('estado.index')->with('Warning', 'Não foi possivel excluir Estado. Verifique se existe vínculo com cidades.');
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
    public function createEstado(EstadoRequest $request)
    {
        $estado = $this->estadoService->instanciarECriar($request);
        if ($estado) {
            return redirect()->back()->withInput()->with('error_code', 5)->send();
        } else {
            return redirect()->back()->withInput()->send();
        }
    }
}