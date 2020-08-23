@extends('layouts.app', ['activePage' => 'cliente-management', 'titlePage' => __('Cliente Management')])
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
                <form method="post" action="{{ route('cliente.update', $cliente->id) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('FICHA CADASTRAL') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-1">
                                    <label class="col-form-label">Código</label>
                                    <input type="text" class="form-control" value="{{$cliente->id}}" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Tipo</label>
                                    <input class="form-control" placeholder="{{ ($cliente->tipo == "pessoaFisica") ? "Pessoa Fisica" : "Pessoa Jurídica" }}" readonly>
                                    <input type="hidden" id="tipo" name="tipo" value="{{$cliente->tipo}}">
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label"><span style="color: red">*</span> Cliente</label>
                                    <input type="text" class="form-control" value="{{old('cliente', $cliente->cliente)}}" name="cliente" required>
                                </div>
                                <div class="col-md-4 campoPessoaFisica">
                                    <label class="col-form-label"><span style="color: red">*</span> Apelido</label>
                                    <input type="text" class="form-control inputPessoaFisica" value="{{old('apelido', $cliente->apelido)}}" name="apelido" required>
                                </div>
                                <div class="col-md-4 campoPessoaJuridica">
                                    <label class="col-form-label"><span style="color: red">*</span> Nome Fantasia</label>
                                    <input type="text" class="form-control inputPessoaJuridica" value="{{old('nome_fantasia', $cliente->nome_fantasia)}}" name="nome_fantasia" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-form-label"><span style="color: red">*</span> Endereço</label>
                                    <input type="text" class="form-control" value="{{$cliente->endereco}}" value="{{old('endereco', $cliente->endereco)}}" name="endereco" required>
                                </div>
                                <div class="col-md-1">
                                    <label class="col-form-label"><span style="color: red">*</span> nº</label>
                                    <input type="text" class="form-control" value="{{$cliente->numero}}" value="{{old('numero', $cliente->numero)}}" name="numero" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Complemento</label>
                                    <input type="text" class="form-control" value="{{$cliente->complemento}}" value="{{old('complemento', $cliente->complemento)}}" name="complemento">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label"><span style="color: red">*</span> Bairro</label>
                                    <input type="text" class="form-control" value="{{$cliente->bairro}}" value="{{old('bairro', $cliente->bairro)}}" name="bairro" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label"><span style="color: red">*</span> CEP</label>
                                    <input type="text" class="form-control" value="{{$cliente->cep}}" value="{{old('cep', $cliente->cep)}}" name="cep" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label class="col-form-label">Código</label>
                                    <input type="text" class="form-control" id="codigo-cidade-input" name="codigo_cidade" value="{{old('codigo_cidade', $cidade->codigo)}}" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label"><span style="color: red">*</span> Cidade</label>
                                    <input class="form-control readonly" id="cidade-input" value="{{old('cidade', $cidade->cidade)}}" name="cidade" required>
                                    <input type="hidden" id="id-cidade-input" name="id_cidade" value="{{old('id_cidade', $cidade->id)}}" name="id_cidaed">
                                </div>
                                <div class="col-md-1">
                                    <label class="col-form-label">UF</label>
                                    <input class="form-control" id="uf-cidade-input" name="estado" value="{{old('estado', $estado->codigo)}}" readonly>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#cidadeModal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label"><span style="color: red">*</span> Telefone</label>
                                    <input type="text" class="form-control" value="{{old('telefone', $cliente->telefone)}}" name="telefone" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Celular</label>
                                    <input type="text" class="form-control" value="{{old('celular', $cliente->celular)}}" name="celular">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label"><span style="color: red">*</span> Email</label>
                                    <input type="text" class="form-control" value="{{old('email', $cliente->email)}}" name="email" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Nacionalidade</label>
                                    <input type="text" class="form-control" value="{{old('nacionalidade', $cliente->nacionalidade)}}" name="nacionalidade">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label"><span style="color: red">*</span> Nascimento</label>
                                    <input type="date" class="form-control" value="{{old('nascimento', $cliente->nascimento)}}" name="nascimento" required>
                                </div>
                            </div>
                            <div class="row campoPessoaFisica">
                                <div class="col-md-3">
                                    <label class="col-form-label"><span style="color: red">*</span> CPF</label>
                                    <input type="text" class="form-control inputPessoaFisica" value="{{old('cpf', $cliente->cpf)}}" name="cpf" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label"><span style="color: red">*</span> RG</label>
                                    <input type="text" class="form-control inputPessoaFisica" value="{{old('rg', $cliente->rg)}}" name="rg" required>
                                </div>
                            </div>
                            <div class="row campoPessoaJuridica">
                                <div class="col-md-3">
                                    <label class="col-form-label"><span style="color: red">*</span> Inscricão Estadual</label>
                                    <input type="text" class="form-control inputPessoaJuridica" value="{{old('inscricao_estadual', $cliente->inscricao_estadual)}}" name="inscricao_estadual" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label"><span style="color: red">*</span> CNPJ</label>
                                    <input type="text" class="form-control inputPessoaJuridica" value="{{old('cnpj', $cliente->cnpj)}}" name="cnpj" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-form-label">Observação</label>
                                    <input type="text" class="form-control" value="{{old('observacao', $cliente->observacao)}}" name="observacao">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label"><span style="color: red">*</span> Limite de Crédito</label>
                                    <input class="form-control" type="number" value="{{old('limite_credito', $cliente->limite_credito)}}" name="limite_credito" required>
                                </div>
                                <div class="col-md-1">
                                    <label class="col-form-label">Código</label>
                                    <input class="form-control" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label"><span style="color: red">*</span> Condição de Pagamento</label>
                                    <input class="form-control" readonly>
                                    {{-- <input type="hidden" id="" name="id_condicao_pagamento" value=""> --}}
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#condicaoPagamamento" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Created_at</label>
                                    <input type="datetime-local" class="form-control" value="{{$cliente->created_at->format('Y-m-d H:i:s')}}" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Updated_at</label>
                                    <input type="datetime-local" class="form-control" value="{{$cliente->updated_at->format('Y-m-d H:i:s')}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{route('cliente.index')}}" class="btn btn-secondary">{{ __('Back to list') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        if ($('#tipo').val() == 'pessoaFisica') {
            $(".campoPessoaJuridica").hide();
            $('.inputPessoaJuridica').prop('required', false);
        } else {
            $(".campoPessoaFisica").hide();
            $('.inputPessoaFisica').prop('required', false);
        }
    });
