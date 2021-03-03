<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Interfaces\PaisInterface;
use App\Models\Pais;

class PaisRepository implements PaisInterface
{
    public function index()
    {
        $paises = DB::table('paises')->get();
        return $paises;
    }

    public function store($dados)
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

    public function show($id)
    {
        $pais = DB::table('paises')->where('id', $id)->first();
        return $pais;
    }

    public function edit($id)
    {
        $pais = DB::table('paises')->where('id', $id)->first();
        return $pais;
    }

    public function update($dados)
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

    public function destroy($id)
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

    public function createPais($dados)
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

    public function findById(int $id)
    {
        $pais = DB::table('paises')->where('id', $id)->first();
        return $pais;
    }
}