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
        DB::beginTransaction();
        try {
            DB::table('categorias')->insert($dados);
            DB::commit();
            return redirect()->route('categoria.index')->with('Success', 'Categoria criada com sucesso!')->send();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - (CategoriaRepository) Não foi possivel criar categoria: ' . $th);
            return redirect()->route('categoria.index')->with('Warning', 'Não foi possivel criar categoria!')->send();
        }
    }

    public function findById(int $id)
    {
        return DB::table('categorias')->where('id', $id)->first();
    }

    public function atualizar(array $category)
    {
    }

    public function remover(int $id)
    {
    }
}