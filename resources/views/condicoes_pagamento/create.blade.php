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
                            <h4 class="card-title">{{ __('Add Condição de Pagamento') }}</h4>
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
                                    <label class="col-form-label">Juro (%)</label>
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
                                        
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover" id="tblCadastro">
                                                <thead>
                                                    <tr>
                                                        <th>Numero de Dias</th>
                                                        <th>Porcentual</th>
                                                        <th>Código</th>
                                                        <th>Forma de Pagamento</th>
                                                        <th><button class="btn btn-primary" type="button" value="Salvar" id="btnAdicionar">Novo</button></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{ route('condicaoPagamento.index') }}" class="btn btn-secondary">{{ __('Back to list') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Add Condição de Pagamento') }}</button>
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
        //Código das funções Adicionar, Salvar, Editar e Excluir
        $(".btnEditar").bind("click", Editar);
        $(".btnExcluir").bind("click", Excluir);
        $("#btnAdicionar").bind("click", Adicionar);
    });

    function Excluir(){
        var par = $(this).parent().parent(); //tr
        par.remove();
    };

    function Editar(){
        var par = $(this).parent().parent(); //tr
        var tdNome = par.children("td:nth-child(1)");
        var tdTelefone = par.children("td:nth-child(2)");
        var tdEmail = par.children("td:nth-child(3)");
        var tdBotoes = par.children("td:nth-child(4)");

        tdNome.html("<input type='text' id='txtNome' value='"+tdNome.html()+"'/>");
        tdTelefone.html("<input type='text' id='txtTelefone' value='"+tdTelefone.html()+"'/>");
        tdEmail.html("<input type='text' id='txtEmail' value='"+tdEmail.html()+"'/>");
        tdBotoes.html("<img src='images/disk.png' class='btnSalvar'/>");

        $(".btnSalvar").bind("click", Salvar);
        $(".btnEditar").bind("click", Editar);
        $(".btnExcluir").bind("click", Excluir);
    };

    function Salvar(){
        var par = $(this).parent().parent(); //tr
        var tdNome = par.children("td:nth-child(1)");
        var tdTelefone = par.children("td:nth-child(2)");
        var tdEmail = par.children("td:nth-child(3)");
        var tdBotoes = par.children("td:nth-child(4)");

        tdNome.html(tdNome.children("input[type=text]").val());
        tdTelefone.html(tdTelefone.children("input[type=text]").val());
        tdEmail.html(tdEmail.children("input[type=text]").val());
        tdBotoes.html("<img src='images/delete.png' class='btnExcluir'/><img src='images/pencil.png' class='btnEditar'/>");

        $(".btnEditar").bind("click", Editar);
        $(".btnExcluir").bind("click", Excluir);
    };

    function Adicionar(){
        $("#tblCadastro tbody").append(
            "<tr>"+
            "<td><input type='text'/></td>"+
            "<td><input type='text'/></td>"+
            "<td><input type='text'/></td>"+
            "<td><input type='text'/></td>"+
            "<td><button class='btn btn-success btn-sm btnSalvar'><i class='material-icons'>check</i></buttom> <button class='btn btn-danger btn-sm btnExcluir'><i class='material-icons'>clear</i></buttom></td>"+ "</tr>");

            $(".btnSalvar").bind("click", Salvar);
            $(".btnExcluir").bind("click", Excluir);
    };

</script>
@endsection
