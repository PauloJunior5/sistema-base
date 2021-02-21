<?php

namespace App\Traits;

use App\Http\Requests\EstadoRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\PaisRequest;
use App\Models\Estado;
use App\Models\Pais;

trait CreateEntities
{
    /**
     * Criação de países - index
     * 
     */
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

    /**
     * Criação de países - modal
     * 
     */
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

    /**
     * Criação de estados - index
     * 
     */
    public function traitStoreEstado(EstadoRequest $request)
    {
        DB::beginTransaction();
        try {

            Estado::create($request->all());
            DB::commit();
            return redirect()->route('estado.index')->with('Success', 'Estado criado com sucesso.')->send();

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel criar estado: ' . $th);
            return redirect()->route('estado.index')->with('Warning', 'Não foi possivel criar estado.')->send();

        }
    }

    /**
     * Criação de estados - modal
     * 
     */
    public function traitCreateEstado(EstadoRequest $request)
    {
        DB::beginTransaction();
        try {

            Estado::create($request->all());
            DB::commit();
            return redirect()->back()->withInput()->with('error_code', 5)->send();

        } catch (\Throwable $th) {

            DB::rollBack();
            return redirect()->back()->withInput()->send();

        }
    }
}
