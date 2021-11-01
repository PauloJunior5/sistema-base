@extends('layouts.app', ['activePage' => 'plano-management', 'titlePage' => __('Plano Management')])
@section('content')
@include('layouts.modais.chamada-modal.condicaoPagamento')
@include('layouts.modais.chamada-modal.formaPagamento')

<style>
.swal2-container {
    z-index: 99999;
}
</style>

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
                <form method="post" action="{{ route('plano.store') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Novo Plano') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Código @include('includes.tooltips-campo-consulta')</label>
                                    <div class="form-group">
                                        <input class="form-control" readonly/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">Plano</label>
                                    <div class="form-group">
                                        <input class="form-control" name="plano" type="text" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                 {{-- INICIO CONDICAO PAGAMENTO --}}
                                 <div class="col-sm-1">
                                    <label class="col-form-label">Código</label>
                                    <input class="form-control" id='id-condicao_pagamento-input' name="id_condicao_pagamento" value="{{ old('id_condicaoPagamento') }}" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <label class="col-form-label">@include('includes.required')Condição de Pagamento  @include('includes.tooltips-campo-consulta')</label>
                                    <input class="form-control" id='condicao_pagamento-input' value="{{ old('condicao_pagamento') }}" readonly>
                                </div>
                                <div class="col-sm-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" style="margin-top: 2.2rem;" data-target="#condicaoPagamentoModal">
                                        <i class="material-icons" style="margin: auto">search</i>
                                    </button>
                                </div>
                                {{-- FIM CONDICAO PAGAMENTO --}}
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Data de Criação @include('includes.tooltips-campo-consulta')</label>
                                    <div class="form-group">
                                        <input type="datetime" name="created_at" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Data de Alteração @include('includes.tooltips-campo-consulta')</label>
                                    <div class="form-group">
                                        <input type="datetime" name="updated_at" class="form-control" readonly>
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
@include('includes.scripts.parcelasCreate')

@endsection