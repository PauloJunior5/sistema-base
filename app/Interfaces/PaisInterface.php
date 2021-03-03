<?php 

namespace App\Interfaces;

use App\Models\Pais;
use Illuminate\Http\Request;

interface PaisInterface
{
    public function index();
    public function store(Pais $pais);
    public function show(int $id);
    public function edit(int $id);
    public function update(Pais $pais);
    public function destroy(int $id);
    public function createPais(Pais $pais);
}