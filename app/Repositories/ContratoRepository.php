<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ContratoRepository
{
    public function mostrarTodos()
    {
        return DB::table('contratos')->get();
    }

    public function adicionar($dados)
    {
        $result = null;
        DB::beginTransaction();
        try {
            $result = DB::table('contratos')->insert($dados);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - Não foi possivel criar contrato: ' . $th);
        }
        return $result;
    }

    public function edit($id)
    {
        $clientes = DB::table('clientes')->get();
        $contrato = DB::table('contratos')->where('id', $id)->first();
        $cliente = DB::table('clientes')->where('id', $contrato->id_responsavel)->first();

        $resultado = [
            'clientes' => $clientes,
            'contrato' => $contrato,
            'cliente' => $cliente
        ];

        return $resultado;
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