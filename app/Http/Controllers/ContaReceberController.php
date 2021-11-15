<?php

namespace App\Http\Controllers;

use App\Repositories\ContaReceberRepository;
use App\Services\ContaReceberService;
use Illuminate\Http\Request;

class ContaReceberController extends Controller
{
    public function __construct()
    {
        $this->contaReceberRepository = new ContaReceberRepository;
        $this->contaReceberService = new ContaReceberService;
    }

    public function index()
    {
        $contasReceber = $this->contaReceberService->instanciarTodos();
        return view('contasReceber.index', compact('contasReceber'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $contaReceber = $this->contaReceberService->buscarEInstanciar($id);
        return view('contasReceber.edit', compact('contaReceber'));
    }

    public function update($id, Request $request)
    {
        $contaReceber = $this->contaReceberService->instanciarEAtualizar($id, $request);
        if (!$contaReceber) {
            return redirect()->route('contaReceber.index')->with('Warning', 'Não foi possivel atualizar conta a receber.');
        }
        return redirect()->route('contaReceber.index')->with('Success', 'Conta a receber atualizada com sucesso.');
    }

    public function destroy($id)
    {
    }
}