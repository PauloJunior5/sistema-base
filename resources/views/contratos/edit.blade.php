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
                <form method="post" action="{{ route('contrato.update', $contrato->getId()) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Editar Contrato</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Código</label>
                                    <div class="form-group">
                                        <input class="form-control" readonly placeholder="#" name="id" value="{{$contrato->getId()}}"/>
                                        <p class="read-only">Campo apenas para consulta.</p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-form-label">Contrato</label>
                                    <div class="form-group">
                                        <input class="form-control" name="contrato" id="input-contrato" type="text" value="{{$contrato->getContrato()}}" required />
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Valor (R$)</label>
                                    <div class="form-group">
                                        <input class="form-control" name="valor" id="input-valor" type="number" value="{{$contrato->getValor()}}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label class="col-form-label">Id do responsável</label>
                                    <div class="form-group">
                                        <input class="form-control" id="input-id-responsavel"  name="id_responsavel" value="{{$contrato->getResponsavel()->getId()}}" type="text" oninput="myFunctionResponsavel(this.value)" required/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-form-label">Responsável</label>
                                    <div class="form-group">
                                        <input class="form-control" id="input-responsavel" value="{{$contrato->getResponsavel()->getCliente()}}" readonly />
                                        <p class="read-only">Campo apenas para consulta.</p>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#clienteFisicoModal" style="margin-top: 2.7rem;"><i class="material-icons">search</i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label class="col-form-label">Id do cliente</label>
                                    <div class="form-group">
                                        <input class="form-control" id="input-id-cliente"  name="id_cliente" value="{{$contrato->getCliente()->getId()}}" type="text" oninput="myFunctionCliente(this.value)" required/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-form-label">Cliente</label>
                                    <div class="form-group">
                                        <input class="form-control" id="input-cliente" value="{{$contrato->getCliente()->getCliente()}}" readonly />
                                        <p class="read-only">Campo apenas para consulta.</p>
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
                                            <input type="hidden" id="pacientes" name="pacientes" value="{{ $pacientesContrato }}">
                                            <input type="hidden" id="input-pacientes-exluidos" name="pacientesExluidos" value="">
                                        </form>
                                        <table class="table table-hover table-sm" id="contrato-pacientes-table"></table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-form-label">Data de Criação</label>
                                    <div class="form-group">
                                        <input type="datetime" class="form-control" name="created_at" value="{{$contrato->getCreated_at()}}" readonly>
                                        <p class="read-only">Campo apenas para consulta.</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">Data de Alteração</label>
                                    <div class="form-group">
                                        <input type="datetime" class="form-control" name="updated_at" value="{{$contrato->getUpdated_at()}}" readonly>
                                        <p class="read-only">Campo apenas para consulta.</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">Data de Vigência</label>
                                    <div class="form-group">
                                        <input type="datetime" class="form-control" name="vigencia" value="{{ $contrato->getVigencia() }}" readonly>
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
@include('includes.scripts.pacientesUpdate')
@endsection