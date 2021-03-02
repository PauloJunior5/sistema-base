<?php 

namespace App\Interfaces;

use App\Models\Pais;
use Illuminate\Http\Request;

interface PaisInterface
{
    public function index();
    public function store(Pais $pais);
    public function show($id);
    public function edit($id);
    public function update(Pais $pais);
    public function destroy($id);
    public function createPais(Pais $pais);
}