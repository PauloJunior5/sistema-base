<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Pais;

trait CreateEntities
{
    public function traitStorePais(Request $request)
    {
        $request->validate([
            'pais' => 'unique:paises,pais',
        ]);
        Pais::create($request->all());
        DB::commit();
    }
}
