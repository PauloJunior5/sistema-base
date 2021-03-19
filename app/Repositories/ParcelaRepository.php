<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ParcelaRepository
{
    public function adicionar($dados)
    {
        $result = null;
        DB::beginTransaction();
        try {
            $result = DB::table('parcelas')->insert($dados);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - Não foi possivel criar forma de pagamento: ' . $th);
        }
        return $result;
    }

    /**
     * Retorna todas as Parcelas que pertencem a determinada Condição de Pagamento.
     */
    public function findById(int $id)
    {
        $parcelas = DB::table('parcelas')->where('condicao_pagamento', $id)->get();
        return json_encode($parcelas);
    }

    public function atualizar($dados)
    {
        $result = null;
        DB::beginTransaction();
        try {
            $result = DB::table('parcelas')->where('id', $dados['id'])->update($dados);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - Não foi possivel editar forma de pagamento: ' . $th);
        }
        return $result;
    }

    public function remover($id)
    {
        $result = null;
        DB::beginTransaction();
        try {
            $result = DB::table('parcelas')->where('condicao_pagamento', $id)->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - Não foi possivel excluir forma de pagamento: ' . $th);
        }
        return $result;
    }
}