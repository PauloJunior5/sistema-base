<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FormaPagamentoRepository
{
    public function mostrarTodos()
    {
        $formasPagamento = DB::table('forma_pagamentos')->get();
        return $formasPagamento;
    }

    public function adicionar($dados)
    {
        $result = null;
        DB::beginTransaction();
        try {
            $result = DB::table('forma_pagamentos')->insert($dados);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - Não foi possivel criar forma de pagamento: ' . $th);
        }
        return $result;
    }

    public function findById(int $id)
    {
        $formaPagamento = DB::table('forma_pagamentos')->where('id', $id)->first();
        return $formaPagamento;
    }

    public function atualizar($dados)
    {
        $result = null;
        DB::beginTransaction();
        try {
            $result = DB::table('forma_pagamentos')->where('id', $dados['id'])->update($dados);
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
            $result = DB::table('forma_pagamentos')->where('id', $id)->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - Não foi possivel excluir forma de pagamento: ' . $th);
        }
        return $result;
    }
}