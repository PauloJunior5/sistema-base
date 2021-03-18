<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CondicaoPagamentoRepository
{
    public function mostrarTodos()
    {
        $condicoesPagamento = DB::table('condicao_pagamentos')->get();
        return $condicoesPagamento;
    }

    public function adicionar($dados)
    {
        $result = null;

        DB::beginTransaction();
        try {

            $result = DB::table('condicao_pagamentos')->insertGetId($dados);

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel criar condição de pagamento: ' . $th);

        }
        return $result;
    }

    public function findById(int $id)
    {
        $condicaoPagamento = DB::table('condicao_pagamentos')->where('id', $id)->first();
        return $condicaoPagamento;
    }

    public function atualizar($dados)
    {
        $result = null;

        DB::beginTransaction();
        try {

            $result = DB::table('condicao_pagamentos')->where('id', $dados['id'])->update($dados);

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel editar condição de pagamento: ' . $th);

        }
        return $result;
    }

    public function remover($id)
    {
        $result = null;

        DB::beginTransaction();
        try {

            $result = DB::table('condicao_pagamentos')->where('id', $id)->delete();

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel excluir condição de pagamento: ' . $th);

        }
        return $result;
    }
}