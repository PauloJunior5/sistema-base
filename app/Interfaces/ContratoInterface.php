<?php 

namespace App\Interfaces;

use App\Models\Contrato;

interface ContratoInterface
{
    public function index();
    public function store(Contrato $contrato);
    public function show($id);
    public function edit($id);
    public function update(Contrato $contrato);
    public function destroy($id);
}