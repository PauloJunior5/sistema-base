<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\CidadeRequest;
use App\Interfaces\CidadeInterface;
use App\Models\Cidade;
use App\Models\Estado;
use App\Models\Pais;

class CidadeRepository implements CidadeInterface
{
    public function index()
    {
        return view('cidades.index', ['cidades' => DB::table('cidades')->get()]);
    }

    public function create()
    {
        $estados = DB::table('estados')->get();
        $paises = DB::table('paises')->get();
        return view('cidades.create', compact('estados', 'paises'));
    }

    public function store(Cidade $cidade)
    {
        DB::beginTransaction();
        try {

            $dados = $this->getData($cidade);

            DB::table('cidades')->insert($dados);

            DB::commit();
            return redirect()->route('cidade.index')->with('Success', 'Cidade criada com sucesso.')->send();

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
        DB::beginTransaction();
            try {

                Cidade::create($request->all());
                DB::commit();
                return redirect()->back()->withInput()->with('error_code', 6)->send();

            } catch (\Throwable $th) {

                DB::rollBack();
                return redirect()->back()->withInput()->send();

            }
    }

    public function createCidadeMedico(CidadeRequest $request)
    {
        DB::beginTransaction();
        try {

            Cidade::create($request->all());
            DB::commit();
            return redirect()->back()->withInput()->with('error_code', 8)->send();

        } catch (\Throwable $th) {

            DB::rollBack();
            return redirect()->back()->withInput()->send();

        }
    }

    /**
     *  Retorna objeto a partir do id passado
     * como parametro.
     */
    public function findById(int $id)
    {
    }

    /**
     *  Retorna array a partir do objeto passado
     * como parametro.
     */
    public function getData(Cidade $cidade)
    {
        $dados = [
            'id' => $cidade->getId(),
            'cidade' => $cidade->getCidade(),
            'DDD' => $cidade->getDDD(),
            'id_estado' => $cidade->getEstado()->getId(),
            'created_at' => $cidade->getCreated_at(),
            'updated_at' => $cidade->getUpdated_at()
        ];

        return $dados;
    }

}