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
                <form method="post" action="{{route('cliente.store')}}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Novo Cliente') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Código</label>
                                    <input type="text" class="form-control" readonly>
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')Tipo</label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input tipo" type="radio" name="tipo" value="pessoaFisica" {{ old('tipo') == 'pessoaFisica' ? 'checked' : '' }} id="pessoa-fisica" checked required> Física
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                        <label class="form-check-label">
                                            <input class="form-check-input tipo" type="radio" name="tipo" value="pessoaJuridica" {{ old('tipo') == 'pessoaJuridica' ? 'checked' : '' }} id="pessoa-juridica" required> Jurídica
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Cliente</label>
                                    <input type="text" class="form-control" name="cliente" value="{{ old('cliente') }}" required>
                                </div>
                                <div class="col-md-4 campoPessoaFisica">
                                    <label class="col-form-label">@include('includes.required')Apelido</label>
                                    <input type="text" class="form-control inputPessoaFisica" name="apelido" value="{{ old('apelido') }}" required>
                                </div>
                                <div class="col-md-4 campoPessoaJuridica">
                                    <label class="col-form-label">@include('includes.required')Nome Fantasia</label>
                                    <input type="text" class="form-control inputPessoaJuridica" name="nomeFantasia" value="{{ old('nomeFantasia') }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-form-label">@include('includes.required')Endereço</label>
                                    <input type="text" class="form-control" name="endereco" value="{{ old('endereco') }}" required>
                                </div>
                                <div class="col-md-1">
                                    <label class="col-form-label">@include('includes.required')nº</label>
                                    <input type="text" class="form-control" name="numero" value="{{ old('numero') }}" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Complemento</label>
                                    <input type="text" class="form-control" name="complemento" value="{{ old('complemento') }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')Bairro</label>
                                    <input type="text" class="form-control" name="bairro" value="{{ old('bairro') }}" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')CEP</label>
                                    <input type="text" class="form-control" name="cep" value="{{ old('cep') }}" required>
                                </div>
                            </div>
                            {{-- INICIO ESCOLHER CIDADE --}}
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')DDD</label>
                                    <input type="text" class="form-control" id="ddd-cidade-input" name="ddd_cidade" value="{{ old('ddd_cidade') }}" required readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Cidade</label>
                                    <input class="form-control readonly" id="cidade-input" name="cidade" value="{{ old('cidade') }}" required>
                                    <input type="hidden" id="id-cidade-input" name="id_cidade" value="{{ old('id_cidade') }}">
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">UF</label>
                                    <input class="form-control" id="uf-cidade-input" name="estado" value="{{ old('estado') }}" readonly>
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
                                    <input type="text" class="form-control" name="telefone" value="{{ old('telefone') }}" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Celular</label>
                                    <input type="text" class="form-control" name="celular" value="{{ old('celular') }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Nacionalidade</label>
                                    <input type="text" class="form-control" name="nacionalidade" value="{{ old('nacionalidade') }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')Nascimento</label>
                                    <input type="date" class="form-control" name="nascimento" value="{{ old('nascimento') }}" required>
                                </div>
                            </div>
                            <div class="row campoPessoaFisica">
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')CPF</label>
                                    <input type="text" class="form-control inputPessoaFisica" name="cpf" value="{{ old('cpf') }}" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')RG</label>
                                    <input type="text" class="form-control inputPessoaFisica" name="rg" value="{{ old('rg') }}" required>
                                </div>
                            </div>
                            <div class="row campoPessoaJuridica">
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')Inscricão Estadual</label>
                                    <input type="text" class="form-control inputPessoaJuridica" name="inscricaoEstadual" value="{{ old('inscricaoEstadual') }}" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')CNPJ</label>
                                    <input type="text" class="form-control inputPessoaJuridica" name="cnpj" value="{{ old('cnpj') }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')Limite de Crédito</label>
                                    <input class="form-control" type="number" name="limiteCredito" step="0.01" value="{{ old('limiteCredito') }}" required>
                                </div>
                                {{-- INICIO CONDICAO PAGAMENTO --}}
                                <div class="col-md-1">
                                    <label class="col-form-label">Código</label>
                                    <input class="form-control" id='id-condicao_pagamento-input' name="id_condicao_pagamento" value="{{ old('id_condicaoPagamento') }}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')Condição de Pagamento</label>
                                    <input class="form-control" id='condicao_pagamento-input' name="condicao_pagamento" value="{{ old('condicao_pagamento') }}" readonly>
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#condicaoPagamentoModal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                                {{-- FIM CONDICAO PAGAMENTO --}}
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="col-form-label">Observação</label>
                                    <input type="text" class="form-control" name="observacao" value="{{ old('observacao') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Data de Criação</label>
                                    <input type="datetime-local" class="form-control" name="created_at" readonly>
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Data de Alteração</label>
                                    <input type="datetime-local" class="form-control" name="updated_at" readonly>
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto float-right">
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
@include('includes.scripts.parcelasCreate')
@endsection
