@extends('layouts.app', ['activePage' => 'cliente-management', 'titlePage' => __('Cliente Management')])
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
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('cliente.update', $cliente->getId()) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Alterar Cliente') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Código</label>
                                    <input type="text" class="form-control" name="id" value="{{$cliente->getId()}}" readonly>
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                
                                <div class="col-md-2">
                                    <label class="col-form-label">Tipo</label>
                                    <input class="form-control" placeholder="{{ ($cliente->getTipo() == "pessoaFisica") ? "Pessoa Fisica" : "Pessoa Jurídica" }}" readonly>
                                    <input type="hidden" class="tipo" name="tipo" value="{{$cliente->getTipo()}}">
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Cliente</label>
                                    <input type="text" class="form-control" value="{{old('cliente', $cliente->getCliente())}}" name="cliente" required>
                                </div>
                                <div class="col-md-4 campoPessoaFisica">
                                    <label class="col-form-label">@include('includes.required')Apelido</label>
                                    <input type="text" class="form-control inputPessoaFisica" value="{{old('apelido', $cliente->getApelido())}}" name="apelido" required>
                                </div>
                                <div class="col-md-4 campoPessoaJuridica">
                                    <label class="col-form-label">@include('includes.required')Nome Fantasia</label>
                                    <input type="text" class="form-control inputPessoaJuridica" value="{{old('nomeFantasia', $cliente->getNomeFantasia())}}" name="nomeFantasia" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-form-label">@include('includes.required')Endereço</label>
                                    <input type="text" class="form-control" value="{{$cliente->getEndereco()}}" value="{{old('endereco', $cliente->getEndereco())}}" name="endereco" required>
                                </div>
                                <div class="col-md-1">
                                    <label class="col-form-label">@include('includes.required')nº</label>
                                    <input type="text" class="form-control" value="{{$cliente->getNumero()}}" value="{{old('numero', $cliente->getNumero())}}" name="numero" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Complemento</label>
                                    <input type="text" class="form-control" value="{{$cliente->getComplemento()}}" value="{{old('complemento', $cliente->getComplemento())}}" name="complemento">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')Bairro</label>
                                    <input type="text" class="form-control" value="{{$cliente->getBairro()}}" value="{{old('bairro', $cliente->getBairro())}}" name="bairro" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')CEP</label>
                                    <input type="text" class="form-control" value="{{$cliente->getCEP()}}" value="{{old('cep', $cliente->getCEP())}}" name="cep" required>
                                </div>
                            </div>
                            {{-- INICIO ESCOLHER CIDADE --}}
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')DDD</label>
                                    <input type="text" class="form-control" id="ddd-cidade-input" value="{{old('ddd_cidade', $cliente->getCidade()->getDDD())}}" readonly required>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Cidade</label>
                                    <input class="form-control readonly" id="cidade-input" value="{{old('cidade', $cliente->getCidade()->getCidade())}}" required>
                                    <input type="hidden" id="id-cidade-input" name="id_cidade" value="{{old('id_cidade', $cliente->getCidade()->getId())}}">
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">UF</label>
                                    <input class="form-control" id="uf-cidade-input" value="{{old('estado', $cliente->getCidade()->getEstado()->getUF())}}" readonly>
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#cidadeModal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            {{-- FIM ESCOLHER CIDADE --}}
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')Telefone</label>
                                    <input type="text" class="form-control" value="{{old('telefone', $cliente->getTelefone())}}" name="telefone" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Celular</label>
                                    <input type="text" class="form-control" value="{{old('celular', $cliente->getCelular())}}" name="celular">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')Email</label>
                                    <input type="text" class="form-control" value="{{old('email', $cliente->getEmail())}}" name="email" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Nacionalidade</label>
                                    <input type="text" class="form-control" value="{{old('nacionalidade', $cliente->getNacionalidade())}}" name="nacionalidade">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')Nascimento</label>
                                    <input type="date" class="form-control" value="{{old('nascimento', $cliente->getNascimento())}}" name="nascimento" required>
                                </div>
                            </div>
                            <div class="row campoPessoaFisica">
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')CPF</label>
                                    <input type="text" class="form-control inputPessoaFisica" value="{{old('cpf', $cliente->getCPF())}}" name="cpf" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')RG</label>
                                    <input type="text" class="form-control inputPessoaFisica" value="{{old('rg', $cliente->getRG())}}" name="rg" required>
                                </div>
                            </div>
                            <div class="row campoPessoaJuridica">
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')Inscricão Estadual</label>
                                    <input type="text" class="form-control inputPessoaJuridica" value="{{old('inscricaoEstadual', $cliente->getInscricaoEstadual())}}" name="inscricaoEstadual" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')CNPJ</label>
                                    <input type="text" class="form-control inputPessoaJuridica" value="{{old('cnpj', $cliente->getCNPJ())}}" name="cnpj" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')Limite de Crédito</label>
                                    <input class="form-control" type="number" name="limiteCredito" step="0.01"value="{{old('limiteCredito', $cliente->getLimiteCredito())}}" required>
                                </div>
                                {{-- INICIO CONDICAO PAGAMENTO --}}
                                <div class="col-md-1">
                                    <label class="col-form-label">Código</label>
                                    <input class="form-control" id='id-condicao_pagamento-input' name="id_condicao_pagamento" value="{{ old('id_condicao_pagamento', $cliente->getCondicaoPagamento()->getId()) }}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')Condição de Pagamento</label>
                                    <input class="form-control" id='condicao_pagamento-input' value="{{ old('condicao_pagamento_input', $cliente->getCondicaoPagamento()->getCondicaoPagamento()) }}" readonly>
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#condicaoPagamentoModal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                                {{-- INICIO CONDICAO PAGAMENTO --}}
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="col-form-label">Observação</label>
                                    <input type="text" class="form-control" value="{{old('observacao', $cliente->getObservacao())}}" name="observacao">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Data de Criação</label>
                                    <input type="datetime-local" name="created_at" class="form-control" value="{{$cliente->getCreated_at()}}" readonly>
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Data de Alteração</label>
                                    <input type="datetime-local" class="form-control" value="{{$cliente->getUpdated_at()}}" readonly>
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{route('cliente.index')}}" class="btn btn-secondary">{{ __('Voltar') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('includes.scripts.fisicaJuridica')
@include('includes.scripts.cidades')
@include('includes.scripts.condicoesPagamento')
@endsection
