@extends('layouts.app', ['activePage' => 'condicao-pagamento-management', 'titlePage' => __('Condição de Pagamento Management')])
@section('content')
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
                <form method="post" action="{{ route('condicaoPagamento.store') }}" autocomplete="off" class="form-horizontal" id="condicaoPagamentoForm">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Nova Condição de Pagamento') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label class="col-form-label">Código de Referência</label>
                                    <div class="form-group">
                                        <input class="form-control" readonly />
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label class="col-form-label">Condição de Pagamento</label>
                                    <div class="form-group">
                                        <input class="form-control" name="condicao_pagamento" id="input-condicao-pagamento" type="text" value="{{old('condicao_pagamento')}}" required />
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <label class="col-form-label">Multa (%)</label>
                                    <div class="form-group">
                                        <input class="form-control" name="multa" id="input-multa" type="number" value="{{old('multa')}}" required />
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Juros (%)</label>
                                    <div class="form-group">
                                        <input class="form-control" name="juro" id="input-juro" type="number" value="{{old('juro')}}" required />
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Desconto (%)</label>
                                    <div class="form-group">
                                        <input class="form-control" name="desconto" id="input-desconto" type="number" value="{{old('desconto')}}" required />
                                    </div>
                                </div>
                                <input type="hidden" id="input-parcelas" name="parcelas" value="">
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Created_at</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Updated_at</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="card">
                                <div style="text-align: center"><h3>PARCELAS</h3></div>
                                <hr>
                                <div class="card-body">
                                    <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
                                        <form id="frmCadastro" class="form-horizontal">
                                            <div class="col-sm-2">
                                                <label class="col-form-label">Numero de Dias:</label>
                                                <div class="form-group">
                                                    <input type="numeric" id="id_dias" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <label class="col-form-label">Porcentual:</label>
                                                <div class="form-group">
                                                    <input type="numeric" id="id_porcentual" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <label class="col-form-label">Código</label>
                                                <div class="form-group">
                                                    <input class="form-control" id="id-forma_pagamento-input" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="col-form-label">Forma de Pagamento</label>
                                                <div class="form-group">
                                                    <input class="form-control" id="forma_pagamento-input" readonly />
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#forma_pagamentoModal"><i class="material-icons">search</i></button>
                                            </div>
                                            <div class="col-md-1">
                                                <button class="btn btn-primary" type="button" value="Salvar" id="btnSalvar"><i class="material-icons">add</i></button>
                                            </div>
                                        </form>

                                        <table class="table table-bordered table-hover" id="condicao-table"></table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{ route('condicaoPagamento.index') }}" class="btn btn-secondary">{{ __('Voltar') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 9)
    <script>
        $(function() {
            $('#forma_pagamentoModal').modal('show');
        });
    </script>
@endif

