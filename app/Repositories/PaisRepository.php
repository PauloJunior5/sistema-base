<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaisRepository
{
    /*
    |--------------------------------------------------------------------------
    | Mostrar Todos
    |--------------------------------------------------------------------------
    |
    | Retorna lista de objetos.
    |
    */
    public function mostrarTodos()
    {
        $paises = DB::table('paises')->get();
        return $paises;
    }

    /*
    |--------------------------------------------------------------------------
    | Adicionar
    |--------------------------------------------------------------------------
    |
    | Adiciona novos países, no banco de dados.
    |
    */
    public function adicionar($dados)
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

    /*
    |--------------------------------------------------------------------------
    | Find By Id
    |--------------------------------------------------------------------------
    |
    | Retorna único obj.
    |
    */
    public function findById($id)
    {
        $pais = DB::table('paises')->where('id', $id)->first();
        return $pais;
    }

    /*
    |--------------------------------------------------------------------------
    | Atualizar
    |--------------------------------------------------------------------------
    |
    | Altera países, no banco de dados.
    |
    */
    public function atualizar($dados)
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

    /*
    |--------------------------------------------------------------------------
    | Remover
    |--------------------------------------------------------------------------
    |
    | Remove países, no banco de dados.
    |
    */
    public function remover($id)
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
}