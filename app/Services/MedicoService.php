<?php

namespace App\Services;

use App\Models\Medico;
use App\Http\Requests\MedicoRequest;
use App\Repositories\MedicoRepository;

class MedicoService
{
    public function __construct()
    {
        $this->medicoRepository = new MedicoRepository;
        $this->cidadeService = new CidadeService;
    }

    public function instanciarTodos()
    {
        $results = $this->medicoRepository->mostrarTodos();
        $medicos = collect();

        foreach ($results as $result) {
            $medico = new Medico;
            $medico->setId($result->id);
            $medico->setCreated_at($result->created_at ?? null);
            $medico->setUpdated_at($result->updated_at ?? null);
            $medico->setMedico($result->medico);
            $medico->setCRM($result->crm);
            $medico->setEspecialidade($result->especialidade);
            $medico->setEndereco($result->endereco);
            $medico->setNumero($result->numero);
            $medico->setComplemento($result->complemento);
            $medico->setBairro($result->bairro);
            $medico->setCEP($result->cep);
            $medico->setTelefone($result->telefone);
            $medico->setCelular($result->celular);
            $medico->setEmail($result->email);
            $medico->setCPF($result->cpf);
            $medico->setRG($result->rg);
            $medico->setNascimento($result->nascimento);
            $medico->setNacionalidade($result->nacionalidade);
            $medico->setObservacao($result->observacao);
            $cidade = $this->cidadeService->buscarEInstanciar($result->id_cidade);
            $medico->setCidade($cidade);
            $medicos->push($medico);
        }

        return $medicos;
    }

    public function instanciarECriar(MedicoRequest $request)
    {
        $medico = new Medico;
        $medico->setMedico($request->medico);
        $medico->setCRM($request->crm);
        $medico->setEspecialidade($request->especialidade);
        $medico->setEndereco($request->endereco);
        $medico->setNumero($request->numero);
        $medico->setComplemento($request->complemento);
        $medico->setBairro($request->bairro);
        $medico->setCEP($request->cep);
        $medico->setTelefone($request->telefone);
        $medico->setCelular($request->celular);
        $medico->setEmail($request->email);
        $medico->setCPF($request->cpf);
        $medico->setRG($request->rg);
        $medico->setNascimento($request->nascimento);
        $medico->setNacionalidade($request->nacionalidade);
        $medico->setObservacao($request->observacao);
        $cidade = $this->cidadeService->buscarEInstanciar($request->id_cidade);
        $medico->setCidade($cidade);
        $medico->setCreated_at(now()->toDateTimeString());
        $dados = $this->getDados($medico);
        return $this->medicoRepository->adicionar($dados);
    }

    public function instanciarEAtualizar(MedicoRequest $request)
    {
        $medico = new Medico;
        $medico->setId($request->id);
        $medico->setCreated_at($request->created_at);
        $medico->setUpdated_at(now()->toDateTimeString());
        $medico->setMedico($request->medico);
        $medico->setCRM($request->crm);
        $medico->setEspecialidade($request->especialidade);
        $medico->setEndereco($request->endereco);
        $medico->setNumero($request->numero);
        $medico->setComplemento($request->complemento);
        $medico->setBairro($request->bairro);
        $medico->setCEP($request->cep);
        $medico->setTelefone($request->telefone);
        $medico->setCelular($request->celular);
        $medico->setEmail($request->email);
        $medico->setCPF($request->cpf);
        $medico->setRG($request->rg);
        $medico->setNascimento($request->nascimento);
        $medico->setNacionalidade($request->nacionalidade);
        $medico->setObservacao($request->observacao);
        $cidade = $this->cidadeService->buscarEInstanciar($request->id_cidade);
        $medico->setCidade($cidade);
        $dados = $this->getDados($medico);
        return $this->medicoRepository->atualizar($dados);
    }

    /**
     *  Retorna objeto a partir do id passado
     * como parametro. Para instanciar o objeto.
     */
    public function buscarEInstanciar(int $id)
    {
        $result = $this->medicoRepository->findById($id);
        $medico = new Medico;
        $medico->setId($result->id);
        $medico->setCreated_at($result->created_at ?? null);
        $medico->setUpdated_at($result->updated_at ?? null);
        $medico->setMedico($result->medico);
        $medico->setCRM($result->crm);
        $medico->setEspecialidade($result->especialidade);
        $medico->setEndereco($result->endereco);
        $medico->setNumero($result->numero);
        $medico->setComplemento($result->complemento);
        $medico->setBairro($result->bairro);
        $medico->setCEP($result->cep);
        $medico->setTelefone($result->telefone);
        $medico->setCelular($result->celular);
        $medico->setEmail($result->email);
        $medico->setCPF($result->cpf);
        $medico->setRG($result->rg);
        $medico->setNascimento($result->nascimento);
        $medico->setNacionalidade($result->nacionalidade);
        $medico->setObservacao($result->observacao);
        $cidade = $this->cidadeService->buscarEInstanciar($result->id_cidade);
        $medico->setCidade($cidade);
        return $medico;
    }

    /**
     *  Retorna array a partir do objeto passado
     * como parametro, para inserir dados no banco.
     */
    public function getDados(Medico $medico)
    {
        $dados = [
            'id' => $medico->getId(),
            'medico' => $medico->getMedico(),
            'crm' => $medico->getCRM(),
            'especialidade' => $medico->getEspecialidade(),
            'endereco' => $medico->getEndereco(),
            'numero' => $medico->getNumero(),
            'complemento' => $medico->getComplemento(),
            'bairro' => $medico->getBairro(),
            'cep' => $medico->getCEP(),
            'id_cidade' => $medico->getCidade()->getId(),
            'telefone' => $medico->getTelefone(),
            'celular' => $medico->getCelular(),
            'email' => $medico->getEmail(),
            'cpf' => $medico->getCPF(),
            'rg' => $medico->getRG(),
            'nascimento' => $medico->getNascimento(),
            'nacionalidade' => $medico->getNacionalidade(),
            'observacao' => $medico->getObservacao(),
            'created_at' => $medico->getCreated_at(),
            'updated_at' => $medico->getUpdated_at()
        ];
        return $dados;
    }
}