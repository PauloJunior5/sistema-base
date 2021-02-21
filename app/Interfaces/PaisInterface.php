<?php 

namespace App\Interfaces;

use App\Http\Requests\PaisRequest;

interface PaisInterface
{
    public function index();
    public function create();
    public function store(PaisRequest $request);
    public function show(PaisRequest $request);
    public function edit($pais_id);
    public function update(PaisRequest $request);
    public function destroy($pais_id);
    public function createPais(PaisRequest $request);
}