</script>

<script>
    var url_atual = '<?php echo URL::to(''); ?>';
    $('.idCidade').click(function() {
        var id_cidade = $(this).val();
        $.ajax({
            method: "POST"
            , url: url_atual + '/cidade/show'
            , data: {
                id_cidade: id_cidade
            }
            , dataType: "JSON"
            , success: function(response) {
                $('#codigo-cidade-input').val(response.cidade.codigo);
                $('#cidade-input').val(response.cidade.cidade);
                $('#uf-cidade-input').val(response.estado.codigo);
                $('#id-cidade-input').val(response.cidade.id);
                $('#cidadeModal').modal('hide')
            }
        });
    });

    $('.idEstado').click(function() {
        var id_estado = $(this).val();
        $.ajax({
            method: "POST"
            , url: url_atual + '/cidade/getEstado'
            , data: {
                id_estado: id_estado
            }
            , dataType: "JSON"
            , success: function(response) {
                $('#codigo-estado-input').val(response.estado.codigo);
                $('#estado-input').val(response.estado.estado);
                $('#id-estado-input').val(response.estado.id);
                $('#pais-input').val(response.pais.pais);
                $('#estadoModal').modal('hide')
            }
        });
    });

    $('.idPais').click(function() {
        var id_pais = $(this).val();
        $.ajax({
            method: "POST"
            , url: url_atual + '/estado/getPais'
            , data: {
                id_pais: id_pais
            }
            , dataType: "JSON"
            , success: function(response) {
                $('#input-codigo-pais').val(response.codigo);
                $('#input-pais').val(response.pais);
                $('#input-id-pais').val(response.id);
                $('#paisModal').modal('hide')
            }
        });
    });

</script>

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 6)
<script>
    $(function() {
        $('#cidadeModal').modal('show');
    });

</script>
@endif

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
<script>
    $(function() {
        $('#cidadeModal').modal('show');
    });
    $(function() {
        $('#cidadeCreateModal').modal('show');
    });
    $(function() {
        $('#estadoModal').modal('show');
    });

</script>
@endif

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 4)
<script>
    $(function() {
        $('#estadoModal').modal('show');
    });
    $(function() {
        $('#estadoCreateModal').modal('show');
    });
    $(function() {
        $('#paisModal').modal('show');
    });

</script>
@endif

<script>
    $(".readonly").on('keydown paste', function(e){
        e.preventDefault();
    });
</script>

<style>
    .readonly {
        background-color: #e9ecef;
        opacity: 1;
    }

    .readonly:hover {
        background-color: #e9ecef;
        opacity: 1;
    }

    .readonly:focus {
        background-color: #e9ecef;
        opacity: 1;
    }
    
</style>

@endsection
