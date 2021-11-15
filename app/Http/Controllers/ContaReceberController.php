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
        dd($request->all());
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