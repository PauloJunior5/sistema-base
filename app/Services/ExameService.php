<?php

namespace App\Services;

use App\Http\Requests\ExameRequest;
use App\Models\Exame;
use App\Repositories\ExameRepository;
use App\Services\CategoriaService;
use App\Models\Categoria;

class ExameService
{
    public function __construct(CategoriaService $categoriaService)
    {
        $this->exameRepository = new ExameRepository;
        $this->categoriaService = $categoriaService;
    }

    public function instanciarECriar(ExameRequest $request)
    {
        $exame = new Exame;
        $exame->setExame($request->exame);
        $exame->setValor($request->valor);
        $exame->setCategoria($request->id_categoria);
        $exame->setCreated_at(now()->toDateTimeString());
        $dados = $this->getDados($exame);
        return $this->exameRepository->adicionar($dados);
    }

    public function instanciarEAtualizar(ExameRequest $request)
    {
        $exame = new Exame;
        $exame->setId($request->id);
        $exame->setExame($request->exame);
        $exame->setValor($request->valor);
        $exame->setCategoria($request->categoria);
        $exame->setCreated_at($request->created_at);
        $exame->setUpdated_at(now()->toDateTimeString());
        $dados = $this->getDados($exame);
        return $this->exameRepository->atualizar($dados);
    }

    /**
     *  Retorna objeto a partir do id passado
     * como parametro. Para instanciar o objeto.
     */
    public function buscarEInstanciar(int $id)
    {
        $result = $this->exameRepository->findById($id);
        $exame = new Exame;
        $exame->setId($result->id);
        $exame->setExame($result->exame);
        $exame->setValor($result->valor);
        $categoria = $this->categoriaService->findById($result->id_categoria);
        dd($categoria);
        $exame->setCategoria($categoria);
        $exame->setCreated_at($result->created_at ?? null);
        $exame->setUpdated_at($result->updated_at ?? null);
        return $exame;
    }

    /**
     *  Retorna array a partir do objeto passado
     * como parametro, para inserir dados no banco.
     */
    public function getDados(Exame $exame)
    {
        $dados = [
            'id' => $exame->getId(),
            'exame' => $exame->getExame(),
            'valor' => $exame->getValor(),
            'id_categoria' => $exame->getCategoria(), 
            'created_at' => $exame->getCreated_at(),
            'updated_at' => $exame->getUpdated_at()
        ];
        return $dados;
    }
}