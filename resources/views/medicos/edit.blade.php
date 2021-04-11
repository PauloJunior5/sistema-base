@extends('layouts.app', ['activePage' => 'medico-management', 'titlePage' => __('Médico Management')])
@section('content')
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
                <form method="post" action="{{ route('medico.update', $medico->getId()) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Alterar Médico') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Código</label>
                                    <input class="form-control" value="{{$medico->getId()}}" name="id" readonly />
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-4">
                                    <label>@include('includes.required')Médico</label>
                                    <input class="form-control" name="medico" type="text" value="{{$medico->getMedico()}}" required />
                                </div>
                                <div class="col-md-2">
                                    <label>@include('includes.required')Crm</label>
                                    <input class="form-control" name="crm" type="text" value="{{$medico->getCRM()}}" required />
                                </div>
                                <div class="col-md-4">
                                    <label>@include('includes.required')Especialidade</label>
                                    <input class="form-control" name="especialidade" type="text" value="{{$medico->getEspecialidade()}}" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label>@include('includes.required')Endereço</label>
                                    <input type="text" class="form-control" name="endereco" value="{{$medico->getEndereco()}}" required>
                                </div>
                                <div class="col-md-1">
                                    <label>@include('includes.required')nº</label>
                                    <input type="text" class="form-control" name="numero" value="{{$medico->getNumero()}}" required>
                                </div>
                                <div class="col-md-2">
                                    <label>Complemento</label>
                                    <input type="text" class="form-control" name="complemento" value="{{$medico->getComplemento()}}">
                                </div>
                                <div class="col-md-2">
                                    <label>@include('includes.required')Bairro</label>
                                    <input type="text" class="form-control" name="bairro" value="{{$medico->getBairro()}}" required>
                                </div>
                                <div class="col-md-2">
                                    <label>@include('includes.required')CEP</label>
                                    <input type="text" class="form-control" name="cep" value="{{$medico->getCEP()}}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label>@include('includes.required')DDD</label>
                                    <input type="text" class="form-control" id="ddd-cidade-input" value="{{$medico->getCidade()->getDDD()}}" required readonly>
                                </div>
                                <div class="col-md-4">
                                    <label>@include('includes.required')Cidade</label>
                                    <input class="form-control" id="cidade-input" value="{{$medico->getCidade()->getCidade()}}" readonly />
                                    <input type="hidden" id="id-cidade-input" name="id_cidade" value="{{$medico->getCidade()->getId()}}" required>
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-2">
                                    <label>UF</label>
                                    <input class="form-control" id="uf-cidade-input" value="{{$medico->getCidade()->getEstado()->getUF()}}" readonly />
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#cidadeModal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>@include('includes.required')Telefone</label>
                                    <input type="text" class="form-control" name="telefone" value="{{$medico->getTelefone()}}" required>
                                </div>
                                <div class="col-md-3">
                                    <label>Celular</label>
                                    <input type="text" class="form-control" name="celular" value="{{$medico->getCelular()}}">
                                </div>
                                <div class="col-md-5">
                                    <label>@include('includes.required')Email</label>
                                    <input type="text" class="form-control" name="email" value="{{$medico->getEmail()}}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>@include('includes.required')CPF</label>
                                    <input type="text" class="form-control" name="cpf" value="{{$medico->getCPF()}}" required>
                                </div>
                                <div class="col-md-3">
                                    <label>@include('includes.required')RG</label>
                                    <input type="text" class="form-control" name="rg" value="{{$medico->getRG()}}" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="nascimento">@include('includes.required')Nascimento</label>
                                    <input type="date" class="form-control" name="nascimento" value="{{$medico->getNascimento()}}" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="nacionalidade">@include('includes.required')Nacionalidade</label>
                                    <input type="text" class="form-control" name="nacionalidade" value="{{$medico->getNacionalidade()}}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="observacao">Observação</label>
                                    <input type="text" class="form-control" name="observacao" value="{{$medico->getObservacao()}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Data de Criação</label>
                                    <input type="datetime-local" class="form-control" value="{{$medico->getCreated_at()}}" readonly>
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-2">
                                    <label>Data de Alteração</label>
                                    <input type="datetime-local" class="form-control" value="{{$medico->getUpdated_at()}}" readonly>
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{ route('medico.index') }}" class="btn btn-secondary">{{ __('Voltar') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('includes.scripts.cidades')
@endsection