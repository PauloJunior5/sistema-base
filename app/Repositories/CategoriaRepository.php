<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoriaRepository
{
    public function mostrarTodos()
    {
        $categorias = DB::table('categorias')->get();

        return $categorias;
    }

    public function adicionar(array $dados)
    {
        $result = null;
        DB::beginTransaction();
        try {
            $result = DB::table('categorias')->insert($dados);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - (CategoriaRepository) Não foi possivel criar categoria: ' . $th);
        }
        return $result;
    }

    public function findById(int $id)
    {
        return DB::table('categorias')->where('id', $id)->first();
    }

    public function atualizar(array $dados)
    {
        DB::beginTransaction();
        try {
            DB::table('categorias')->where('id', $dados['id'])->update($dados);
            DB::commit();
            return redirect()->route('categoria.index')->with('Success', 'Categoria alterada com sucesso!')->send();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - (CategoriaRepository) Não foi possivel editar categoria: ' . $th);
            return redirect()->route('categoria.index')->with('Warning', 'Não foi possivel alterar categoria!')->send();
        }
    }

    public function remover(int $id)
    {
        DB::beginTransaction();
        try {
            DB::table('categorias')->where('id', $id)->delete();
            DB::commit();
            return redirect()->route('categoria.index')->with('Success', 'Categoria excluída com sucesso!')->send();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - (CategoriaRepository) Não foi possivel excluir categoria: ' . $th);
            return redirect()->route('categoria.index')->with('Warning', 'Não foi possivel excluir categoria!')->send();
        }
    }
}