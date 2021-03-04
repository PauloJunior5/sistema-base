<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaisRepository
{
    public function mostrarPaises()
    {
        $paises = DB::table('paises')->get();
        return $paises;
    }

    public function adicionarPais($dados)
    {
        $result = null;

        DB::beginTransaction();
        try {

            $result = DB::table('paises')->insert($dados);

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel criar país: ' . $th);

        }
        return $result;
    }

    public function findById($id)
    {
        $pais = DB::table('paises')->where('id', $id)->first();
        return $pais;
    }

    public function atualizarPais($dados)
    {
        $result = null;

        DB::beginTransaction();
        try {

            $result = DB::table('paises')->where('id', $dados['id'])->update($dados);

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel editar país: ' . $th);

        }
        return $result;
    }

    public function removerPais($id)
    {
        $result = null;

        DB::beginTransaction();
        try {

            $result = DB::table('paises')->where('id', $id)->delete();

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel excluir país: ' . $th);

        }
        return $result;
    }

    public function criarPaisModal($dados)
    {
        $result = null;

        DB::beginTransaction();
        try {

            $result = DB::table('paises')->insert($dados);
            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel criar país: ' . $th);

        }
        return $result;
    }
}