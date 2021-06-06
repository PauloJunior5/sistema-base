<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Repositories\CidadeRepository;
use App\Repositories\ClienteRepository;
use App\Repositories\CondicaoPagamentoRepository;
use App\Repositories\EstadoRepository;
use App\Repositories\FormaPagamentoRepository;
use App\Repositories\PaisRepository;
use App\Services\ClienteService;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->clienteRepository = new ClienteRepository;
        $this->clienteService = new ClienteService;
        $this->paisRepository = new PaisRepository;
        $this->estadoRepository = new EstadoRepository;
        $this->cidadeRepository = new CidadeRepository;
        $this->formasPagamentoRepository = new FormaPagamentoRepository;
        $this->condicoesPagamentoRepository = new CondicaoPagamentoRepository;
    }

    public function index()
    {
        $clientes = $this->clienteService->instanciarTodos();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        $paises  = $this->paisRepository->mostrarTodos();
        $estados  = $this->estadoRepository->mostrarTodos();
        $cidades  = $this->cidadeRepository->mostrarTodos();
        $formasPagamento =  $this->formasPagamentoRepository->mostrarTodos();
        $condicoesPagamento = $this->condicoesPagamentoRepository->mostrarTodos();
        return view('clientes.create', compact('paises', 'estados', 'cidades', 'formasPagamento', 'condicoesPagamento'));
    }

    public function store(ClienteRequest $request)
    {
        $cliente = $this->clienteService->instanciarECriar($request);
        if ($cliente) {
            return redirect()->route('cliente.index')->with('Success', 'Cliente criado com sucesso.')->send();
        } else {
            return redirect()->route('cliente.index')->with('Warning', 'Não foi possivel criar cliente.')->send();
        }
    }

    public function show(Request $request)
    {
        $cliente = $this->clienteRepository->findById($request->id_cliente);
        return response()->json($cliente);
    }

    public function edit(int $id)
    {
        $cliente = $this->clienteService->buscarEInstanciar($id);
        $paises  = $this->paisRepository->mostrarTodos();
        $estados  = $this->estadoRepository->mostrarTodos();
        $cidades  = $this->cidadeRepository->mostrarTodos();
        $formasPagamento =  $this->formasPagamentoRepository->mostrarTodos();
        $condicoesPagamento = $this->condicoesPagamentoRepository->mostrarTodos();

        return view('clientes.edit', compact('cliente', 'paises', 'estados', 'cidades', 'formasPagamento', 'condicoesPagamento'));
    }

    public function update(ClienteRequest $request)
    {
        $cliente = $this->clienteService->instanciarEAtualizar($request);
        if ($cliente) {
            return redirect()->route('cliente.index')->with('Success', 'Cliente alterado com sucesso.')->send();
        } else {
            return redirect()->route('cliente.index')->with('Warning', 'Não foi possivel alterar cliente.')->send();
        }
    }

    public function destroy(int $id)
    {
        $cliente = $this->clienteRepository->remover($id);
        if ($cliente) {
            return redirect()->route('cliente.index')->with('Success', 'Cliente excluído com sucesso.')->send();
        } else {
            return redirect()->route('cliente.index')->with('Warning', 'Não foi possivel excluir cliente. Verifique se existem vínculos')->send();
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
    public function createCliente(ClienteRequest $request)
    {
        $cliente = $this->clienteService->instanciarECriar($request);
        if ($cliente) {
            return redirect()->back()->withInput()->with('error_code', 1)->send();
        } else {
            return redirect()->back()->withInput()->send();
        }
    }
}
