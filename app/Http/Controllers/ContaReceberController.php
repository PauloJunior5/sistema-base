<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContaReceberRequest;
use App\Repositories\ContaReceberRepository;
use App\Services\ContaReceberService;

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

    public function store(ContaReceberRequest $request)
    {
    }

    public function show($id)
    {
    }

    public function edit(int $id)
    {
    }

    public function update(ContaReceberRequest $request)
    {
    }

    public function destroy($id)
    {
    }
}