<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EstadoRepository
{
    public function mostrarEstados()
    {
        $estados = DB::table('estados')->get();
        return $estados;
    }

    public function adicionarEstado($dados)
    {
        $result = null;

        DB::beginTransaction();
        try {

            $result = DB::table('estados')->insert($dados);

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel criar estado: ' . $th);

        }
        return $result;
    }

    public function findById(int $id)
    {

        $estado = DB::table('estados')->where('id', $id)->first();
        return $estado;
    }

    public function atualizarEstado($dados)
    {
        $result = null;

        DB::beginTransaction();
        try {

            $result = DB::table('estados')->where('id', $dados['id'])->update($dados);

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel editar estado: ' . $th);

        }
        return $result;
    }

    public function removerEstado($id)
    {
        $result = null;

        DB::beginTransaction();
        try {

            $result = DB::table('estados')->where('id', $id)->delete();

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel excluir estado: ' . $th);

        }
        return $result;
    }

    public function criarEstadoModal($dados)
    {
        $result = null;

        DB::beginTransaction();
        try {

            $result = DB::table('estados')->insert($dados);
            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel criar estado: ' . $th);

        }
        return $result;
    }
}