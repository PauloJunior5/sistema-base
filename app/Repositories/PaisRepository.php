<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Interfaces\PaisInterface;
use App\Models\Pais;

class PaisRepository implements PaisInterface
{
    public function index()
    {
        $paises = DB::table('paises')->get();
        return view('paises.index', compact('paises'));
    }

    public function store(Pais $pais)
    {
        DB::beginTransaction();
        try {

            $dados = $this->getData($pais);

            DB::table('paises')->insert($dados);

            DB::commit();
            return redirect()->route('pais.index')->with('Success', 'Pais criado com sucesso.')->send();

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel criar país: ' . $th);
            return redirect()->route('pais.index')->with('Warning', 'Não foi possivel criar país.')->send();

        }
    }

    public function show($id)
    {
        $pais = DB::table('paises')->where('id', $id)->first();
        return response()->json($pais);
    }

    public function edit($id)
    {
        $pais = DB::table('paises')->where('id', $id)->first();
        return view('paises.edit', compact('pais'));
    }

    public function update(Pais $pais)
    {
        DB::beginTransaction();
        try {

            $dados = $this->getData($pais);

            DB::table('paises')->where('id', $pais->getId())->update($dados);

            DB::commit();
            return redirect()->route('pais.index')->with('Success', 'País alterado com sucesso.');

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel editar país: ' . $th);
            return redirect()->route('pais.index')->with('Warning', 'Não foi possivel editar país.');

        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {

            DB::table('paises')->where('id', $id)->delete();

            DB::commit();
            return redirect()->route('pais.index')->with('Success', 'País excluído com sucesso.');

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel excluir país: ' . $th);
            return redirect()->route('pais.index')->with('Warning', 'Não foi possivel excluir país. Verifique se existe vínculo com cidades e/ou estados.');

        }
    }

    /**
     *  Salva novo objeto no banco. porém retorna
     * para as modais.
     */
    public function createPais(Pais $pais)
    {
        DB::beginTransaction();
        try {

            $dados = $this->getData($pais);

            DB::table('paises')->insert($dados);

            DB::commit();
            return redirect()->back()->withInput()->with('error_code', 4)->send();

        } catch (\Throwable $th) {

            DB::rollBack();
            return redirect()->back()->withInput()->send();

        }
    }

    /**
     *  Retorna objeto a partir do id passado
     * como parametro. Para instanciar objeto.
     */
    public function findPais(int $id)
    {
        $pais = DB::table('paises')->where('id', $id)->first();

        $dados = get_object_vars($pais);

        $pais = new Pais();

        $pais->setId($dados["id"]);
        $pais->setCreated_at($dados["created_at"] ?? null);
        $pais->setUpdated_at($dados["updated_at"] ?? null);

        $pais->setSigla($dados["sigla"]);
        $pais->setPais($dados["pais"]);

        return $pais;
    }

    /**
     *  Retorna array a partir do objeto passado
     * como parametro, para inserir dados no banco.
     */
    public function getData(Pais $pais)
    {
        $dados = [
            'id' => $pais->getId(),
            'pais' => $pais->getPais(),
            'sigla' => $pais->getSigla(),
            'created_at' => $pais->getCreated_at(),
            'updated_at' => $pais->getUpdated_at()
        ];

        return $dados;
    }
}