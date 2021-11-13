<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ContaReceberRepository
{
    public function mostrarTodos()
    {
        $contasReceber = DB::table('contas_receber')->get();
        return $contasReceber;
    }

    public function mostrarTodosContrato($idContrato)
    {
        $contasReceberContrato = DB::table('contas_receber')->where('id_contrato', $idContrato)->get();
        return $contasReceberContrato;
    }

    public function adicionar($dados)
    {
        $result = null;
        DB::beginTransaction();
        try {
            $result = DB::table('contas_receber')->insert($dados);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - Não foi possivel criar contas a receber: ' . $th);
        }
        return $result;
    }

    public function atualizar($dados)
    {
    }

    public function remover($id)
    {
        $result = null;
        DB::beginTransaction();
        try {
            DB::table('contas_receber')->where('id_contrato', $id)->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - Não foi possivel excluir contas a receber - Verifique as pendências: ' . $th);
        }
        return $result;
    }
}