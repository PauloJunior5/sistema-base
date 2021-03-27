<?php

namespace App\Http\Controllers;

use App\Services\FornecedorService;
use App\Repositories\PaisRepository;
use App\Http\Requests\FornecedorRequest;
use App\Repositories\CidadeRepository;
use App\Repositories\CondicaoPagamentoRepository;
use App\Repositories\EstadoRepository;
use App\Repositories\FormaPagamentoRepository;
use App\Repositories\FornecedorRepository;

class FornecedorController extends Controller
{
    public function __construct()
    {
        $this->fornecedorRepository = New FornecedorRepository;
        $this->fornecedorService = New FornecedorService;
        $this->paisRepository = New PaisRepository;
        $this->estadoRepository = New EstadoRepository;
        $this->cidadeRepository = New CidadeRepository;
        $this->formasPagamentoRepository = New FormaPagamentoRepository;
        $this->condicoesPagamentoRepository = New CondicaoPagamentoRepository;
    }

    public function index()
    {
        $fornecedores = $this->fornecedorRepository->mostrarTodos();
        return view('fornecedores.index', compact('fornecedores'));
    }

    public function create()
    {
        $paises  = $this->paisRepository->mostrarTodos();
        $estados  = $this->estadoRepository->mostrarTodos();
        $cidades  = $this->cidadeRepository->mostrarTodos();
        $formasPagamento =  $this->formasPagamentoRepository->mostrarTodos();
        $condicoesPagamento = $this->condicoesPagamentoRepository->mostrarTodos();
        return view('fornecedores.create', compact('paises', 'estados', 'cidades', 'formasPagamento', 'condicoesPagamento'));
    }

    public function store(FornecedorRequest $request)
    {
        $fornecedor = $this->fornecedorService->instanciarECriar($request);
        if ($fornecedor) {
            return redirect()->route('fornecedor.index')->with('Success', 'Fornecedor criado com sucesso.')->send();
        } else {
            return redirect()->route('fornecedor.index')->with('Warning', 'Não foi possivel criar fornecedor.')->send();
        }
    }

    public function edit(int $id)
    {
        $fornecedor = $this->fornecedorService->buscarEInstanciar($id);
        $paises  = $this->paisRepository->mostrarTodos();
        $estados  = $this->estadoRepository->mostrarTodos();
        $cidades  = $this->cidadeRepository->mostrarTodos();
        $formasPagamento =  $this->formasPagamentoRepository->mostrarTodos();
        $condicoesPagamento = $this->condicoesPagamentoRepository->mostrarTodos();
        return view('fornecedores.edit', compact('fornecedor', 'paises', 'estados', 'cidades', 'formasPagamento', 'condicoesPagamento'));
    }

    public function update(FornecedorRequest $request)
    {
        $fornecedor = $this->fornecedorService->instanciarEAtualizar($request);
        if ($fornecedor) {
            return redirect()->route('fornecedor.index')->with('Success', 'Fornecedor alterado com sucesso.')->send();
        } else {
            return redirect()->route('fornecedor.index')->with('Warning', 'Não foi possivel alterar fornecedor.')->send();
        }
    }

    public function destroy(int $id)
    {
        $fornecedor = $this->fornecedorRepository->remover($id);
        if ($fornecedor) {
            return redirect()->route('fornecedor.index')->with('Success', 'Fornecedor excluído com sucesso.')->send();
        } else {
            return redirect()->route('fornecedor.index')->with('Warning', 'Não foi possivel excluir fornecedor.')->send();
        }
    }
}