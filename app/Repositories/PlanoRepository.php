<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PlanoRepository
{
    public function mostrarTodos()
    {
        $planos = DB::table('planos')->get();

        return $planos;
    }

    public function adicionar(array $dados)
    {
        $result = null;
        DB::beginTransaction();
        try {
            $result = DB::table('planos')->insert($dados);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - (PlanoRepository) Não foi possivel criar plano: ' . $th);
        }
        return $result;
    }

    public function findById(int $id)
    {
        return DB::table('planos')->where('id', $id)->first();
    }

    public function atualizar(array $dados)
    {
        DB::beginTransaction();
        try {
            DB::table('planos')->where('id', $dados['id'])->update($dados);
            DB::commit();
            return redirect()->route('plano.index')->with('Success', 'Plano alterado com sucesso!')->send();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - (PlanoRepository) Não foi possivel editar plano: ' . $th);
            return redirect()->route('plano.index')->with('Warning', 'Não foi possivel alterar plano!')->send();
        }
    }

    public function remover(int $id)
    {
        DB::beginTransaction();
        try {
            DB::table('planos')->where('id', $id)->delete();
            DB::commit();
            return redirect()->route('plano.index')->with('Success', 'Plano excluído com sucesso!')->send();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - (PlanoRepository) Não foi possivel excluir plano: ' . $th);
            return redirect()->route('plano.index')->with('Warning', 'Não foi possivel excluir plano!')->send();
        }
    }
}