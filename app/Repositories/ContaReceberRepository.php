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

    public function adicionar($dados)
    {
    }

    public function findById($id)
    {
    }

    public function atualizar($dados)
    {
    }

    public function remover($id)
    {
    }
}