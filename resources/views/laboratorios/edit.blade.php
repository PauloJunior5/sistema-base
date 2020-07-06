@extends('layouts.app', ['activePage' => 'laboratorio-management', 'titlePage' => __('Laboratório Management')])
@section('content')
@include('layouts.cidadeEstadoPais')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('laboratorio.update', $laboratorio->id) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('FICHA CADASTRAL') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Código de Referência</label>
                                    <input type="text" class="form-control" value="{{$laboratorio->id}}" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">Laboratório</label>
                                    <input type="text" class="form-control" value="{{$laboratorio->laboratorio}}" name="laboratorio">
                                </div>
                                <div class="col-md-4 campoPessoaJuridica">
                                    <label class="col-form-label">Nome Fantasia</label>
                                    <input type="text" class="form-control inputPessoaJuridica" value="{{$laboratorio->nome_fantasia}}" name="nome_fantasia" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-form-label">Endereço</label>
                                    <input type="text" class="form-control" value="{{$laboratorio->endereco}}" name="endereco" required>
                                </div>
                                <div class="col-md-1">
                                    <label class="col-form-label">nº</label>
                                    <input type="text" class="form-control" value="{{$laboratorio->numero}}" name="numero" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Complemento</label>
                                    <input type="text" class="form-control" value="{{$laboratorio->complemento}}" name="complemento" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Bairro</label>
                                    <input type="text" class="form-control" value="{{$laboratorio->bairro}}" name="bairro" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">CEP</label>
                                    <input type="text" class="form-control" value="{{$laboratorio->cep}}" name="cep" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label class="col-form-label">Código</label>
                                    <input type="text" class="form-control" id="codigo-cidade-input" value="{{$cidade->codigo}}" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">Cidade</label>
                                    <input class="form-control" id="cidade-input" value="{{$cidade->cidade}}" readonly required>
                                    <input type="hidden" id="id-cidade-input" name="id_cidade" value="{{$cidade->id}}">
                                </div>
                                <div class="col-md-1">
                                    <label class="col-form-label">UF</label>
                                    <input class="form-control" id="uf-cidade-input" value="{{$estado->codigo}}" readonly required>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#cidadeModal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Telefone</label>
                                    <input type="text" class="form-control" value="{{$laboratorio->telefone}}" name="telefone" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Celular</label>
                                    <input type="text" class="form-control" value="{{$laboratorio->celular}}" name="celular" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">Email</label>
                                    <input type="text" class="form-control" value="{{$laboratorio->email}}" name="email" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Contato</label>
                                    <input type="text" class="form-control" value="{{$laboratorio->contato}}" name="contato" required>
                                </div>
                            </div>
                            <div class="row campoPessoaJuridica">
                                <div class="col-md-3">
                                    <label class="col-form-label">Inscricão Estadual</label>
                                    <input type="text" class="form-control inputPessoaJuridica" value="{{$laboratorio->inscricao_estadual}}" name="inscricao_estadual" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">CNPJ</label>
                                    <input type="text" class="form-control inputPessoaJuridica" value="{{$laboratorio->cnpj}}" name="cnpj" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-form-label">Observação</label>
                                    <input type="text" class="form-control" value="{{$laboratorio->observacao}}" name="observacao" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Limite de Crédito</label>
<<<<<<< Updated upstream
                                    <input class="form-control" value="{{$laboratorio->limite_credito}}" name="limite_credito" required>
=======
                                    <input class="form-control" type="number" value="{{$laboratorio->limite_credito}}" name="limite_credito" required>
>>>>>>> Stashed changes
                                </div>
                                <div class="col-md-1">
                                    <label class="col-form-label">Código</label>
                                    <input class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">Condição de Pagamento</label>
                                    <input class="form-control" value="{{$laboratorio->condicao_pagamento}}">
                                    {{-- <input type="hidden" id="" name="id_condicao_pagamento" value=""> --}}
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#condicaoPagamamento" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Created_at</label>
                                    <input type="date" class="form-control" value="{{$laboratorio->created_at->format('Y-m-d')}}" name="created_at" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Updated_at</label>
                                    <input type="date" class="form-control" value="{{$laboratorio->updated_at->format('Y-m-d')}}" name="updated_at" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{route('laboratorio.index')}}" class="btn btn-secondary">{{ __('Back to list') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
<script>
    $( document ).ready(function() {
        if ($('#pessoa-fisica').is(':checked')) {
            $(".campoPessoaJuridica").hide();
            $('.inputPessoaJuridica').prop('required',false);
        } else {
            $(".campoPessoaFisica").hide();
            $('.inputPessoaFisica').prop('required',false);
        }
    });

    $("input:radio[name=tipo]").on("change", function () {
        if($(this).val() == "pessoaFisica") {
            $(".campoPessoaFisica").show();
            $(".campoPessoaJuridica").hide();
            $('.inputPessoaJuridica').prop('required',false);
            $('.inputPessoaFisica').prop('required',true);
        }
        else if($(this).val() == "pessoaJuridica") {
            $(".campoPessoaFisica").hide();
            $(".campoPessoaJuridica").show();
            $('.inputPessoaFisica').prop('required',false); 
            $('.inputPessoaJuridica').prop('required',true); 
        }
    });

</script>

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
            method: "POST",
            url: url_atual + '/cidade/getEstado',
            data: { id_estado : id_estado },
            dataType: "JSON",
            success: function(response){
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
            method: "POST",
            url: url_atual + '/estado/getPais',
            data: { id_pais : id_pais },
            dataType: "JSON",
            success: function(response){
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
@endsection
