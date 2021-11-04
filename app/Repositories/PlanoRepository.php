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

    public function mostrarTodosExames(int $id)
    {
        return DB::table('exames')
                ->join('exames_planos', 'exames.id', '=', 'exames_planos.id_exame')
                ->join('planos', 'planos.id', '=', 'exames_planos.id_plano')
                ->where('planos.id', $id)
                ->select('exames.*')
                ->get();
    }

    public function adicionar(array $dados)
    {
        $result = null;
        DB::beginTransaction();
        try {
            $result = DB::table('planos')->insertGetId($dados);
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
            Log::debug('Warning - (PlanoRepository) Não foi possivel alterar plano: ' . $th);
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

    public function findByIdExame(int $id_exame, int $id_plano)
    {
        $exame = DB::table('exames_planos')->where('id_exame', $id_exame)->where('id_plano', $id_plano)->get()->first();
        return $exame;
    }

    public function adicionarExame(Array $dados)
    {
        $result = null;
        try {
            $result = DB::table('exames_planos')->insert($dados);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - (PlanoRepository) Não foi inserir exames: ' . $th);
        }
        return $result;
    }

    public function removerExames(Array $dados)
    {
        $result = null;
        DB::beginTransaction();
        try {
            $result = DB::table('exames_planos')->where('id_plano', $dados['plano_id'])->whereIn('id_exame', $dados['examesExluidos'])->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - Não foi possivel excluir pacientes: ' . $th);
        }
        return $result;
    }
}