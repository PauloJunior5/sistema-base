<?php

namespace App\Services;

use App\Models\Paciente;
use App\Http\Requests\PacienteRequest;
use App\Repositories\PacienteRepository;

class pacienteService
{
    public function __construct()
    {
        $this->pacienteRepository = new PacienteRepository;
        $this->medicoService = new MedicoService;
        $this->cidadeService = new CidadeService;
    }

    public function instanciarECriar(PacienteRequest $request)
    {
        $paciente = new Paciente;
        $paciente->setPaciente($request->paciente);
        $paciente->setApelido($request->apelido);
        $paciente->setEndereco($request->endereco);
        $paciente->setNumero($request->numero);
        $paciente->setComplemento($request->complemento);
        $paciente->setBairro($request->bairro);
        $paciente->setCEP($request->cep);
        $paciente->setSexo($request->sexo);
        $paciente->setNascimento($request->nascimento);
        $paciente->setEstadoCivil($request->estado_civil);
        $paciente->setNacionalidade($request->nacionalidade);
        $paciente->setTelefone($request->telefone);
        $paciente->setCelular($request->celular);
        $paciente->setEmail($request->email);
        $paciente->setCPF($request->cpf);
        $paciente->setRG($request->rg);
        $paciente->setObservacao($request->observacao);
        $medico = $this->medicoService->buscarEInstanciar($request->id_medico);
        $paciente->setMedico($medico);
        $cidade = $this->cidadeService->buscarEInstanciar($request->id_cidade);
        $paciente->setCidade($cidade);
        $paciente->setCreated_at(now()->toDateTimeString());
        $dados = $this->getDados($paciente);
        return $this->pacienteRepository->adicionar($dados);
    }

    public function instanciarEAtualizar(PacienteRequest $request)
    {
        $paciente = new Paciente;
        $paciente->setId($request->id);
        $paciente->setCreated_at($request->created_at);
        $paciente->setUpdated_at(now()->toDateTimeString());
        $paciente->setPaciente($request->paciente);
        $paciente->setApelido($request->apelido);
        $paciente->setEndereco($request->endereco);
        $paciente->setNumero($request->numero);
        $paciente->setComplemento($request->complemento);
        $paciente->setBairro($request->bairro);
        $paciente->setCEP($request->cep);
        $paciente->setSexo($request->sexo);
        $paciente->setNascimento($request->nascimento);
        $paciente->setEstadoCivil($request->estado_civil);
        $paciente->setNacionalidade($request->nacionalidade);
        $paciente->setTelefone($request->telefone);
        $paciente->setCelular($request->celular);
        $paciente->setEmail($request->email);
        $paciente->setCPF($request->cpf);
        $paciente->setRG($request->rg);
        $paciente->setObservacao($request->observacao);
        $medico = $this->medicoService->buscarEInstanciar($request->id_medico);
        $paciente->setMedico($medico);
        $cidade = $this->cidadeService->buscarEInstanciar($request->id_cidade);
        $paciente->setCidade($cidade);
        $paciente->setCreated_at(now()->toDateTimeString());
        $dados = $this->getDados($paciente);
        return $this->pacienteRepository->atualizar($dados);
    }

    /**
     *  Retorna objeto a partir do id passado
     * como parametro. Para instanciar o objeto.
     */
    public function buscarEInstanciar(int $id)
    {
        $result = $this->pacienteRepository->findById($id);
        $paciente = new Paciente;
        $paciente->setId($result->id);
        $paciente->setCreated_at($result->created_at ?? null);
        $paciente->setUpdated_at($result->updated_at ?? null);
        $paciente->setPaciente($result->paciente);
        $paciente->setApelido($result->apelido);
        $paciente->setEndereco($result->endereco);
        $paciente->setNumero($result->numero);
        $paciente->setComplemento($result->complemento);
        $paciente->setBairro($result->bairro);
        $paciente->setCEP($result->cep);
        $paciente->setSexo($result->sexo);
        $paciente->setNascimento($result->nascimento);
        $paciente->setEstadoCivil($result->estado_civil);
        $paciente->setNacionalidade($result->nacionalidade);
        $paciente->setTelefone($result->telefone);
        $paciente->setCelular($result->celular);
        $paciente->setEmail($result->email);
        $paciente->setCPF($result->cpf);
        $paciente->setRG($result->rg);
        $paciente->setObservacao($result->observacao);
        $medico = $this->medicoService->buscarEInstanciar($result->id_medico);
        $paciente->setMedico($medico);
        $cidade = $this->cidadeService->buscarEInstanciar($result->id_cidade);
        $paciente->setCidade($cidade);
        return $paciente;
    }

    /**
     *  Retorna array a partir do objeto passado
     * como parametro, para inserir dados no banco.
     */
    public function getDados(Paciente $paciente)
    {
        $dados = [
            'id' => $paciente->getId(),
            'paciente' => $paciente->getPaciente(),
            'apelido' => $paciente->getPaciente(),
            'id_medico' => $paciente->getMedico()->getId(),
            'endereco' => $paciente->getEndereco(),
            'numero' => $paciente->getNumero(),
            'complemento' => $paciente->getComplemento(),
            'bairro' => $paciente->getBairro(),
            'cep' => $paciente->getCEP(),
            'id_cidade' => $paciente->getCidade()->getId(),
            'sexo' => $paciente->getSexo(),
            'nascimento' => $paciente->getNascimento(),
            'estado_civil' => $paciente->getEstadoCivil(),
            'nacionalidade' => $paciente->getNacionalidade(),
            'telefone' => $paciente->getTelefone(),
            'celular' => $paciente->getCelular(),
            'email' => $paciente->getEmail(),
            'cpf' => $paciente->getCPF(),
            'rg' => $paciente->getRG(),
            'observacao' => $paciente->getObservacao(),
            'created_at' => $paciente->getCreated_at(),
            'updated_at' => $paciente->getUpdated_at()
        ];
        return $dados;
    }
}