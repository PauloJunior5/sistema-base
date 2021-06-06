<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClienteRepository
{
    public function mostrarTodos()
    {
        $clientes = DB::table('clientes')->get();
        return $clientes;
    }

    public function mostrarTodosFisicos()
    {
        $clientes = DB::table('clientes')->get()->where('tipo', 'pessoaFisica');
        return $clientes;
    }

    public function mostrarTodosJuridicos()
    {
        $clientes = DB::table('clientes')->get()->where('tipo', 'pessoaJuridica');
        return $clientes;
    }

    public function adicionar($dados)
    {
        $result = null;
        DB::beginTransaction();
        try {
            $result = DB::table('clientes')->insert($dados);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - Não foi possivel criar cliente: ' . $th);
        }
        return $result;
    }

    public function findById(int $id)
    {
        $cliente = DB::table('clientes')->where('id', $id)->first();
        return $cliente;
    }

    public function atualizar($dados)
    {
        $result = null;
        DB::beginTransaction();
        try {
            $result = DB::table('clientes')->where('id', $dados['id'])->update($dados);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - Não foi possivel editar cliente: ' . $th);
        }
        return $result;
    }

    public function remover($id)
    {
        $result = null;
        DB::beginTransaction();
        try {
            $result = DB::table('clientes')->where('id', $id)->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - Não foi possivel excluir cliente: ' . $th);
        }
        return $result;
    }
}