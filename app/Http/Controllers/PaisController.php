<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Interfaces\PaisInterface;

class PaisController extends Controller
{
    public function __construct(PaisInterface $paisInterface)
    {
        $this->paisInterface = $paisInterface;
    }

    public function index()
    {
        return $this->paisInterface->index();
    }

    public function create()
    {
        return $this->paisInterface->create();
    }

    public function store(Request $request)
    {
        return $this->paisInterface->store($request);
    }

    public function edit($pais_id)
    {
        return $this->paisInterface->edit($pais_id);
    }

    public function update(Request $request)
    {
        return $this->paisInterface->update($request);
    }

    public function destroy($pais_id)
    {
        return $this->paisInterface->destroy($pais_id);
    }

    public function createPais(Request $request)
    {
        return $this->paisInterface->createPais($request);
    }
}
