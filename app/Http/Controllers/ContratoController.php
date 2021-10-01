<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContratoRequest;
use App\Repositories\ContratoRepository;
use App\Services\ContratoService;

use App\Repositories\PaisRepository;
use App\Repositories\EstadoRepository;
use App\Repositories\CidadeRepository;
use App\Repositories\FormaPagamentoRepository;
use App\Repositories\CondicaoPagamentoRepository;
use App\Repositories\ClienteRepository;
use App\Repositories\PacienteRepository;

class ContratoController extends Controller
{
    public function __construct()
    {
        $this->contratoRepository = new ContratoRepository;
        $this->contratoService = new ContratoService;

        $this->paisRepository = new PaisRepository;
        $this->estadoRepository = new EstadoRepository;
        $this->cidadeRepository = new CidadeRepository;
        $this->formasPagamentoRepository = new FormaPagamentoRepository;
        $this->condicoesPagamentoRepository = new CondicaoPagamentoRepository;
        $this->clienteRepository = new ClienteRepository;
        $this->pacienteRepository = new PacienteRepository;
    }

    public function index()
    {
        $contratos = $this->contratoService->instanciarTodos();
        return view('contratos.index', compact('contratos'));
    }

    public function create()
    {
        $paises  = $this->paisRepository->mostrarTodos();
        $estados  = $this->estadoRepository->mostrarTodos();
        $cidades  = $this->cidadeRepository->mostrarTodos();
        $formasPagamento =  $this->formasPagamentoRepository->mostrarTodos();
        $condicoesPagamento = $this->condicoesPagamentoRepository->mostrarTodos();
        $pacientes  = $this->pacienteRepository->mostrarTodos();
        $clientesFisicos = $this->clienteRepository->mostrarTodosFisicos();
        $clientesJuridicos = $this->clienteRepository->mostrarTodosJuridicos();
        return view('contratos.create', compact('paises', 'estados', 'cidades', 'formasPagamento', 'condicoesPagamento', 'pacientes', 'clientesFisicos', 'clientesJuridicos'));
    }

    public function store(ContratoRequest $request)
    {
        $contrato = $this->contratoService->instanciarECriar($request);
        if ($contrato) {
            return redirect()->route('contrato.index')->with('Success', 'Contrato criado com sucesso.')->send();
        } else {
            return redirect()->route('contrato.index')->with('Warning', 'Não foi possivel criar contrato.')->send();
        }
    }

    public function edit(int $id)
    {
        $paises  = $this->paisRepository->mostrarTodos();
        $estados  = $this->estadoRepository->mostrarTodos();
        $cidades  = $this->cidadeRepository->mostrarTodos();
        $formasPagamento =  $this->formasPagamentoRepository->mostrarTodos();
        $condicoesPagamento = $this->condicoesPagamentoRepository->mostrarTodos();
        $pacientes  = $this->pacienteRepository->mostrarTodos();
        $pacientesContrato = $this->contratoRepository->mostrarTodosPacientes($id);
        $clientesFisicos = $this->clienteRepository->mostrarTodosFisicos();
        $clientesJuridicos = $this->clienteRepository->mostrarTodosJuridicos();
        $contrato = $this->contratoService->buscarEInstanciar($id);
        return view('contratos.edit', compact('paises', 'estados', 'cidades', 'formasPagamento', 'condicoesPagamento', 'pacientes', 'pacientesContrato', 'clientesFisicos', 'clientesJuridicos', 'contrato'));
    }

    public function update(ContratoRequest $request)
    {
        $contrato = $this->contratoService->instanciarEAtualizar($request);
        if ($contrato) {
            return redirect()->route('contrato.index')->with('Success', 'Contrato alterado com sucesso.');
        } else {
            return redirect()->route('contrato.index')->with('Warning', 'Não foi possivel alterar contrato.');
        }
    }

    public function destroy(int $id)
    {
        $contrato = $this->contratoRepository->remover($id);
        if ($contrato) {
            return redirect()->route('contrato.index')->with('Success', 'Contrato excluído com sucesso.');
        } else {
            return redirect()->route('contrato.index')->with('Warning', 'Não foi possivel excluir contrato');
        }
    }
}