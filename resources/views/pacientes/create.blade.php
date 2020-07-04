@extends('layouts.app', ['activePage' => 'paciente-management', 'titlePage' => __('Paciente Management')])
@section('content')
<!-- Start Modal -->
<div class="modal fade" id="cidadeModal" tabindex="-1" role="dialog" aria-labelledby="cidadeModal" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                @include('layouts.cidadeModal')
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}
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
                                    <div class="form-group">
                                        <input class="form-control" readonly />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Paciente</label>
                                    <div class="form-group">
                                        <input class="form-control" name="paciente" type="text" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Apelido</label>
                                    <div class="form-group">
                                        <input class="form-control" name="apelido" type="text" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label>CRM</label>
                                    <input class="form-control" id="crm-medico-input"/>
                                </div>
                                <div class="col-md-4">
                                    <label>Médico Responsável</label>
                                    <input class="form-control" id="medico-input" readonly/>
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
                                    <input type="text" class="form-control" id="codigo-cidade-input">
                                </div>
                                <div class="col-md-4">
                                    <label>Cidade</label>
                                    <input class="form-control" id="cidade-input" value="" readonly />
                                    <input type="hidden" id="id-cidade-input" name="id_cidade" value="">
                                </div>
                                <div class="col-md-1">
                                    <label>UF</label>
                                    <input class="form-control" name="uf_cidade" id="uf-cidade-input" value="" readonly />
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
                                    <div class="form-group">
                                        <input type="date" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label>Updated_at</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" readonly>
                                    </div>
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

</script>
<script>
    
</script>
@endsection