<script>

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

    $(function(){
        localStorage.clear();
        var operacao = "A"; //"A"=Adição; "E"=Edição
        var indice_selecionado = -1; //Índice do item selecionado na lista
        var tbClientes = localStorage.getItem("tbClientes");// Recupera os dados armazenados
        tbClientes = JSON.parse(tbClientes); // Converte string para objeto
        if(tbClientes == null) // Caso não haja conteúdo, iniciamos um vetor vazio
        tbClientes = [];
        var porcentual = 0;
        var porcentualReserva = 0;

    $("#btnSalvar").on("click",function(){
        if(operacao == "A")
            return Adicionar();
        else
            return Editar();
    });

    function Adicionar(){
        var cliente = JSON.stringify({
            Dias   : $("#id_dias").val(),
            Porcentual     : $("#id_porcentual").val(),
            Pagamento : $("#id-forma_pagamento-input").val(),
        });
        
        var objCliente = JSON.parse(cliente)
        var objClientePorcentual = parseFloat(objCliente.Porcentual);
        if ((porcentual + objClientePorcentual ) <= 100) {
            porcentual += objClientePorcentual;
            tbClientes.push(cliente);
            localStorage.setItem("tbClientes", JSON.stringify(tbClientes));
            $('#input-parcelas').val(JSON.stringify(tbClientes));
            alert("Registro adicionado.");
            Listar();
            return true;
        } else {
            alert("Parcela inserida ultrapassa os 100%");
            Listar();
            return true;
        }
        
    }

    $("#condicao-table").on("click", ".btnEditar", function(){

        operacao = "E";
        indice_selecionado = parseInt($(this).attr("alt"));
        var cli = JSON.parse(tbClientes[indice_selecionado]);
        $("#id_dias").val(cli.Dias);
        $("#id_porcentual").val(cli.Porcentual);
        $("#id-forma_pagamento-input").val(cli.Pagamento);
        porcentualReserva = porcentual;
        porcentual -= cli.Porcentual;

        var id_forma_pagamento = cli.Pagamento;
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

        $("#id_dias").focus();
    });

    function Editar(){
        tbClientes[indice_selecionado] = JSON.stringify({
                Dias   : $("#id_dias").val(),
                Porcentual     : $("#id_porcentual").val(),
                Pagamento : $("#id-forma_pagamento-input").val(),
            });//Altera o item selecionado na tabela

        var objCliente = JSON.parse(tbClientes[indice_selecionado])
        var objClientePorcentual = parseFloat(objCliente.Porcentual);
        if ((porcentual + objClientePorcentual ) <= 100) {
            porcentual += parseFloat(tbClientes[indice_selecionado].Porcentual);
            localStorage.setItem("tbClientes", JSON.stringify(tbClientes));
            $('#input-parcelas').val(JSON.stringify(tbClientes));
            alert("Informações editadas.")
            operacao = "A"; //Volta ao padrão
            Listar();
            return true;
        } else {
            porcentual = porcentualReserva;
            porcentualReserva = 0;
            alert("Parcela inserida ultrapassa os 100%");
            Listar();
            return true;
        }
    }

    $("#condicao-table").on("click", ".btnExcluir",function(){
        indice_selecionado = parseInt($(this).attr("alt"));
        var cli = JSON.parse(tbClientes[indice_selecionado]);
        $("#id_dias").val(cli.Dias);
        $("#id_porcentual").val(cli.Porcentual);
        $("#id-forma_pagamento-input").val(cli.Pagamento);
        porcentual -= cli.Porcentual;
        Excluir();
        Listar();
    });

    function Excluir(){
        tbClientes.splice(indice_selecionado, 1);
        localStorage.setItem("tbClientes", JSON.stringify(tbClientes));
        $('#input-parcelas').val(JSON.stringify(tbClientes));
        alert("Registro excluído.");
    }

    function Listar(){

        var forma_pagamento;
        var n = 0;

        $("#condicao-table").html("");
        $("#condicao-table").html(
            "<thead>"+
            "    <tr>"+
            "    <th scope='col'>Parcela</th>"+
            "    <th scope='col'>Número de Dias</th>"+
            "    <th scope='col'>Percentual (%)</th>"+
            "    <th scope='col'>Forma de Pagamento</th>"+
            "    <th scope='col'>Ações</th>"+
            "   </tr>"+
            "</thead>"+
            "<tbody>"+
            "</tbody>"
        );

        for(var i in tbClientes){

            var cli = JSON.parse(tbClientes[i]);
            n++;

            var id_forma_pagamento = cli.Pagamento;
            $.ajax({
                method: "POST",
                url: url_atual + '/formaPagamento/show',
                data: { id_forma_pagamento : id_forma_pagamento },
                dataType: "JSON",
                async: false,
                success: function(response){
                    forma_pagamento = response;
                }
            });

            $("#condicao-table tbody").append("<tr>");
            $("#condicao-table tbody").append("<td>"+n+"</td>");
            $("#condicao-table tbody").append("<td>"+cli.Dias+"</td>");
            $("#condicao-table tbody").append("<td>"+cli.Porcentual+"</td>");
            $("#condicao-table tbody").append("<td>"+forma_pagamento.forma_pagamento+"</td>");
            $("#condicao-table tbody").append("<td><a class='btn btn-sm btn-warning btnEditar' alt='"+i+"'>Editar</a><a class='btn btn-sm btn-danger btnExcluir' alt='"+i+"'>Excluir</a></td>");
            $("#condicao-table tbody").append("</tr>");
            
        }

        // alert(porcentual);

    }

    $(function() {

        var forma_pagamento;
        var n = 0;

        $("#condicao-table").html("");
        $("#condicao-table").html(
            "<thead>"+
            "   <tr>"+
            "    <th scope='col'>Parcela</th>"+
            "    <th scope='col'>Número de Dias</th>"+
            "    <th scope='col'>Percentual (%)</th>"+
            "    <th scope='col'>Forma de Pagamento</th>"+
            "    <th scope='col'>Ações</th>"+
            "   </tr>"+
            "</thead>"+
            "<tbody>"+
            "</tbody>"
        );

        for(var i in tbClientes){

            var cli = JSON.parse(tbClientes[i]);
            n++;

            var id_forma_pagamento = cli.Pagamento;
            $.ajax({
                method: "POST",
                url: url_atual + '/formaPagamento/show',
                data: { id_forma_pagamento : id_forma_pagamento },
                dataType: "JSON",
                async: false,
                success: function(response){
                    forma_pagamento = response;
                }
            });

            $("#condicao-table tbody").append("<tr>");
            $("#condicao-table tbody").append("<td>"+n+"</td>");
            $("#condicao-table tbody").append("<td>"+cli.Dias+"</td>");
            $("#condicao-table tbody").append("<td>"+cli.Porcentual+"</td>");
            $("#condicao-table tbody").append("<td>"+forma_pagamento.forma_pagamento+"</td>");
            $("#condicao-table tbody").append("<td><a class='btn btn-sm btn-warning btnEditar' alt='"+i+"'>Editar</a><a class='btn btn-sm btn-danger btnExcluir' alt='"+i+"'>Excluir</a></td>");
            $("#condicao-table tbody").append("</tr>");

        }

        // alert(porcentual);

        
    });

    $("#condicaoPagamentoForm").submit(function() {
        if(parseFloat(porcentual) < 100){
            alert("Parcelas não atingem os 100%");
            return false;
        }
    });

});

</script>
@endsection
