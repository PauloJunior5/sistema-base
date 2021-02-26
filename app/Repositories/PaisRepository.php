<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\PaisRequest;
use App\Traits\CreateEntities;
use App\Interfaces\PaisInterface;
use App\Models\Pais;
use Carbon\Carbon;

class PaisRepository implements PaisInterface
{
    // Use CreateEntities Trait in this repository
    use CreateEntities;

    public function index()
    {
        return view('paises.index', ['paises' => DB::table('paises')->get()]);
    }

    public function create()
    {
        return view('paises.create');
    }

    public function store(PaisRequest $request)
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
            return redirect()->route('pais.index')->with('Success', 'Pais criado com sucesso.')->send();

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel criar país: ' . $th);
            return redirect()->route('pais.index')->with('Warning', 'Não foi possivel criar país.')->send();

        }
    }

    public function show(PaisRequest $request)
    {
        return DB::table('paises')->where('id', $request->get('id'))->first();
    }

    public function edit($pais_id)
    {
        $pais = DB::table('paises')->where('id', $pais_id)->first();
        return view('paises.edit', compact('pais'));
    }

    public function update(PaisRequest $request)
    {
        DB::beginTransaction();
        try {

            $timestamp = new Carbon();

            $dados = [
                'pais' => $request->get('pais'),
                'sigla' => $request->get('sigla'),
                'updated_at' => $timestamp->toDateTimeString(),
            ];

            DB::table('paises')->where('id', $request->get('id'))->update($dados);

            DB::commit();
            return redirect()->route('pais.index')->with('Success', 'País alterado com sucesso.');

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel editar país: ' . $th);
            return redirect()->route('pais.index')->with('Warning', 'Não foi possivel editar país.');

        }
    }

    public function destroy($pais_id)
    {
        DB::beginTransaction();
        try {

            DB::table('paises')->where('id', $pais_id)->delete();
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