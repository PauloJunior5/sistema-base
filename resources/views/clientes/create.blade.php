@extends('layouts.app', ['activePage' => 'cliente-management', 'titlePage' => __('Cliente Management')])
@section('content')
<!-- Start Modal -->
<div class="modal fade" id="paisModal" tabindex="-1" role="dialog" aria-labelledby="paisModal" aria-hidden="true" style="z-index: 99999">
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
<div class="modal fade" id="condicaoPagamamento" tabindex="-1" role="dialog" aria-labelledby="paisModal" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
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
                                    <input type="text" class="form-control" name="cliente" id="cliente_input" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="apelido">Apelido</label>
                                    <input type="text" class="form-control" name="apelido" id="apelido_input" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="endereco">Endereço</label>
                                    <input type="text" class="form-control" name="endereco" id="endereco_input" required>
                                </div>
                                <div class="col-md-1">
                                    <label for="numero">nº</label>
                                    <input type="text" class="form-control" name="numero" id="numero_input" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="complemento">Complemento</label>
                                    <input type="text" class="form-control" name="complemento" id="complemento_input" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="bairro">Bairro</label>
                                    <input type="text" class="form-control" name="bairro" id="bairro_input" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="cep">CEP</label>
                                    <input type="text" class="form-control" name="cep" id="telefone_input" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label for="codigo_cidade">Código</label>
                                    <input type="text" class="form-control" name="codigo_cidade" id="codigo_cidade_input" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="cidade">Cidade</label>
                                    <input class="form-control" name="cidade" id="input_cidade" value="" readonly />
                                </div>
                                <div class="col-md-1">
                                    <label for="uf">UF</label>
                                    <input class="form-control" name="uf_cidade" id="input_uf_cidade" value="" readonly />
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#paisModal" style="margin-top: 1.7rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" class="form-control" name="telefone" id="telefone-input" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="telefone">Celular</label>
                                    <input type="text" class="form-control" name="telefone" id="telefone-input" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email_input" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="nacionalidade">Nacionalidade</label>
                                    <input type="text" class="form-control" name="nacionalidade" id="nacionalidade" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="cpf">CPF</label>
                                    <input type="text" class="form-control" name="cpf" id="cpf_input" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="rg">RG</label>
                                    <input type="text" class="form-control" name="rg" id="rg_input" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="emissor">Emissor</label>
                                    <input type="text" class="form-control" name="emissor" id="emissor_input" required>
                                </div>
                                <div class="col-md-1">
                                    <label for="uf">UF</label>
                                    <input type="text" class="form-control" name="uf" id="uf_input" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="nascimento">Nascimento</label>
                                    <input type="date" class="form-control" name="nascimento" id="nascimento_input" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="observacao">Observação</label>
                                    <input type="text" class="form-control" name="observacao" id="observacao_input" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="limite_credito">Limite de Crédito</label>
                                    <input class="form-control" name="limite_credito" id="limite_credito_input" value="" />
                                </div>
                                <div class="col-md-1">
                                    <label for="codigo_condicao_pagamento">Código</label>
                                    <input class="form-control" name="codigo_condicao_pagamento" id="codigo_condicao_pagamento_input" value="" />
                                </div>
                                <div class="col-md-2">
                                    <label for="condicao_pagamento">Condição de Pagamento</label>
                                    <input class="form-control" name="condicao_pagamento" id="condicao_pagamento_input" value="" />
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#condicaoPagamamento" style="margin-top: 1.7rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="created_at">Created_at</label>
                                    <input type="date" class="form-control" name="created_at" id="created_at_input" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label for="updated_at">Updated_at</label>
                                    <input type="date" class="form-control" name="updated_at" id="updated_at_input" readonly>
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
@endsection
