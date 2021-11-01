@extends('layouts.app', ['activePage' => 'plano-management', 'titlePage' => __('Plano Management')])
@section('content')
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
                <form method="post" action="{{ route('plano.update', $plano->getId()) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Editar Plano') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Código @include('includes.tooltips-campo-consulta')</label>
                                    <div class="form-group">
                                        <input class="form-control" name="id" value="{{ $plano->getId() }}" readonly/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">Plano</label>
                                    <div class="form-group">
                                        <input class="form-control" name="plano" value="{{ $plano->getPlano() }}" type="text" required/>
                                    </div>
                                </div>
                            </div>
                            {{-- INICIO CONDICAO PAGAMENTO --}}
                            <div class="row">
                                <div class="col-md-1">
                                    <label class="col-form-label">Código</label>
                                    <input class="form-control" id='id-condicao_pagamento-input' name="id_condicao_pagamento" value="{{ $plano->getCondicaoPagamento()->getId() }}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')Condição de Pagamento @include('includes.tooltips-campo-consulta')</label>
                                    <input class="form-control" id='condicao_pagamento-input' value="{{ $plano->getCondicaoPagamento()->getCondicaoPagamento() }}" readonly>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#condicaoPagamentoModal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            {{-- FIM CONDICAO PAGAMENTO --}}    
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Data de Criação @include('includes.tooltips-campo-consulta')</label>
                                    <div class="form-group">
                                        <input type="datetime" name="created_at" value="{{ $plano->getCreated_at() }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Data de Alteração @include('includes.tooltips-campo-consulta')</label>
                                    <div class="form-group">
                                        <input type="datetime" name="updated_at" value="{{ $plano->getUpdated_at() }}" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{ route('plano.index') }}" class="btn btn-secondary">{{ __('Voltar') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('includes.scripts.condicoesPagamento')
@endsection
