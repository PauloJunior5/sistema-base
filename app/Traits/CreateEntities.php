<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\PaisRequest;
use App\Models\Pais;

trait CreateEntities
{
    public function traitStorePais(PaisRequest $request)
    {
        DB::beginTransaction();
        try {

            Pais::create($request->all());
            DB::commit();
            return redirect()->route('pais.index')->with('Success', 'Pais criado com sucesso.')->send();

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel criar país: ' . $th);
            return redirect()->route('pais.index')->with('Warning', 'Não foi possivel criar país.')->send();

        }
    }

    public function traitCreatePais(PaisRequest $request)
    {
        DB::beginTransaction();
        try {

            Pais::create($request->all());
            DB::commit();
            return redirect()->back()->withInput()->with('error_code', 4)->send();

        } catch (\Throwable $th) {

            DB::rollBack();
            return redirect()->back()->withInput()->send();

        }
    }
}
