@extends('layouts.app', ['activePage' => 'fornecedor-management', 'titlePage' => __('Fornecedor Management')])
@section('content')
@include('layouts.modais.chamada-modal.cidade')
@include('layouts.modais.chamada-modal.estado')
@include('layouts.modais.chamada-modal.pais')
@include('layouts.modais.chamada-modal.condicaoPagamento')
@include('layouts.modais.chamada-modal.formaPagamento')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('fornecedor.update', $fornecedor->getId()) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Alterar Fornecedor') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Código @include('includes.tooltips-campo-consulta')</label>
                                    <input type="text" class="form-control" value="{{$fornecedor->getId()}}" name="id" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Fornecedor</label>
                                    <input type="text" class="form-control" value="{{$fornecedor->getFornecedor()}}" name="fornecedor">
                                </div>
                                <div class="col-md-4 campoPessoaJuridica">
                                    <label class="col-form-label">@include('includes.required')Nome Fantasia</label>
                                    <input type="text" class="form-control inputPessoaJuridica" value="{{$fornecedor->getNomeFantasia()}}" name="nome_fantasia" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-form-label">@include('includes.required')Endereço</label>
                                    <input type="text" class="form-control" value="{{$fornecedor->getEndereco()}}" name="endereco" required>
                                </div>
                                <div class="col-md-1">
                                    <label class="col-form-label">@include('includes.required')nº</label>
                                    <input type="text" class="form-control" value="{{$fornecedor->getNumero()}}" name="numero" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Complemento</label>
                                    <input type="text" class="form-control" value="{{$fornecedor->getComplemento()}}" name="complemento">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')Bairro</label>
                                    <input type="text" class="form-control" value="{{$fornecedor->getBairro()}}" name="bairro" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')CEP</label>
                                    <input type="text" class="form-control" value="{{$fornecedor->getCEP()}}" name="cep" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label class="col-form-label">@include('includes.required')DDD</label>
                                    <input type="text" class="form-control readonly" id="ddd-cidade-input-fornecedor" value="{{$fornecedor->getCidade()->getDDD()}}" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Cidade @include('includes.tooltips-campo-consulta')</label>
                                    <input class="form-control" id="cidade-input-fornecedor" value="{{$fornecedor->getCidade()->getCidade()}}" readonly required>
                                    <input type="hidden" id="id-cidade-input-fornecedor" name="id_cidade" value="{{$fornecedor->getCidade()->getId()}}">
                                </div>
                                <div class="col-md-1">
                                    <label class="col-form-label">UF @include('includes.tooltips-campo-consulta')</label>
                                    <input class="form-control" id="uf-cidade-input-fornecedor" value="{{$fornecedor->getCidade()->getEstado()->getUF()}}" readonly required>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#cidadeModal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')Telefone</label>
                                    <input type="text" class="form-control" value="{{$fornecedor->getTelefone()}}" name="telefone" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Celular</label>
                                    <input type="text" class="form-control" value="{{$fornecedor->getCelular()}}" name="celular">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')Email</label>
                                    <input type="text" class="form-control" value="{{$fornecedor->getEmail()}}" name="email" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')Contato</label>
                                    <input type="text" class="form-control" value="{{$fornecedor->getContato()}}" name="contato" required>
                                </div>
                            </div>
                            <div class="row campoPessoaJuridica">
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Inscricão Estadual</label>
                                    <input type="text" class="form-control inputPessoaJuridica" value="{{$fornecedor->getInscricaoEstadual()}}" name="inscricao_estadual" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')CNPJ</label>
                                    <input type="text" class="form-control inputPessoaJuridica" value="{{$fornecedor->getCNPJ()}}" name="cnpj" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label class="col-form-label">Código</label>
                                    <input class="form-control readonly">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')Condição de Pagamento</label>
                                    <input class="form-control" id='condicao_pagamento-input' value=1 name="condicao_pagamento" readonly>
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#condicaoPagamamento" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')Limite de Crédito</label>
                                    <input class="form-control" type="number" value="{{$fornecedor->getLimiteCredito()}}" name="limite_credito" required>
                                </div>
                                <div class="col-md-10">
                                    <label class="col-form-label">Observação</label>
                                    <input type="text" class="form-control" value="{{$fornecedor->getObservacao()}}" name="observacao">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Data de Criação</label>
                                    <input type="datetime" class="form-control" value="{{$fornecedor->getCreated_at()}}" name="created_at" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Data de Alteração</label>
                                    <input type="datetime" class="form-control" value="{{$fornecedor->getUpdated_at()}}" name="updated_at" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                            <a href="{{route('fornecedor.index')}}" class="btn btn-secondary">{{ __('Voltar') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('includes.scripts.cidades')
@include('includes.scripts.condicoesPagamento')
@include('includes.scripts.parcelas')
@endsection
