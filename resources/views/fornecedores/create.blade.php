@extends('layouts.app', ['activePage' => 'fornecedor-management', 'titlePage' => __('Fornecedor Management')])
@section('content')
@include('layouts.modais.chamada-modal.cidade')
@include('layouts.modais.chamada-modal.estado')
@include('layouts.modais.chamada-modal.pais')
@include('layouts.modais.all-condicao_pagamento')
@include('layouts.modais.all-forma_pagamento')
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
                <form method="post" action="{{route('fornecedor.store')}}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Novo Fornecedor') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Código @include('includes.tooltips-campo-consulta')</label>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Fornecedor</label>
                                    <input type="text" class="form-control" name="fornecedor" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Nome Fantasia</label>
                                    <input type="text" class="form-control" name="nome_fantasia" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-form-label">@include('includes.required')Endereço</label>
                                    <input type="text" class="form-control" name="endereco" required>
                                </div>
                                <div class="col-md-1">
                                    <label class="col-form-label">@include('includes.required')nº</label>
                                    <input type="text" class="form-control" name="numero" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Complemento</label>
                                    <input type="text" class="form-control" name="complemento">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')Bairro</label>
                                    <input type="text" class="form-control" name="bairro" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')CEP</label>
                                    <input type="text" class="form-control" name="cep" required>
                                </div>
                            </div>
                            {{-- INICIO ESCOLHER CIDADE --}}
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')DDD</label>
                                    <input type="text" class="form-control" id="ddd-cidade-input-fornecedor" name="ddd_cidade" value="{{ old('ddd_cidade') }}" required readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Cidade</label>
                                    <input class="form-control readonly" id="cidade-input-fornecedor" name="cidade-fornecedor" value="{{ old('cidade-fornecedor') }}" required>
                                    <input type="hidden" id="id-cidade-input-fornecedor" name="id_cidade" value="{{ old('id_cidade') }}">
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">UF</label>
                                    <input class="form-control" id="uf-cidade-input-fornecedor" name="estado" value="{{ old('estado') }}" readonly>
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
                                    <input type="text" class="form-control" name="telefone" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Celular</label>
                                    <input type="text" class="form-control" name="celular">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')Email</label>
                                    <input type="text" class="form-control" name="email" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')Contato</label>
                                    <input type="text" class="form-control" name="contato" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Inscricão Estadual</label>
                                    <input type="text" class="form-control" name="inscricao_estadual" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')CNPJ</label>
                                    <input type="text" class="form-control" name="cnpj" required>
                                </div>
                            </div>
                            {{-- INICIO CONDICAO PAGAMENTO --}}
                            <div class="col-md-1">
                                <label class="col-form-label">Código</label>
                                <input class="form-control" id='id-condicao_pagamento-input' name="id_condicao_pagamento" value="{{ old('id_condicao_pagamento') }}" readonly>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label">@include('includes.required')Condição de Pagamento</label>
                                <input class="form-control" id='condicao_pagamento-input' name="condicao_pagamento_input" value="{{ old('condicao_pagamento_input') }}" readonly>
                                <input type="hidden" id="" name="condicao_pagamento" value="{{ old('condicao_pagamento') }}">
                                <p class="read-only">Campo apenas para consulta.</p>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#condicao_pagamentoModal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                            </div>
                            {{-- FIM CONDICAO PAGAMENTO --}}
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')Limite de Crédito</label>
                                    <input class="form-control" type="number" name="limite_credito" required>
                                </div>
                                <div class="col-md-10">
                                    <label class="col-form-label">Observação</label>
                                    <input type="text" class="form-control" name="observacao">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Data de Criação @include('includes.tooltips-campo-consulta')</label>
                                    <input type="date" class="form-control" name="created_at" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Data de Alteração @include('includes.tooltips-campo-consulta')</label>
                                    <input type="date" class="form-control" name="updated_at" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto float-right">
                            <a href="{{route('fornecedor.index')}}" class="btn btn-secondary">{{ __('Voltar') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var url_atual = '<?php echo URL::to(''); ?>';
    $('.idCidade').click(function() {
        var id_cidade = $(this).val();
        $.ajax({
            method: "POST",
            url: url_atual + '/cidade/show',
            data: { id_cidade : id_cidade },
            dataType: "JSON",
            success: function(response){
                $('#ddd-cidade-input-fornecedor').val(response.cidade.ddd);
                $('#cidade-input-fornecedor').val(response.cidade.cidade);
                $('#uf-cidade-input-fornecedor').val(response.estado.uf);
                $('#id-cidade-input-fornecedor').val(response.cidade.id);
                $('#cidadeModal').modal('hide')
            }
        });
    });

    $('.idEstado').click(function() {
        var id_estado = $(this).val();
        $.ajax({
            method: "POST",
            url: url_atual + '/cidade/getEstado',
            data: { id_estado : id_estado },
            dataType: "JSON",
            success: function(response){
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
            method: "POST",
            url: url_atual + '/estado/getPais',
            data: { id_pais : id_pais },
            dataType: "JSON",
            success: function(response){
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

@endsection
