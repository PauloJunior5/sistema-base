<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\PaisRequest;
use App\Interfaces\PaisInterface;
use App\Models\Pais;
use Carbon\Carbon;

class PaisRepository implements PaisInterface
{
    public function index()
    {
        return DB::table('paises')->get();
    }

    public function store(Pais $pais)
    {
        DB::beginTransaction();
        try {

            $dados = [
                'pais' => $pais->getPais(),
                'sigla' => $pais->getSigla(),
                'created_at' => $pais->getCreated_at(),
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
        return DB::table('paises')->where('id', $id)->first();
    }

    public function edit($id)
    {
        return DB::table('paises')->where('id', $id)->first();
    }

    public function update(Pais $pais)
    {
        DB::beginTransaction();
        try {

            $dados = [
                'pais' => $pais->getPais(),
                'sigla' => $pais->getSigla(),
                'updated_at' => $pais->getUpdated_at()
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

    public function createPais(PaisRequest $request)
    {
        DB::beginTransaction();
        try {

            $pais = new Pais;

            $pais->setPais($request->get('pais'));
            $pais->setSigla($request->get('sigla'));
            $pais->setCreated_at(Carbon::now()->toDateTimeString());

            $dados = [
                'pais' => $pais->getPais(),
                'sigla' => $pais->getSigla(),
                'created_at' => $pais->getCreated_at(),
            ];

            DB::table('paises')->insert($dados);

            DB::commit();
            return redirect()->back()->withInput()->with('error_code', 4)->send();

        } catch (\Throwable $th) {

            DB::rollBack();
            return redirect()->back()->withInput()->send();

        }
    }
}