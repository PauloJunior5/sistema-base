<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Interfaces\ContratoInterface;
use App\Models\Contrato;

class ContratoRepository implements ContratoInterface
{
    public function index()
    {
        return DB::table('contratos')->get();
    }

    
    public function create()
    {
        return DB::table('clientes')->get();
    }

    public function store(Contrato $contrato)
    {
        DB::beginTransaction();
        try {

            $dados = [
                // 'pais' => $pais->getPais(),
                // 'sigla' => $pais->getSigla(),
                // 'created_at' => $pais->getCreated_at(),
            ];

            DB::table('paises')->insert($dados);

            DB::commit();
            return redirect()->route('pais.index')->with('Success', 'Pais criado com sucesso.')->send();

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel criar país: ' . $th);
            return redirect()->route('pais.index')->with('Warning', 'Não foi possivel criar país.')->send();

        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $clientes = DB::table('clientes')->get();
        $contrato = DB::table('contratos')->where('id', $id)->first();
        $cliente = DB::table('clientes')->where('id', $contrato->id_responsavel)->first();

        $resultado = [
            'clientes' => $clientes,
            'contrato' => $contrato,
            'cliente' => $cliente
        ];

        return $resultado;
    }

    public function update(Contrato $pais)
    {
        DB::beginTransaction();
        try {

            $dados = [
                // 'pais' => $pais->getPais(),
                // 'sigla' => $pais->getSigla(),
                // 'updated_at' => $pais->getUpdated_at()
            ];

            DB::table('paises')->where('id', $pais->getId())->update($dados);

            DB::commit();
            return redirect()->route('pais.index')->with('Success', 'País alterado com sucesso.');

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel editar país: ' . $th);
            return redirect()->route('pais.index')->with('Warning', 'Não foi possivel editar país.');

        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {

            DB::table('paises')->where('id', $id)->delete();
            DB::commit();
            return redirect()->route('pais.index')->with('Success', 'País excluído com sucesso.');

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel excluir país: ' . $th);
            return redirect()->route('pais.index')->with('Warning', 'Não foi possivel excluir país. Verifique se existe vínculo com cidades e/ou estados.');

        }
    }
}