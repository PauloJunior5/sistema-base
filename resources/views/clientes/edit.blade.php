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
                                    <input type="text" class="form-control" value="{{$cliente->getId()}}" readonly>
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Tipo</label>
                                    <input class="form-control" placeholder="{{ ($cliente->getTipo() == "pessoaFisica") ? "Pessoa Fisica" : "Pessoa Jurídica" }}" readonly>
                                    <input type="hidden" id="tipo" name="tipo" value="{{$cliente->getTipo()}}">
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
                                    <input type="text" class="form-control inputPessoaJuridica" value="{{old('nome_fantasia', $cliente->getNomeFantasia())}}" name="nome_fantasia" required>
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
                                    <input type="text" class="form-control" id="ddd-cidade-input-cliente" name="ddd_cidade" value="{{old('ddd_cidade', $cliente->getCidade()->getDDD())}}" readonly required>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Cidade</label>
                                    <input class="form-control readonly" id="cidade-input-cliente" value="{{old('cidade', $cliente->getCidade()->getCidade())}}" name="cidade" required>
                                    <input type="hidden" id="id-cidade-input-cliente" name="id_cidade" value="{{old('id_cidade', $cliente->getCidade()->getId())}}">
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">UF</label>
                                    <input class="form-control" id="uf-cidade-input-cliente" name="estado" value="{{old('estado', $cliente->getCidade()->getEstado()->getUF())}}" readonly>
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
                                    <input type="text" class="form-control inputPessoaJuridica" value="{{old('inscricao_estadual', $cliente->getInscricaoEstadual())}}" name="inscricao_estadual" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')CNPJ</label>
                                    <input type="text" class="form-control inputPessoaJuridica" value="{{old('cnpj', $cliente->getCNPJ())}}" name="cnpj" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')Limite de Crédito</label>
                                    <input class="form-control" type="number" value="{{old('limite_credito', $cliente->getLimiteCredito())}}" name="limite_credito" required>
                                </div>
                                {{-- INICIO CONDICAO PAGAMENTO --}}
                                <div class="col-md-1">
                                    <label class="col-form-label">Código</label>
                                    <input class="form-control" id='id-condicao_pagamento-input' name="id_condicao_pagamento" value="{{ old('id_condicao_pagamento', $cliente->getCondicaoPagamento()->getId()) }}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')Condição de Pagamento</label>
                                    <input class="form-control" id='condicao_pagamento-input' name="condicao_pagamento" value="{{ old('condicao_pagamento_input', $cliente->getCondicaoPagamento()->getCondicaoPagamento()) }}" readonly>
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#condicaoPagamamento" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
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
                                    <input type="datetime-local" class="form-control" value="{{$cliente->getCreated_at()}}" readonly>
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
                $('#ddd-cidade-input-cliente').val(response.cidade.ddd);
                $('#cidade-input-cliente').val(response.cidade.cidade);
                $('#uf-cidade-input-cliente').val(response.estado.uf);
                $('#id-cidade-input-cliente').val(response.cidade.id);
                $('#cidadeModal').modal('hide')
            }
        });
    });

    $('.idEstado').click(function() {
        var id_estado = $(this).val();
        $.ajax({
            method: "POST"
            , url: url_atual + '/estado/show'
            , data: {
                id_estado: id_estado
            }
            , dataType: "JSON"
            , success: function(response) {
                $('#uf-estado-input').val(response.estado.uf);
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
            , url: url_atual + '/pais/show'
            , data: {
                id_pais: id_pais
            }
            , dataType: "JSON"
            , success: function(response) {
                $('#input-sigla-pais').val(response.sigla);
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

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 3)
    <script>
        $(function() {
            $('#condicao_pagamentoModal').modal('show');
        });
    </script>
@endif

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 9)
    <script>
        $(function() {
            $('#condicao_pagamentoModal').modal('show');
        });
        $(function() {
            $('#condicao_pagamentoCreateModal').modal('show');
        });
        $(function() {
            $('#forma_pagamentoModal').modal('show');
        });
    </script>
@endif

<script>
    $(".readonly").on('keydown paste', function(e){
        e.preventDefault();
    });
</script>


<script>

var url_atual = '<?php echo URL::to(''); ?>';
    $('.idCondição_pagamento-cliente').click(function() {
        var id_condicao_pagamento = $(this).val();
        $.ajax({
            method: "GET",
            url: url_atual + '/condicaoPagamento/show',
            data: { id_condicao_pagamento : id_condicao_pagamento },
            dataType: "JSON",
            success: function(response){
                console.log(response);
                $('#id-condicao_pagamento-input').val(response.id);
                $('#condicao_pagamento-input').val(response.condicao_pagamento);
                $('#condicao_pagamentoModal').modal('hide')
            }
        });
    });

    var url_atual = '<?php echo URL::to(''); ?>';
    $('.idForma_pagamento').click(function() {
        var id_forma_pagamento = $(this).val();
        $.ajax({
            method: "POST",
            url: url_atual + '/formaPagamento/show',
            data: { id_forma_pagamento : id_forma_pagamento },
            dataType: "JSON",
            success: function(response){
                $('#id-forma_pagamento-input').val(response.id);
                $('#forma_pagamento-input').val(response.forma_pagamento);
                $('#forma_pagamentoModal').modal('hide')
            }
        });
    });

</script>
@include('includes.scripts.cliente-condicao-pagamento')
@endsection
