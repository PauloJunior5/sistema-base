<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Interfaces\ContratoInterface;
use App\Models\Contrato;

class ContratoRepository implements ContratoInterface
{
    public function index()
    {
        return DB::table('contratos')->get();
    }

    public function store(Contrato $contrato)
    {
        DB::beginTransaction();
        try {

            $dados = [
                // 'pais' => $pais->getPais(),
                // 'sigla' => $pais->getSigla(),
                // 'created_at' => $pais->getCreated_at(),
            ];

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
        return DB::table('paises')->where('id', $id)->first();
    }

    public function edit($id)
    {
        return DB::table('paises')->where('id', $id)->first();
    }

    public function update(Contrato $pais)
    {
        DB::beginTransaction();
        try {

            $dados = [
                // 'pais' => $pais->getPais(),
                // 'sigla' => $pais->getSigla(),
                // 'updated_at' => $pais->getUpdated_at()
            ];

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
}