<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\EstadoRequest;
use App\Traits\CreateEntities;
use App\Interfaces\EstadoInterface;
use App\Models\Estado;
use App\Models\Pais;


class EstadoRepository implements EstadoInterface
{
    // Use CreateEntities Trait in this repository
    use CreateEntities;

    public function index()
    {
        return view('estados.index', ['estados' => Estado::all()]);
    }

    public function create()
    {
        $paises = Pais::all();
        return view('estados.create', compact('paises'));
    }

    public function store(EstadoRequest $request)
    {
        $this->traitStoreEstado($request);
    }

    public function show(EstadoRequest $request)
    {
        $estado = Estado::findOrFail($request->id_estado);
        $pais = Pais::findOrFail($estado->id_pais);
        $dados = [
            'estado' => $estado,
            'pais' => $pais,
        ];
        return $dados;
    }

    public function edit($estado_id)
    {
        $estado = Estado::findOrFail($estado_id);
        $pais = Pais::findOrFail($estado->id_pais);
        $paises = Pais::all();
        return view('estados.edit', compact('estado', 'pais', 'paises'));
    }

    public function update(EstadoRequest $request)
    {
        DB::beginTransaction();
        try {

            Estado::whereId($request->get('id'))->update($request->except('_token', '_method'));
            DB::commit();
            return redirect()->route('estado.index')->with('Success', 'Estado alterado com sucesso.');

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel editar estado: ' . $th);
            return redirect()->route('estado.index')->with('Warning', 'Não foi possivel editar estado.');

        }
    }

    public function destroy($estado_id)
    {
        DB::beginTransaction();
        try {

            Estado::where('id', $estado_id)->delete();
            DB::commit();
            return redirect()->route('estado.index')->with('Success', 'Estado excluído com sucesso.');

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel excluir estado: ' . $th);
            return redirect()->route('estado.index')->with('Warning', 'Não foi possivel excluir estado. Verifique se existe vínculo com cidades.');

        }
    }

    public function createEstado(EstadoRequest $request)
    {
        $this->traitCreateEstado($request);
    }
}