<?php 

namespace App\Interfaces;

use App\Models\Pais;

interface PaisInterface
{
    public function index();
    public function create();
    public function store(Pais $pais);
    public function show(int $id);
    public function edit(int $id);
    public function update(Pais $pais);
    public function destroy(int $id);
    public function createPais(Pais $pais);
}