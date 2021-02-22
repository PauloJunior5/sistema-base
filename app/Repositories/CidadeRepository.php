<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\CidadeRequest;
use App\Traits\CreateEntities;
use App\Interfaces\CidadeInterface;
use App\Models\Cidade;
use App\Models\Estado;
use App\Models\Pais;

class CidadeRepository implements CidadeInterface
{
    // Use CreateEntities Trait in this repository
    use CreateEntities;

    public function index()
    {
        return view('cidades.index', ['cidades' => Cidade::all()]);
    }

    public function create()
    {
        $estados = Estado::all(); // Modal add estado
        $paises = Pais::all(); // Modal add pais
        return view('cidades.create', compact('estados', 'paises'));
    }

    public function store(CidadeRequest $request)
    {
        DB::beginTransaction();
        try {

            Cidade::create($request->all());
            DB::commit();
            return redirect()->route('cidade.index')->withStatus(__('Cidade criada com sucesso.'));

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel criar cidade: ' . $th);
            return redirect()->route('cidade.index')->with('Warning', 'Não foi possivel criar cidade.')->send();

        }
    }

    public function show(CidadeRequest $request)
    {
        $cidade = Cidade::findOrFail($request->id_cidade);
        $estado = Estado::findOrFail($cidade->id_estado);
        $dados = [
            'cidade' => $cidade,
            'estado' => $estado,
        ];
        return $dados;
    }

    public function edit($id_cidade)
    {
        $cidade = Cidade::findOrFail($id_cidade);
        $estado = Estado::findOrFail($cidade->id_estado);
        $pais = Pais::findOrFail($estado->id_pais);

        $estados = Estado::all(); // Modal add estado
        $paises = Pais::all(); // Modal add pais
        return view('cidades.edit', compact('cidade', 'estado', 'pais', 'estados', 'paises'));
    }

    public function update(CidadeRequest $request)
    {
        DB::beginTransaction();
        try {

            Cidade::whereId($request->get('id'))->update($request->except('_token', '_method'));
            DB::commit();
            return redirect()->route('cidade.index')->withStatus(__('Cidade alterada com sucesso.'));

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel editar cidade: ' . $th);
            return redirect()->route('cidade.index')->with('Warning', 'Não foi possivel editar cidade.');

        }
    }

    public function destroy($id_cidade)
    {
        DB::beginTransaction();
        try {

            Cidade::where('id', $id_cidade)->delete();
            DB::commit();
            return redirect()->route('cidade.index')->withStatus(__('Cidade excluida com sucesso.'));

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel excluir cidade: ' . $th);
            return redirect()->route('cidade.index')->with('Warning', 'Não foi possivel excluir cidade. Verifique se existe vínculo com estados e/ou países.');

        }
    }

    public function createCidade(CidadeRequest $request)
    {
        $this->traitCreateCidade($request);
    }

    public function createCidadeMedico(CidadeRequest $request)
    {
        $this->traitCreateCidadeMedico($request);
    }

}