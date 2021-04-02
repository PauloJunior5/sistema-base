<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExameRequest;
use App\Repositories\ExameRepository;
use App\Services\ExameService;

class ExameController extends Controller
{
    public function __construct()
    {
        $this->exameRepository = new ExameRepository;
        $this->exameService = new ExameService;
    }

    public function index()
    {
        $exames = $this->exameRepository->mostrarTodos();
        return view('exames.index', compact('exames'));
    }

    public function create()
    {
        return view('exames.create');
    }

    public function store(ExameRequest $request)
    {
        $exame = $this->exameService->instanciarECriar($request);
        if ($exame) {
            return redirect()->route('exame.index')->with('Success', 'Exame criado com sucesso.')->send();
        } else {
            return redirect()->route('exame.index')->with('Warning', 'Não foi possivel criar exame.')->send();
        }
    }

    public function edit(int $id)
    {
        $exame = $this->exameService->buscarEInstanciar($id);
        return view('exames.edit', compact('exame'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'exame' => 'unique:exames,exame,' . $id,
        ]);

        if ($validatedData) {
            $exame = Exame::whereId($id)->update($request->except('_token', '_method'));
            if ($exame) {
                return redirect()->route('exame.index')->with('Success', 'Exame alterado com sucesso.');
            }
        }
    }

    public function destroy($id)
    {
        $exame = Exame::where('id', $id)->delete();
        if ($exame) {
            return redirect()->route('exame.index')->with('Success', 'Exame excluido com sucesso.');
        }
    }
}
