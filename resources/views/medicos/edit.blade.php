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
                <form method="post" action="{{ route('medico.update', $medico->id) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Alterar Médico') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Código</label>
                                    <input class="form-control" value="{{$medico->id}}" readonly />
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-4">
                                    <label>@include('includes.required')Médico</label>
                                    <input class="form-control" name="medico" type="text" value="{{$medico->medico}}" required />
                                </div>
                                <div class="col-md-2">
                                    <label>@include('includes.required')Crm</label>
                                    <input class="form-control" name="crm" type="text" value="{{$medico->crm}}" required />
                                </div>
                                <div class="col-md-4">
                                    <label>@include('includes.required')Especialidade</label>
                                    <input class="form-control" name="especialidade" type="text" value="{{$medico->especialidade}}" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label>@include('includes.required')Endereço</label>
                                    <input type="text" class="form-control" name="endereco" value="{{$medico->endereco}}" required>
                                </div>
                                <div class="col-md-1">
                                    <label>@include('includes.required')nº</label>
                                    <input type="text" class="form-control" name="numero" value="{{$medico->numero}}" required>
                                </div>
                                <div class="col-md-2">
                                    <label>Complemento</label>
                                    <input type="text" class="form-control" name="complemento" value="{{$medico->complemento}}">
                                </div>
                                <div class="col-md-2">
                                    <label>@include('includes.required')Bairro</label>
                                    <input type="text" class="form-control" name="bairro" value="{{$medico->bairro}}" required>
                                </div>
                                <div class="col-md-2">
                                    <label>@include('includes.required')CEP</label>
                                    <input type="text" class="form-control" name="cep" value="{{$medico->cep}}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label>@include('includes.required')DDD</label>
                                    <input type="text" class="form-control" id="ddd-cidade-input" value="{{$cidade->ddd}}" required readonly>
                                </div>
                                <div class="col-md-4">
                                    <label>@include('includes.required')Cidade</label>
                                    <input class="form-control" id="cidade-input" value="{{$cidade->cidade}}" readonly />
                                    <input type="hidden" id="id-cidade-input" name="id_cidade" value="{{$cidade->id}}" required>
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-2">
                                    <label>UF</label>
                                    <input class="form-control" id="uf-cidade-input" value="{{$estado->uf}}" readonly />
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#cidadeModal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>@include('includes.required')Telefone</label>
                                    <input type="text" class="form-control" name="telefone" value="{{$medico->telefone}}" required>
                                </div>
                                <div class="col-md-3">
                                    <label>Celular</label>
                                    <input type="text" class="form-control" name="celular" value="{{$medico->celular}}">
                                </div>
                                <div class="col-md-4">
                                    <label>@include('includes.required')Email</label>
                                    <input type="text" class="form-control" name="email" value="{{$medico->email}}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>@include('includes.required')CPF</label>
                                    <input type="text" class="form-control" name="cpf" value="{{$medico->cpf}}" required>
                                </div>
                                <div class="col-md-3">
                                    <label>@include('includes.required')RG</label>
                                    <input type="text" class="form-control" name="rg" value="{{$medico->rg}}" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="nascimento">@include('includes.required')Nascimento</label>
                                    <input type="date" class="form-control" name="nascimento" value="{{$medico->nascimento}}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="observacao">Observação</label>
                                    <input type="text" class="form-control" name="observacao" value="{{$medico->observacao}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Data de Criação</label>
                                    <input type="datetime-local" class="form-control" value="{{$medico->created_at->format('Y-m-d H:i:s')}}" readonly>
                                    <p class="read-only">Campo apenas para consulta.</p>
                                </div>
                                <div class="col-md-2">
                                    <label>Data de Alteração</label>
                                    <input type="datetime-local" class="form-control" value="{{$medico->updated_at->format('Y-m-d H:i:s')}}" readonly>
                                    <p class="read-only">Campo apenas para consulta.</p>
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
            url: url_atual + '/pais/show',
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
