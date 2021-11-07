<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanoRequest;
use App\Repositories\PlanoRepository;
use App\Services\PlanoService;
use App\Repositories\FormaPagamentoRepository;
use App\Repositories\CondicaoPagamentoRepository;
use App\Repositories\ExameRepository;
use App\Services\CategoriaService;

class PlanoController extends Controller
{
    public function __construct()
    {
        $this->planoRepository = new PlanoRepository;
        $this->planoService = new PlanoService;
        $this->formasPagamentoRepository = new FormaPagamentoRepository;
        $this->condicoesPagamentoRepository = new CondicaoPagamentoRepository;
        $this->exameRepository = new ExameRepository;
        $this->categoriaService = new CategoriaService;
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
        $exames = $this->exameRepository->mostrarTodos();
        $categorias = $this->categoriaService->instanciarTodos();
        return view('planos.create', compact('formasPagamento', 'condicoesPagamento', 'exames', 'categorias'));
    }

    public function store(PlanoRequest $request)
    {
        $planos = $this->planoService->instanciarECriar($request);
        if (!$planos) {
            return redirect()->route('plano.index')->with('Warning', 'Não foi possivel criar plano!')->send();
        }
        return redirect()->route('plano.index')->with('Success', 'Plano criado com sucesso!')->send();
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
        $exames = $this->exameRepository->mostrarTodos();
        $categorias = $this->categoriaService->instanciarTodos();
        $examesPlano = $this->planoRepository->mostrarTodosExames($id);
        return view('planos.edit', compact('plano','formasPagamento', 'condicoesPagamento', 'exames', 'categorias', 'examesPlano'));
    }

    public function update(PlanoRequest $request)
    {
        $this->planoService->instanciarEAtualizar($request);
    }

    public function destroy(int $id)
    {
        $this->planoRepository->remover($id);
    }


    public function createPlano(CategoriaRequest $request)
    {
        $cidade = $this->planoService->instanciarECriar($request);

        if (!$cidade) {
            return redirect()->back()->withInput()->send();
        }

        return redirect()->back()->withInput()->with('error_code', 14)->send();
    }
}