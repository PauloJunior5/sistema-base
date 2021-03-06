<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CidadeRepository
{
    public function mostrarTodos()
    {
        $cidades = DB::table('cidades')->get();
        return $cidades;
    }

    public function adicionar($dados)
    {
        $result = null;

        DB::beginTransaction();
        try {

            $result = DB::table('cidades')->insert($dados);

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel criar cidade: ' . $th);

        }
        return $result;
    }

    public function findById(int $id)
    {
        $cidade = DB::table('cidades')->where('id', $id)->first();
        return $cidade;
    }

    public function atualizar($dados)
    {
        $result = null;

        DB::beginTransaction();
        try {

            $result = DB::table('cidades')->where('id', $dados['id'])->update($dados);

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel editar cidade: ' . $th);

        }
        return $result;
    }

    public function remover($id)
    {
        $result = null;

        DB::beginTransaction();
        try {

            $result = DB::table('cidades')->where('id', $id)->delete();

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel excluir cidade: ' . $th);

        }
        return $result;
    }
}