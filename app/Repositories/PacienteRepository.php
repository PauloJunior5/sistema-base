<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PacienteRepository
{
    public function mostrarTodos()
    {
        $pacientes = DB::table('pacientes')->get();
        return $pacientes;
    }

    public function adicionar($dados)
    {
        $result = null;
        DB::beginTransaction();
        try {
            $result = DB::table('pacientes')->insert($dados);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - Não foi possivel criar paciente: ' . $th);
        }
        return $result;
    }

    public function findById(int $id)
    {
        $paciente = DB::table('pacientes')->where('id', $id)->first();
        return $paciente;
    }

    public function atualizar($dados)
    {
        $result = null;
        DB::beginTransaction();
        try {
            $result = DB::table('pacientes')->where('id', $dados['id'])->update($dados);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - Não foi possivel editar paciente: ' . $th);
        }
        return $result;
    }

    public function remover($id)
    {
        $result = null;
        DB::beginTransaction();
        try {
            $result = DB::table('pacientes')->where('id', $id)->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - Não foi possivel excluir paciente: ' . $th);
        }
        return $result;
    }
}