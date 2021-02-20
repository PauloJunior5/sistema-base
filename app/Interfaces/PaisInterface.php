<?php 

namespace App\Interfaces;

use Illuminate\Http\Request;

interface PaisInterface
{
    public function index();
    public function create();
    public function store(Request $request);
    public function edit($pais_id);
    public function update(Request $request);
    public function destroy($pais_id);
}