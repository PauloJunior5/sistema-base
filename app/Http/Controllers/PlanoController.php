<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanoRequest;
use App\Repositories\PlanoRepository;
use App\Services\PlanoService;
use App\Repositories\FormaPagamentoRepository;
use App\Repositories\CondicaoPagamentoRepository;

class PlanoController extends Controller
{
    public function __construct()
    {
        $this->planoRepository = new PlanoRepository;
        $this->planoService = new PlanoService;
        $this->formasPagamentoRepository = new FormaPagamentoRepository;
        $this->condicoesPagamentoRepository = new CondicaoPagamentoRepository;
    }

    public function index()
    {
        $planos = $this->planoService->instanciarTodos();
        return view('planos.index', compact('planos'));
    }

    public function create()
    {
        $formasPagamento =  $this->formasPagamentoRepository->mostrarTodos();
        $condicoesPagamento = $this->condicoesPagamentoRepository->mostrarTodos();
        return view('planos.create', compact('formasPagamento', 'condicoesPagamento'));
    }

    public function store(PlanoRequest $request)
    {
        $this->planoService->instanciarECriar($request);
    }

    public function show(int $id)
    {
        return response()->json($this->planoRepository->findById($id));
    }

    public function edit(int $id)
    {
        $plano = $this->planoService->buscarEInstanciar($id);
        $formasPagamento =  $this->formasPagamentoRepository->mostrarTodos();
        $condicoesPagamento = $this->condicoesPagamentoRepository->mostrarTodos();
        return view('planos.edit', compact('plano','formasPagamento', 'condicoesPagamento'));
    }

    public function update(PlanoRequest $request)
    {
        $this->planoService->instanciarEAtualizar($request);
    }

    public function destroy(int $id)
    {
        $this->planoRepository->remover($id);
    }

    // public function createCategoria(PlanoRequest $request)
    // {
    //     $cidade = $this->planoService->instanciarECriar($request);

    //     if (!$cidade) {
    //         return redirect()->back()->withInput()->send();
    //     }

    //     return redirect()->back()->withInput()->with('error_code', 10)->send();
    // }
}