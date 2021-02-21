<?php

namespace App\Repositories;

use App\Http\Requests\PaisRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\EstadoRequest;
use App\Interfaces\EstadoInterface;
use App\Models\Estado;

class EstadoRepository implements EstadoInterface
{
    public function index()
    {
        return view('estados.index', ['estados' => Estado::all()]);
    }

    public function create()
    {

    }

    public function store(EstadoRequest $request)
    {
        
    }

    public function show(EstadoRequest $request)
    {

    }

    public function edit($pais_id)
    {

    }

    public function update(EstadoRequest $request)
    {

    }

    public function destroy($pais_id)
    {

    }

    public function createEstado(EstadoRequest $request)
    {

    }
}