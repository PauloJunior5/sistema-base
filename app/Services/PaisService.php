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
}