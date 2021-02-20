<?php

namespace App\Repositories;

use App\Http\Requests\PaisRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Traits\CreateEntities;
use App\Interfaces\PaisInterface;
use App\Models\Pais;

class PaisRepository implements PaisInterface
{
    // Use CreateEntities Trait in this repository
    use CreateEntities;

    public function index()
    {
        return view('paises.index', ['paises' => Pais::all()]);
    }

    public function create()
    {
        return view('paises.create');
    }

    public function store(PaisRequest $request)
    {
        $this->traitStorePais($request);
    }

    public function edit($pais_id)
    {
        $pais = Pais::findOrFail($pais_id);
        return view('paises.edit', compact('pais'));
    }

    public function update(PaisRequest $request)
    {
        DB::beginTransaction();
        try {

            Pais::whereId($request->get('id'))->update($request->except('_token', '_method'));
            DB::commit();
            return redirect()->route('pais.index')->with('Success', 'País alterado com sucesso.');

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel editar país: ' . $th);
            return redirect()->route('pais.index')->with('Warning', 'Não foi possivel editar país.');

        }
    }

    public function destroy($pais_id)
    {
        DB::beginTransaction();
        try {

            Pais::where('id', $pais_id)->delete();
            DB::commit();
            return redirect()->route('pais.index')->with('Success', 'País excluído com sucesso.');

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel excluir país: ' . $th);
            return redirect()->route('pais.index')->with('Warning', 'Não foi possivel excluir país. Verifique se existe vínculo com cidades e/ou estados.');

        }
    }

    public function createPais(PaisRequest $request)
    {
        $this->traitCreatePais($request);
    }
}
