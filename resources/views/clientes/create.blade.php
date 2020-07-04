@extends('layouts.app', ['activePage' => 'cliente-management', 'titlePage' => __('Cliente Management')])
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
                <form method="post" action="{{route('cliente.store')}}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('FICHA CADASTRAL') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-1">
                                    <label for="codigo">Código</label>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="tipo">Tipo</label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="tipo" value="<?= config('constants.fisica'); ?>" checked> Física
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="tipo" value="<?= config('constants.juridica');?>"> Jurídica
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="cliente">Cliente</label>
                                    <input type="text" class="form-control" name="cliente">
                                </div>
                                <div class="col-md-4">
                                    <label for="apelido">Apelido</label>
                                    <input type="text" class="form-control" name="apelido">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="endereco">Endereço</label>
                                    <input type="text" class="form-control" name="endereco">
                                </div>
                                <div class="col-md-1">
                                    <label for="numero">nº</label>
                                    <input type="text" class="form-control" name="numero">
                                </div>
                                <div class="col-md-2">
                                    <label for="complemento">Complemento</label>
                                    <input type="text" class="form-control" name="complemento">
                                </div>
                                <div class="col-md-2">
                                    <label for="bairro">Bairro</label>
                                    <input type="text" class="form-control" name="bairro">
                                </div>
                                <div class="col-md-2">
                                    <label for="cep">CEP</label>
                                    <input type="text" class="form-control" name="cep">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label for="codigo_cidade">Código</label>
                                    <input type="text" class="form-control" id="codigo-cidade-input">
                                </div>
                                <div class="col-md-4">
                                    <label for="cidade">Cidade</label>
                                    <input class="form-control" id="cidade-input" value="" readonly />
                                    <input type="hidden" id="id-cidade-input" name="id_cidade" value="">
                                </div>
                                <div class="col-md-1">
                                    <label for="uf">UF</label>
                                    <input class="form-control" id="uf-cidade-input" value="" readonly />
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#cidadeModal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" class="form-control" name="telefone">
                                </div>
                                <div class="col-md-2">
                                    <label for="celular">Celular</label>
                                    <input type="text" class="form-control" name="celular">
                                </div>
                                <div class="col-md-3">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email">
                                </div>
                                <div class="col-md-2">
                                    <label for="nacionalidade">Nacionalidade</label>
                                    <input type="text" class="form-control" name="nacionalidade">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="cpf">CPF</label>
                                    <input type="text" class="form-control" name="cpf">
                                </div>
                                <div class="col-md-3">
                                    <label for="rg">RG</label>
                                    <input type="text" class="form-control" name="rg">
                                </div>
                                <div class="col-md-2">
                                    <label for="emissor">Emissor</label>
                                    <input type="text" class="form-control" name="emissor">
                                </div>
                                <div class="col-md-1">
                                    <label for="uf">UF</label>
                                    <input type="text" class="form-control" name="uf">
                                </div>
                                <div class="col-md-2">
                                    <label for="nascimento">Nascimento</label>
                                    <input type="date" class="form-control" name="nascimento">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="observacao">Observação</label>
                                    <input type="text" class="form-control" name="observacao">
                                </div>
                                <div class="col-md-2">
                                    <label for="limite_credito">Limite de Crédito</label>
                                    <input class="form-control" name="limite_credito" />
                                </div>
                                <div class="col-md-1">
                                    <label for="codigo_condicao_pagamento">Código</label>
                                    <input class="form-control"/>
                                </div>
                                <div class="col-md-3">
                                    <label for="condicao_pagamento">Condição de Pagamento</label>
                                    <input class="form-control"/>
                                    {{-- <input type="hidden" id="" name="id_condicao_pagamento" value=""> --}}
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#condicaoPagamamento" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="created_at">Created_at</label>
                                    <input type="date" class="form-control" name="created_at" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label for="updated_at">Updated_at</label>
                                    <input type="date" class="form-control" name="updated_at" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto float-right">
                            <a href="{{route('cliente.index')}}" class="btn btn-secondary">{{ __('Back to list') }}</a>
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
</script>
@endsection
