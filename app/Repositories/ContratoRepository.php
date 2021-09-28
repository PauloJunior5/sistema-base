<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ContratoRepository
{
    public function mostrarTodos()
    {
        return DB::table('contratos')->get();
    }

    public function mostrarTodosPacientes()
    {
        return DB::table('pacientes')
                ->join('contratos_pacientes', 'pacientes.id', '=', 'contratos_pacientes.id_paciente')
                ->join('contratos', 'contratos.id', '=', 'contratos_pacientes.id_contrato')
                ->select('pacientes.*')
                ->get();
    }

    public function adicionar($dados)
    {
        $result = null;
        DB::beginTransaction();
        try {
            $result = DB::table('contratos')->insertGetId($dados);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - Não foi possivel criar contrato: ' . $th);
        }
        return $result;
    }

    public function findById(int $id)
    {
        $contrato = DB::table('contratos')->where('id', $id)->first();
        return $contrato;
    }

    public function atualizar($dados)
    {
        $result = null;
        DB::beginTransaction();
        try {
            $result = DB::table('contratos')->where('id', $dados['id'])->update($dados);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - Não foi possivel editar contrato: ' . $th);
        }
        return $result;
    }

    public function remover($id)
    {
        $result = null;
        DB::beginTransaction();
        try {
            $result = DB::table('contratos')->where('id', $id)->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - Não foi possivel excluir contrato: ' . $th);
        }
        return $result;
    }

    public function removerPacientes($dados)
    {
        $result = null;
        DB::beginTransaction();
        try {
            foreach ($dados['pacientesExluidos'] as $paciente) {
                DB::table('contratos_pacientes')->where('id_paciente', $paciente->id)->where('id_contrato', $dados['contrato_id'])->delete();
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - Não foi possivel excluir pacientes: ' . $th);
        }
        return $result;
    }
}