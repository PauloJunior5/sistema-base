<?php

namespace App\Traits;

use App\Http\Requests\PaisRequest;
use Illuminate\Support\Facades\DB;

use App\Models\Pais;

trait CreateEntities
{
    public function traitStorePais(PaisRequest $request)
    {
        $request->validate([
            'pais' => 'unique:paises,pais',
        ]);
        Pais::create($request->all());
        DB::commit();
    }
}
