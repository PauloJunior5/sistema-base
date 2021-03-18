<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaisRequest;
use App\Repositories\PaisRepository;
use App\Services\PaisService;

class PaisController extends Controller
{
    public function __construct()
    {
        $this->paisRepository = New PaisRepository;
        $this->paisService = New PaisService;
    }

    /*
    |--------------------------------------------------------------------------
    | Index
    |--------------------------------------------------------------------------
    |
    | Retorna view - Lista de objetos.
    |
    */
    public function index()
    {
        $paises = $this->paisRepository->mostrarTodos();
        return view('paises.index', compact('paises'));
    }

    /*
    |--------------------------------------------------------------------------
    | Create
    |--------------------------------------------------------------------------
    |
    | Retorna view - Form Create.
    |
    */
    public function create()
    {
        return view('paises.create');
    }

    /*
    |--------------------------------------------------------------------------
    | Store
    |--------------------------------------------------------------------------
    |
    | Recebe request validado e envia para o Service,
    | aonde será criado.
    |
    */
    public function store(PaisRequest $request)
    {
        $pais = $this->paisService->instanciarECriar($request);

        if ($pais) {
            return redirect()->route('pais.index')->with('Success', 'Pais criado com sucesso.')->send();
        } else {
            return redirect()->route('pais.index')->with('Warning', 'Não foi possivel criar país.')->send();
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Show
    |--------------------------------------------------------------------------
    |
    | Retorna JSON para as requisições AJAX das modais.
    |
    */
    public function show(PaisRequest $request)
    {
        $pais = $this->paisRepository->findById($request->id_pais);
        return response()->json($pais);
    }

    /*
    |--------------------------------------------------------------------------
    | Edit
    |--------------------------------------------------------------------------
    |
    | Retorna view - Form Edit.
    |
    */
    public function edit(int $id)
    {
        $pais = $this->paisService->buscarEInstanciar($id);
        return view('paises.edit', compact('pais'));
    }

    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    |
    | Recebe request validado e envia para o Service,
    | aonde será atualizado.
    |
    */
    public function update(PaisRequest $request)
    {
        $pais = $this->paisService->instanciarEAtualizar($request);

        if ($pais) {
            return redirect()->route('pais.index')->with('Success', 'País alterado com sucesso.');
        } else {
            return redirect()->route('pais.index')->with('Warning', 'Não foi possivel editar país.');
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    |
    | Recebe id e envia para o Repository,
    | aonde será deletado.
    |
    */
    public function destroy(int $id)
    {
        $pais = $this->paisRepository->remover($id);

        if ($pais) {
            return redirect()->route('pais.index')->with('Success', 'País excluído com sucesso.');
        } else {
            return redirect()->route('pais.index')->with('Warning', 'Não foi possivel excluir país. Verifique se existe vínculo com cidades e/ou estados.');
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
    public function createModal(PaisRequest $request)
    {
        $pais = $this->paisService->instanciarECriar($request);

        if ($pais) {
            return redirect()->back()->withInput()->with('error_code', 4)->send();
        } else {
            return redirect()->back()->withInput()->send();
        }
    }
}