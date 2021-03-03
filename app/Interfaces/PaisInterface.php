<?php 

namespace App\Interfaces;

use App\Http\Requests\PaisRequest;

interface PaisInterface
{
    public function index();
    public function create();
    public function store(PaisRequest $pais);
    public function show(PaisRequest $pais);
    public function edit(int $id);
    public function update(PaisRequest $pais);
    public function destroy(int $id);
    public function createPais(PaisRequest $pais);
}