@extends('layouts.app', ['activePage' => 'medico-management', 'titlePage' => __('Médico Management')])
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
                <form method="post" action="{{ route('medico.store') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Novo Médico') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Código</label>
                                    <input class="form-control" readonly />
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Médico</label>
                                    <input class="form-control" name="medico" type="text" required />
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')CRM</label>
                                    <input class="form-control" name="crm" type="text" required />
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Especialidade</label>
                                    <input class="form-control" name="especialidade" type="text" required />
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
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">@include('includes.required')DDD</label>
                                    <input type="text" class="form-control" id="ddd-cidade-input" required readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Cidade</label>
                                    <input class="form-control" id="cidade-input" readonly />
                                    <input type="hidden" id="id-cidade-input" name="id_cidade" required>
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">UF</label>
                                    <input class="form-control" id="uf-cidade-input" readonly />
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#cidadeModal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')Telefone</label>
                                    <input type="text" class="form-control" name="telefone" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">Celular</label>
                                    <input type="text" class="form-control" name="celular">
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">@include('includes.required')Email</label>
                                    <input type="text" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')CPF</label>
                                    <input type="text" class="form-control" name="cpf" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">@include('includes.required')RG</label>
                                    <input type="text" class="form-control" name="rg" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label" for="nascimento">@include('includes.required')Nascimento</label>
                                    <input type="date" class="form-control" name="nascimento" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="col-form-label" for="observacao">Observação</label>
                                    <input type="text" class="form-control" name="observacao">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Data de Criação</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" readonly>
                                        <p class="read-only">Campo apenas para consulta.</p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Data de Alteração</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" readonly>
                                        <p class="read-only">Campo apenas para consulta.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{ route('medico.index') }}" class="btn btn-secondary">{{ __('Voltar') }}</a>
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
                $('#ddd-cidade-input').val(response.cidade.ddd);
                $('#cidade-input').val(response.cidade.cidade);
                $('#uf-cidade-input').val(response.estado.uf);
                $('#id-cidade-input').val(response.cidade.id);
                $('#cidadeModal').modal('hide')
            }
        });
    });

    $('.idEstado').click(function() {
        var id_estado = $(this).val();
        $.ajax({
            method: "POST",
            url: url_atual + '/estado/show',
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
            url: url_atual + '/pais/show',
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

@endsection
