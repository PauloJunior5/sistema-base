<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

use App\Http\Requests\PaisRequest;
use App\Http\Requests\CidadeRequest;
use App\Http\Requests\EstadoRequest;
use App\Models\Cidade;
use App\Models\Estado;
use App\Models\Pais;

trait CreateEntities
{
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

    /**
     * Criação de cidades - modal
     * 
     */
    public function traitCreateCidade(CidadeRequest $request)
    {
        DB::beginTransaction();
            try {

                Cidade::create($request->all());
                DB::commit();
                return redirect()->back()->withInput()->with('error_code', 6)->send();

            } catch (\Throwable $th) {

                DB::rollBack();
                return redirect()->back()->withInput()->send();

            }
    }

    /**
     * Criação de cidades em médicos - modal
     * 
     */
    public function traitCreateCidadeMedico(CidadeRequest $request)
    {
        DB::beginTransaction();
        try {

            Cidade::create($request->all());
            DB::commit();
            return redirect()->back()->withInput()->with('error_code', 8)->send();

        } catch (\Throwable $th) {

            DB::rollBack();
            return redirect()->back()->withInput()->send();

        }
    }
}