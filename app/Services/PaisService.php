<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Pais;

class PaisService 
{
    public function store(Request $request)
    {
        $pais = new Pais;

        $pais->setPais($request->get('pais'));
        $pais->setSigla($request->get('sigla'));
        $pais->setCreated_at(Carbon::now()->toDateTimeString());

        return $pais;
    }

    public function update(Request $request)
    {
        $pais = new Pais;

        $pais->setId($request->id);
        $pais->setPais($request->pais);
        $pais->setSigla($request->sigla);
        $pais->setUpdated_at($request->created_at);
        $pais->setUpdated_at(Carbon::now()->toDateTimeString());

        return $pais;
    }
}