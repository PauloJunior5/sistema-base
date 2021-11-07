@extends('layouts.app', ['activePage' => 'contrato-management', 'titlePage' => __('Contrato Management')])
@section('content')
@include('layouts.modais.chamada-modal.clienteFisico')
@include('layouts.modais.chamada-modal.clienteJuridico')

{{-- inicio - includes para clientes --}}
@include('layouts.modais.chamada-modal.cidade')
@include('layouts.modais.chamada-modal.estado')
@include('layouts.modais.chamada-modal.pais')
@include('layouts.modais.chamada-modal.condicaoPagamento')
@include('layouts.modais.chamada-modal.formaPagamento')
{{-- fim - includes para clientes --}}

@include('layouts.modais.chamada-modal.paciente')

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
                <form method="post" action="{{ route('contrato.store') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Novo Contrato</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Código @include('includes.tooltips-campo-consulta')</label>
                                    <div class="form-group">
                                        <input class="form-control" readonly placeholder="#"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-form-label">Contrato</label>
                                    <div class="form-group">
                                        <input class="form-control" name="contrato" id="input-contrato" type="text" value="{{ old('contrato') }}" required />
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
                                <div class="col-sm-2">
                                    <label class="col-form-label">Código</label>
                                    <div class="form-group">
                                        <input class="form-control" id='id-condicao_pagamento-input' name="id_condicao_pagamento" value="{{ old('id_condicaoPagamento') }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-form-label">@include('includes.required')Condição de Pagamento @include('includes.tooltips-campo-consulta')</label>
                                    <div class="form-group">
                                        <input class="form-control" id='condicao_pagamento-input' value="{{ old('condicao_pagamento') }}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" style="margin-top: 2.7rem;" data-target="#condicaoPagamentoModal">
                                            <i class="material-icons" style="margin: auto">search</i>
                                        </button>
                                    </div>
                                </div>
                                {{-- FIM CONDICAO PAGAMENTO --}}
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Id do responsável</label>
                                    <div class="form-group">
                                        <input class="form-control" id="input-id-responsavel"  name="id_responsavel" type="text" oninput="myFunctionResponsavel(this.value)" value="{{ old('id_responsavel') }}" required/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-form-label">Responsável @include('includes.tooltips-campo-consulta')</label>
                                    <div class="form-group">
                                        <input class="form-control" id="input-responsavel" readonly />
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#clienteFisicoModal" style="margin-top: 2.7rem;"><i class="material-icons">search</i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Id do cliente</label>
                                    <div class="form-group">
                                        <input class="form-control" id="input-id-cliente"  name="id_cliente" type="text" oninput="myFunctionCliente(this.value)" value="{{ old('id_cliente') }}" required/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-form-label">Cliente @include('includes.tooltips-campo-consulta')</label>
                                    <div class="form-group">
                                        <input class="form-control" id="input-cliente" readonly />
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#clienteJuridicoModal" style="margin-top: 2.7rem;"><i class="material-icons">search</i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div style="text-align: center"><h3>PACIENTES</h3></div>
                                <hr>
                                <div class="card-body">
                                    <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
                                        <form id="frmCadastroPaciente" class="form-horizontal">
                                            <div class="col-sm-2">
                                                <label class="col-form-label">Id do paciente</label>
                                                <div class="form-group">
                                                    <input class="form-control" id="input-id-paciente"  name="" type="text" oninput="myFunction(this.value)"/>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <label class="col-form-label">Paciente</label>
                                                <div class="form-group">
                                                    <input class="form-control" id="input-paciente" placeholder="Pesquisa de paciente" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#pacienteModal"><i class="material-icons">search</i></button>
                                            </div>
                                            <div class="col-md-1">
                                                <button class="btn btn-primary" type="button" value="Salvar-paciente" id="btnSalvarPaciente"><i class="material-icons">add</i></button>
                                            </div>
                                            <input type="hidden" id="pacientes" name="pacientes" value="{{ old('pacientes') }}">
                                        </form>
                                        <table class="table table-hover table-sm" id="contrato-pacientes-table"></table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-form-label">Data de Criação</label>
                                    <div class="form-group">
                                        <input type="datetime" class="form-control" name="created_at" readonly>
                                        <p class="read-only">Campo apenas para consulta.</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">Data de Alteração</label>
                                    <div class="form-group">
                                        <input type="datetime" class="form-control" name="updated_at" readonly>
                                        <p class="read-only">Campo apenas para consulta.</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">Data de Vigência</label>
                                    <div class="form-group">
                                        <input type="datetime" class="form-control" name="vigencia" readonly>
                                        <p class="read-only">Campo apenas para consulta.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{ route('contrato.index') }}" class="btn btn-secondary">{{ __('Voltar') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('includes.scripts.contratos')
@include('includes.scripts.cidades')
@include('includes.scripts.condicoesPagamento')
@include('includes.scripts.parcelasCreate')
@include('includes.scripts.pacientesCreate')
@endsection