@extends('layouts.app', ['activePage' => 'paciente-management', 'titlePage' => __('Paciente Management')])
@section('content')
@include('layouts.cidadeEstadoPais')
<!-- Start Modal -->
<div class="modal fade" id="medicoModal" tabindex="-1" role="dialog" aria-labelledby="medicoModal" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                @include('layouts.medicoModal')
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}
<!-- Start Modal -->
<div class="modal fade" id="medicoCreateModal" tabindex="-1" role="dialog" aria-labelledby="medicoCreateModal" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                @include('layouts.medicoCreateModal')
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}
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
                <form method="post" action="{{ route('paciente.update', $paciente->id) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Add Paciente') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Código de Referência</label>
                                    <input class="form-control" value="{{$paciente->id}}" readonly />
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">Paciente</label>
                                    <input class="form-control" name="paciente" type="text" value="{{$paciente->paciente}}" />
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">Apelido</label>
                                    <input class="form-control" name="apelido" type="text" value="{{$paciente->apelido}}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label class="col-form-label">CRM</label>
                                    <input class="form-control" id="crm-medico-input" value="{{$medico->crm}}" />
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">Médico Responsável</label>
                                    <input class="form-control" id="medico-input" value="{{$medico->medico}}" readonly />
                                    <input type="hidden" id="id-medico-input" name="id_medico" value="{{$medico->id}}">
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#medicoModal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-form-label">Endereço</label>
                                    <input type="text" class="form-control" name="endereco" value="{{$paciente->endereco}}">
                                </div>
                                <div class="col-md-1">
                                    <label class="col-form-label">nº</label>
                                    <input type="text" class="form-control" name="numero" value="{{$paciente->numero}}">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Complemento</label>
                                    <input type="text" class="form-control" name="complemento" value="{{$paciente->complemento}}">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Bairro</label>
                                    <input type="text" class="form-control" name="bairro" value="{{$paciente->bairro}}">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">CEP</label>
                                    <input type="text" class="form-control" name="cep" value="{{$paciente->cep}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label class="col-form-label">Código</label>
                                    <input type="text" class="form-control" id="codigo-cidade-input" value="{{$cidade->codigo}}">
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">Cidade</label>
                                    <input class="form-control" id="cidade-input" value="{{$cidade->cidade}}" readonly />
                                    <input type="hidden" id="id-cidade-input" name="id_cidade" value="{{$cidade->id}}">
                                </div>
                                <div class="col-md-1">
                                    <label class="col-form-label">UF</label>
                                    <input class="form-control" id="uf-cidade-input" value="{{$estado->codigo}}" readonly />
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#cidadeModal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-form-label">Sexo</label>
                                    <input type="text" class="form-control" name="sexo" value="{{$paciente->sexo}}">
                                </div>
                                <div class="col-md-2">
                                    <label for="nascimento">Nascimento</label>
                                    <input type="date" class="form-control" name="nascimento" value="{{$paciente->nascimento}}">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">Estado Civil</label>
                                    <input type="text" class="form-control" name="estado_civil" value="{{$paciente->estado_civil}}">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">Nacionalidade</label>
                                    <input type="text" class="form-control" name="nacionalidade" value="{{$paciente->nacionalidade}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-form-label">Telefone</label>
                                    <input type="text" class="form-control" name="telefone" value="{{$paciente->telefone}}">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">Celular</label>
                                    <input type="text" class="form-control" name="celular" value="{{$paciente->celular}}">
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{$paciente->email}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-form-label">CPF</label>
                                    <input type="text" class="form-control" name="cpf" value="{{$paciente->cpf}}">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">RG</label>
                                    <input type="text" class="form-control" name="rg" value="{{$paciente->rg}}">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Emissor</label>
                                    <input type="text" class="form-control" name="emissor" value="{{$paciente->emissor}}">
                                </div>
                                <div class="col-md-1">
                                    <label class="col-form-label">UF</label>
                                    <input type="text" class="form-control" name="uf" value="{{$paciente->uf}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="observacao">Observação</label>
                                    <input type="text" class="form-control" name="observacao" value="{{$paciente->observacao}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Created_at</label>
                                    <input type="date" class="form-control" value="{{$paciente->created_at->format('Y-m-d')}}" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Updated_at</label>
                                    <input type="date" class="form-control" value="{{$paciente->updated_at->format('Y-m-d')}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{ route('paciente.index') }}" class="btn btn-secondary">{{ __('Back to list') }}</a>
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
        $(".campoPessoaJuridica").hide();
        $('.inputPessoaJuridica').prop('required', false);
    });
    $("input:radio[name=tipo]").on("change", function() {
        if ($(this).val() == "pessoaFisica") {
            $(".campoPessoaFisica").show();
            $(".campoPessoaJuridica").hide();
            $('.inputPessoaJuridica').prop('required', false);
            $('.inputPessoaFisica').prop('required', true);
        } else if ($(this).val() == "pessoaJuridica") {
            $(".campoPessoaFisica").hide();
            $(".campoPessoaJuridica").show();
            $('.inputPessoaFisica').prop('required', false);
            $('.inputPessoaJuridica').prop('required', true);
        }
    });

</script>
<script>
    var url_atual = '<?php echo URL::to('
    '); ?>';
    $('.idMedico').click(function() {
        var id_medico = $(this).val();
        $.ajax({
            method: "POST"
            , url: url_atual + '/medico/show'
            , data: {
                id_medico: id_medico
            }
            , dataType: "JSON"
            , success: function(response) {
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
@endsection
