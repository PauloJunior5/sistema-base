<?php

namespace App\Http\Controllers;

use App\Interfaces\EstadoInterface;
use App\Http\Requests\EstadoRequest;
use App\Repositories\EstadoRepository;
use App\Services\EstadoService;

use App\Repositories\PaisRepository;
use App\Services\PaisService;

class EstadoController extends Controller implements EstadoInterface
{
    public function __construct()
    {
        $this->estadoRepository = new EstadoRepository; //Bind com EstadoRepository
        $this->estadoService = new EstadoService; //Bind com EstadoService
        $this->paisRepository = new PaisRepository; //Bind com PaisRepository
        $this->paisService = new PaisService; //Bind com PaisService
    }

    public function index()
    {
        $estados = $this->estadoRepository->mostrarEstados();
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
        $estado = $this->estadoService->buscarEInstanciar($request->id_pais);
        return response()->json($estado);
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
        $estado = $this->estadoRepository->removerEstado($id);

        if ($estado) {
            return redirect()->route('estado.index')->with('Success', 'Estado excluído com sucesso.');
        } else {
            return redirect()->route('estado.index')->with('Warning', 'Não foi possivel excluir Estado. Verifique se existe vínculo com cidades.');
        }
    }

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