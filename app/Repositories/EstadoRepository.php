<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\EstadoRequest;
use App\Interfaces\EstadoInterface;
use App\Models\Estado;

class EstadoRepository implements EstadoInterface
{
    public function index()
    {
        return view('estados.index', ['estados' => DB::table('estados')->get()]);
    }

    public function create()
    {
        $paises = DB::table('paises')->get();
        return view('estados.create', compact('paises'));
    }

    public function store(Estado $estado)
    {
        DB::beginTransaction();
        try {

            $dados = $this->getData($estado);

            DB::table('estados')->insert($dados);

            DB::commit();

            return redirect()->route('estado.index')->with('Success', 'Estado criado com sucesso.')->send();

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::debug('Warning - Não foi possivel criar estado: ' . $th);
            return redirect()->route('estado.index')->with('Warning', 'Não foi possivel criar estado.')->send();

        }
    }

    public function show(EstadoRequest $request)
    {
    }

    public function edit($estado_id)
    {
    }

    public function update(EstadoRequest $request)
    {
    }

    public function destroy($estado_id)
    {
    }

    public function createEstado(Estado $estado)
    {
        DB::beginTransaction();
        try {

            $dados = $this->getData($estado);

            DB::table('estados')->insert($dados);

            DB::commit();
            return redirect()->back()->withInput()->with('error_code', 5)->send();

        } catch (\Throwable $th) {

            DB::rollBack();
            return redirect()->back()->withInput()->send();

        }
    }

    public function findById(int $id)
    {
    }

    /**
     *  Retorna array a partir do objeto passado
     * como parametro, para inserir dados no banco.
     */
    public function getData(Estado $estado)
    {
        $dados = [
            'id'      => $estado->getId(),
            'estado'  => $estado->getEstado(),
            'uf'      => $estado->getUF(),
            'id_pais' => $estado->getPais()->getId(),
            'created_at' => $estado->getCreated_at(),
            'updated_at' => $estado->getUpdated_at()
        ];

        return $dados;
    }

}