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
                <form method="post" action="{{ route('paciente.update', $paciente->id) }}" autocomplete="off" class="form-horizontal">
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
                                    <input class="form-control" value="{{$paciente->id}}" readonly />
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Paciente</label>
                                    <input class="form-control" name="paciente" type="text" value="{{$paciente->paciente}}" />
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Apelido</label>
                                    <input class="form-control" name="apelido" type="text" value="{{$paciente->apelido}}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label class="col-form-label">@include('includes.required')CRM</label>
                                    <input class="form-control" id="crm-medico-input" value="{{$medico->crm}}" />
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Médico Responsável</label>
                                    <input class="form-control" id="medico-input" value="{{$medico->medico}}" readonly />
                                    <input type="hidden" id="id-medico-input" name="id_medico" value="{{$medico->id}}">
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#medicoModal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-form-label">@include('includes.required')Endereço</label>
                                    <input type="text" class="form-control" name="endereco" value="{{$paciente->endereco}}">
                                </div>
                                <div class="col-md-1">
                                    <label class="col-form-label">@include('includes.required')nº</label>
                                    <input type="text" class="form-control" name="numero" value="{{$paciente->numero}}">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Complemento</label>
                                    <input type="text" class="form-control" name="complemento" value="{{$paciente->complemento}}">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')Bairro</label>
                                    <input type="text" class="form-control" name="bairro" value="{{$paciente->bairro}}">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')CEP</label>
                                    <input type="text" class="form-control" name="cep" value="{{$paciente->cep}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label class="col-form-label">@include('includes.required')DDD</label>
                                    <input type="text" class="form-control" id="ddd-cidade-input-paciente" readonly value="{{$cidade->ddd}}">
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Cidade</label>
                                    <input class="form-control" id="cidade-input-paciente" value="{{$cidade->cidade}}" readonly />
                                    <input type="hidden" id="id-cidade-input-paciente" name="id_cidade" value="{{$cidade->id}}">
                                </div>
                                <div class="col-md-1">
                                    <label class="col-form-label">UF</label>
                                    <input class="form-control" id="uf-cidade-input-paciente" value="{{$estado->uf}}" readonly />
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#cidadeModal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-form-label">Sexo</label>
                                    <input type="text" class="form-control" name="sexo" value="{{$paciente->sexo}}">
                                </div>
                                <div class="col-md-2">
                                    <label for="nascimento">@include('includes.required')Nascimento</label>
                                    <input type="date" class="form-control" name="nascimento" value="{{$paciente->nascimento}}">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')Estado Civil</label>
                                    <input type="text" class="form-control" name="estado_civil" value="{{$paciente->estado_civil}}">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')Nacionalidade</label>
                                    <input type="text" class="form-control" name="nacionalidade" value="{{$paciente->nacionalidade}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')Telefone</label>
                                    <input type="text" class="form-control" name="telefone" value="{{$paciente->telefone}}">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">Celular</label>
                                    <input type="text" class="form-control" name="celular" value="{{$paciente->celular}}">
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Email</label>
                                    <input type="text" class="form-control" name="email" value="{{$paciente->email}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')CPF</label>
                                    <input type="text" class="form-control" name="cpf" value="{{$paciente->cpf}}">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')RG</label>
                                    <input type="text" class="form-control" name="rg" value="{{$paciente->rg}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="observacao">Observação</label>
                                    <input type="text" class="form-control" name="observacao" value="{{$paciente->observacao}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Data de Criação</label>
                                    <input type="datetime-local" class="form-control" value="{{$paciente->created_at->format('Y-m-d H:i:s')}}" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Data de Alteração</label>
                                    <input type="datetime-local" class="form-control" value="{{$paciente->updated_at->format('Y-m-d H:i:s')}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{ route('paciente.index') }}" class="btn btn-secondary">{{ __('Back to list') }}</a>
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
