@extends('layouts.app', ['activePage' => 'paciente-management', 'titlePage' => __('Paciente Management')])
@section('content')
@include('layouts.modais.chamada-modal.medico')
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
                <form method="post" action="{{ route('paciente.store') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Add Paciente') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Código de Referência</label>
                                    <input class="form-control" readonly />
                                </div>
                                <div class="col-md-4">
                                    <label>Paciente</label>
                                    <input class="form-control" name="paciente" type="text" />
                                </div>
                                <div class="col-md-4">
                                    <label>Apelido</label>
                                    <input class="form-control" name="apelido" type="text" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label>CRM</label>
                                    <input class="form-control" id="crm-medico-input" />
                                </div>
                                <div class="col-md-4">
                                    <label>Médico Responsável</label>
                                    <input class="form-control" id="medico-input" readonly />
                                    <input type="hidden" id="id-medico-input" name="id_medico">
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#medicoModal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label>Endereço</label>
                                    <input type="text" class="form-control" name="endereco">
                                </div>
                                <div class="col-md-1">
                                    <label>nº</label>
                                    <input type="text" class="form-control" name="numero">
                                </div>
                                <div class="col-md-2">
                                    <label>Complemento</label>
                                    <input type="text" class="form-control" name="complemento">
                                </div>
                                <div class="col-md-2">
                                    <label>Bairro</label>
                                    <input type="text" class="form-control" name="bairro">
                                </div>
                                <div class="col-md-2">
                                    <label>CEP</label>
                                    <input type="text" class="form-control" name="cep">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label>Código</label>
                                    <input type="text" class="form-control" id="codigo-cidade-input-paciente">
                                </div>
                                <div class="col-md-4">
                                    <label>Cidade</label>
                                    <input class="form-control" id="cidade-input-paciente" value="" readonly />
                                    <input type="hidden" id="id-cidade-input-paciente" name="id_cidade" value="">
                                </div>
                                <div class="col-md-1">
                                    <label>UF</label>
                                    <input class="form-control" id="uf-cidade-input-paciente" value="" readonly />
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#cidadeModal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Sexo</label>
                                    <input type="text" class="form-control" name="sexo">
                                </div>
                                <div class="col-md-2">
                                    <label for="nascimento">Nascimento</label>
                                    <input type="date" class="form-control" name="nascimento">
                                </div>
                                <div class="col-md-3">
                                    <label>Estado Civil</label>
                                    <input type="text" class="form-control" name="estado_civil">
                                </div>
                                <div class="col-md-3">
                                    <label>Nacionalidade</label>
                                    <input type="text" class="form-control" name="nacionalidade">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Telefone</label>
                                    <input type="text" class="form-control" name="telefone">
                                </div>
                                <div class="col-md-3">
                                    <label>Celular</label>
                                    <input type="text" class="form-control" name="celular">
                                </div>
                                <div class="col-md-4">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>CPF</label>
                                    <input type="text" class="form-control" name="cpf">
                                </div>
                                <div class="col-md-3">
                                    <label>RG</label>
                                    <input type="text" class="form-control" name="rg">
                                </div>
                                <div class="col-md-2">
                                    <label>Emissor</label>
                                    <input type="text" class="form-control" name="emissor">
                                </div>
                                <div class="col-md-1">
                                    <label>UF</label>
                                    <input type="text" class="form-control" name="uf">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="observacao">Observação</label>
                                    <input type="text" class="form-control" name="observacao">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Created_at</label>
                                    <input type="date" class="form-control" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label>Updated_at</label>
                                    <input type="date" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{ route('paciente.index') }}" class="btn btn-secondary">{{ __('Back to list') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Add Paciente') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $( document ).ready(function() {
        $(".campoPessoaJuridica").hide();
        $('.inputPessoaJuridica').prop('required',false);
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
    $('.idMedico').click(function() {
        var id_medico = $(this).val();
        $.ajax({
            method: "POST",
            url: url_atual + '/medico/show',
            data: { id_medico : id_medico },
            dataType: "JSON",
            success: function(response){
                $('#crm-medico-input').val(response.crm);
                $('#medico-input').val(response.medico);
                $('#id-medico-input').val(response.id);
                $('#medicoModal').modal('hide')
            }
        });
    });
    $('.idCidade').click(function() {
        var id_cidade = $(this).val();
        $.ajax({
            method: "POST",
            url: url_atual + '/cidade/show',
            data: { id_cidade : id_cidade },
            dataType: "JSON",
            success: function(response){
                $('#codigo-cidade-input-paciente').val(response.cidade.codigo);
                $('#cidade-input-paciente').val(response.cidade.cidade);
                $('#uf-cidade-input-paciente').val(response.estado.codigo);
                $('#id-cidade-input-paciente').val(response.cidade.id);
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

    $('.idCidade-medico').click(function() {
        var id_cidade = $(this).val();
        $.ajax({
            method: "POST",
            url: url_atual + '/cidade/show',
            data: { id_cidade : id_cidade },
            dataType: "JSON",
            success: function(response){
                $('#codigo-cidade-input-medico').val(response.cidade.codigo);
                $('#cidade-input-medico').val(response.cidade.cidade);
                $('#uf-cidade-input-medico').val(response.estado.codigo);
                $('#id-cidade-input-medico').val(response.cidade.id);
                $('#cidadeModal-medico').modal('hide')
            }
        });
    });
    $('.idEstado-medico').click(function() {
        var id_estado = $(this).val();
        $.ajax({
            method: "POST",
            url: url_atual + '/cidade/getEstado',
            data: { id_estado : id_estado },
            dataType: "JSON",
            success: function(response){
                $('#codigo-estado-input-medico').val(response.estado.codigo);
                $('#estado-input-medico').val(response.estado.estado);
                $('#id-estado-input-medico').val(response.estado.id);
                $('#pais-input-medico').val(response.pais.pais);
                $('#estadoModal-medico').modal('hide')
            }
        });
    });
    $('.idPais-medico').click(function() {
        var id_pais = $(this).val();
        $.ajax({
            method: "POST",
            url: url_atual + '/estado/getPais',
            data: { id_pais : id_pais },
            dataType: "JSON",
            success: function(response){
                $('#input-codigo-pais-medico').val(response.codigo);
                $('#input-pais-medico').val(response.pais);
                $('#input-id-pais-medico').val(response.id);
                $('#paisModal-medico').modal('hide')
            }
        });
    });
</script>
@if(!empty(Session::get('error_code')) && Session::get('error_code') == 7)
    <script>
        $(function() {
            $('#medicoModal').modal('show');
        });
    </script>
@endif
@if(!empty(Session::get('error_code')) && Session::get('error_code') == 8)
    <script>
        $(function() {
            $('#medicoModal').modal('show');
        });
        $(function() {
            $('#medicoCreateModal').modal('show');
        });
        $(function() {
            $('#cidadeModal-medico').modal('show');
        });
    </script>
@endif
@if(!empty(Session::get('error_code')) && Session::get('error_code') == 6)
    <script>
        $(function() {
            $('#medicoModal').modal('show');
        });
        $(function() {
            $('#medicoCreateModal').modal('show');
        });
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
