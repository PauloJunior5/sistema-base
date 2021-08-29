@extends('layouts.app', ['activePage' => 'paciente-management', 'titlePage' => __('Paciente Management')])
@section('content')
@include('layouts.modais.chamada-modal.medico')
@include('layouts.modais.chamada-modal.cidade')
@include('layouts.modais.chamada-modal.estado')
@include('layouts.modais.chamada-modal.pais')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('paciente.update', $paciente->getId()) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Alterar Paciente') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Código de Referência</label>
                                    <input class="form-control" value="{{$paciente->getId()}}" name="id" readonly />
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Paciente</label>
                                    <input class="form-control" name="paciente" type="text" value="{{$paciente->getPaciente()}}" />
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Apelido</label>
                                    <input class="form-control" name="apelido" type="text" value="{{$paciente->getApelido()}}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')CRM</label>
                                    <input class="form-control" id="crm-medico-input" value="{{$paciente->getMedico()->getCRM()}}" />
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Médico Responsável</label>
                                    <input class="form-control" id="medico-input" value="{{$paciente->getMedico()->getMedico()}}" readonly />
                                    <input type="hidden" id="id-medico-input" name="id_medico" value="{{$paciente->getMedico()->getId()}}">
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#medicoModal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-form-label">@include('includes.required')Endereço</label>
                                    <input type="text" class="form-control" name="endereco" value="{{$paciente->getEndereco()}}">
                                </div>
                                <div class="col-md-1">
                                    <label class="col-form-label">@include('includes.required')nº</label>
                                    <input type="text" class="form-control" name="numero" value="{{$paciente->GetNumero()}}">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Complemento</label>
                                    <input type="text" class="form-control" name="complemento" value="{{$paciente->getComplemento()}}">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')Bairro</label>
                                    <input type="text" class="form-control" name="bairro" value="{{$paciente->getBairro()}}">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')CEP</label>
                                    <input type="text" class="form-control" name="cep" value="{{$paciente->getCEP()}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label class="col-form-label">@include('includes.required')DDD</label>
                                    <input type="text" class="form-control" id="ddd-cidade-input-paciente" readonly value="{{$paciente->getCidade()->getDDD()}}">
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Cidade</label>
                                    <input class="form-control" id="cidade-input-paciente" value="{{$paciente->getCidade()->getCidade()}}" readonly />
                                    <input type="hidden" id="id-cidade-input-paciente" name="id_cidade" value="{{$paciente->getCidade()->getId()}}">
                                </div>
                                <div class="col-md-1">
                                    <label class="col-form-label">UF</label>
                                    <input class="form-control" id="uf-cidade-input-paciente" value="{{$paciente->getCidade()->getEstado()->getUF()}}" readonly />
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#cidadeModal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-form-label" for="sexo-id">Sexo</label>
                                    <select id="sexo-id" name="sexo" class="form-control">
                                        <option @if ($paciente->getSexo() == 'Indefinido') selected disabled @endif value='Indefinido'>Indefinido</option>
                                        <option @if ($paciente->getSexo() == 'Masculino') selected disabled @endif value='Masculino'>Masculino</option>
                                        <option @if ($paciente->getSexo() == 'Feminino') selected disabled @endif value='Feminino'>Feminino</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="nascimento">@include('includes.required')Nascimento</label>
                                    <input type="date" class="form-control" name="nascimento" value="{{$paciente->getNascimento()}}">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')Estado Civil</label>
                                    <input type="text" class="form-control" name="estado_civil" value="{{$paciente->getEstadoCivil()}}">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')Nacionalidade</label>
                                    <input type="text" class="form-control" name="nacionalidade" value="{{$paciente->getNacionalidade()}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')Telefone</label>
                                    <input type="text" class="form-control" name="telefone" value="{{$paciente->getTelefone()}}">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">Celular</label>
                                    <input type="text" class="form-control" name="celular" value="{{$paciente->getCelular()}}">
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Email</label>
                                    <input type="text" class="form-control" name="email" value="{{$paciente->getEmail()}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')CPF</label>
                                    <input type="text" class="form-control" name="cpf" value="{{$paciente->getCPF()}}">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')RG</label>
                                    <input type="text" class="form-control" name="rg" value="{{$paciente->getRG()}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="observacao">Observação</label>
                                    <input type="text" class="form-control" name="observacao" value="{{$paciente->getObservacao()}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Data de Criação</label>
                                    <input type="datetime-local" class="form-control" value="{{$paciente->getCreated_at()}}" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Data de Alteração</label>
                                    <input type="datetime-local" class="form-control" value="{{$paciente->getUpdated_at()}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{ route('paciente.index') }}" class="btn btn-secondary">{{ __('Voltar') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('includes.scripts.pacientes')
@endsection
