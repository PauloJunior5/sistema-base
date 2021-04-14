<?php

namespace App\Models;

class Paciente extends Model
{
    protected string $paciente;
    protected string $apelido;
    protected Medico $medico;
    protected string $endereco;
    protected string $numero;
    protected string $complemento;

    protected string $bairro;
    protected string $cep;
    protected Cidade $cidade;
    protected string $sexo;
    protected string $nascimento;
    protected string $estadoCivil;
    protected string $nacionalidade;

    protected string $telefone;
    protected string $celular;
    protected string $email;
    protected string $cpf;
    protected string $rg;
    protected string $observacao;

    public function __construct()
    {
        $this->paciente = '';
        $this->apelido = '';
        $this->medico = new Medico;
        $this->endereco = '';
        $this->numero = '';
        $this->complemento = '';

        $this->bairro = '';
        $this->cep = '';
        $this->cidade = new Cidade;
        $this->sexo = '';
        $this->nascimento = '';
        $this->estadoCivil = '';
        $this->nacionalidade = '';

        $this->telefone = '';
        $this->celular = '';
        $this->email = '';
        $this->cpf = '';
        $this->rg = '';
        $this->observacao = '';
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Paciente
    |--------------------------------------------------------------------------
    |
    */
    public function getPaciente(): string
    {
        return $this->paciente;
    }

    public function setPaciente(string $paciente)
    {
        $this->paciente = $paciente;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Apelido
    |--------------------------------------------------------------------------
    |
    */
    public function getApelido(): string
    {
        return $this->apelido;
    }

    public function setApelido(string $apelido)
    {
        $this->apelido = $apelido;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Médico
    |--------------------------------------------------------------------------
    |
    */
    public function getMedico(): Medico
    {
        return $this->medico;
    }

    public function setMedico(Medico $medico)
    {
        $this->medico = $medico;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Endereço
    |--------------------------------------------------------------------------
    |
    */
    public function getEndereco(): string
    {
        return $this->endereco;
    }

    public function setEndereco(string $endereco)
    {
        $this->endereco = $endereco;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Numero
    |--------------------------------------------------------------------------
    |
    */
    public function getNumero(): string
    {
        return $this->numero;
    }

    public function setNumero(string $numero)
    {
        $this->numero = $numero;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Complemento
    |--------------------------------------------------------------------------
    |
    */
    public function getComplemento(): string
    {
        return $this->complemento;
    }

    public function setComplemento(string $complemento)
    {
        $this->complemento = $complemento;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Bairro
    |--------------------------------------------------------------------------
    |
    */
    public function getBairro(): string
    {
        return $this->bairro;
    }

    public function setBairro(string $bairro)
    {
        $this->bairro = $bairro;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set CEP
    |--------------------------------------------------------------------------
    |
    */
    public function getCEP(): string
    {
        return $this->cep;
    }

    public function setCEP(string $cep)
    {
        $this->cep = $cep;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Cidade
    |--------------------------------------------------------------------------
    |
    */
    public function getCidade(): Cidade
    {
        return $this->cidade;
    }

    public function setCidade(Cidade $cidade)
    {
        $this->cidade = $cidade;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Sexo
    |--------------------------------------------------------------------------
    |
    */
    public function getSexo(): string
    {
        return $this->sexo;
    }

    public function setSexo(string $sexo)
    {
        $this->sexo = $sexo;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Nascimento
    |--------------------------------------------------------------------------
    |
    */
    public function getNascimento(): string
    {
        return $this->nascimento;
    }

    public function setNascimento(string $nascimento)
    {
        $this->nascimento = $nascimento;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Estado Civil
    |--------------------------------------------------------------------------
    |
    */
    public function getEstadoCivil(): string
    {
        return $this->estadoCivil;
    }

    public function setEstadoCivil(string $estadoCivil)
    {
        $this->estadoCivil = $estadoCivil;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Nacionalidade
    |--------------------------------------------------------------------------
    |
    */
    public function getNacionalidade(): string
    {
        return $this->nacionalidade;
    }

    public function setNacionalidade(string $nacionalidade)
    {
        $this->nacionalidade = $nacionalidade;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Telefone
    |--------------------------------------------------------------------------
    |
    */
    public function getTelefone(): string 
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone)
    {
        $this->telefone = $telefone;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Celular
    |--------------------------------------------------------------------------
    |
    */
    public function getCelular(): string 
    {
        return $this->celular;
    }

    public function setCelular(string $celular)
    {
        $this->celular = $celular;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Email
    |--------------------------------------------------------------------------
    |
    */
    public function getEmail(): string 
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set CPF
    |--------------------------------------------------------------------------
    |
    */
    public function getCPF(): string 
    {
        return $this->cpf;
    }

    public function setCPF(string $cpf)
    {
        $this->cpf = $cpf;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set RG
    |--------------------------------------------------------------------------
    |
    */
    public function getRG(): string 
    {
        return $this->rg;
    }

    public function setRG(string $rg)
    {
        $this->rg = $rg;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Observacao
    |--------------------------------------------------------------------------
    |
    */
    public function getObservacao(): string 
    {
        return $this->observacao;
    }

    public function setObservacao(string $observacao)
    {
        $this->observacao = $observacao;
    }
}
