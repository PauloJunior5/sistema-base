<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface CidadeInterface
{
    public function index();
    public function create();
    public function store(Request $request);
    public function show(Request $request);
    public function edit($estado_id);
    public function update(Request $request);
    public function destroy($estado_id);
    public function createCidade(Request $request);
    public function createCidadeMedico(Request $request);
}