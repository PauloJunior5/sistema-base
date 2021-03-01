<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait ShowCliente
{
    public function showCliente($id)
    {
        $cliente = DB::table('clientes')->where('id', $id)->first();
        return response()->json($cliente);
    }
}