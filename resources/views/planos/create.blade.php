@extends('layouts.app', ['activePage' => 'plano-management', 'titlePage' => __('Plano Management')])
@section('content')
@include('layouts.modais.chamada-modal.condicaoPagamento')
@include('layouts.modais.chamada-modal.formaPagamento')

@include('layouts.modais.chamada-modal.exame')
@include('layouts.modais.chamada-modal.categoria')

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
                                <div class="col-sm-6">
                                    <label class="col-form-label">Plano</label>
                                    <div class="form-group">
                                        <input class="form-control" name="plano" type="text" required/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Valor (R$)</label>
                                    <div class="form-group">
                                        <input class="form-control" name="valor" id="input-valor" type="number" required />
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

                            <div class="card">
                                <div style="text-align: center"><h3>Exames</h3></div>
                                <hr>
                                <div class="card-body">
                                    <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
                                        <form id="frmCadastroExame" class="form-horizontal">
                                            <div class="col-sm-2">
                                                <label class="col-form-label">Id do exame</label>
                                                <div class="form-group">
                                                    <input class="form-control" id="input-id-exame" type="text" oninput="myFunction(this.value)"/>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <label class="col-form-label">Exame</label>
                                                <div class="form-group">
                                                    <input class="form-control" id="exame-input" placeholder="Pesquisa de exame" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exameModal"><i class="material-icons">search</i></button>
                                            </div>
                                            <div class="col-md-1">
                                                <button class="btn btn-primary" type="button" value="Salvar-exame" id="btnSalvarExame"><i class="material-icons">add</i></button>
                                            </div>
                                            <input type="hidden" id="exames" name="exames" value="{{ old('exames') }}">
                                        </form>
                                        <table class="table table-hover table-sm" id="planos-exames-table"></table>
                                    </div>
                                </div>
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
@include('includes.scripts.planos')
@include('includes.scripts.exameCreate')
@endsection