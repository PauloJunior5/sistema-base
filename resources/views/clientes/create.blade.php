@extends('layouts.app', ['activePage' => 'cliente-management', 'titlePage' => __('Cliente Management')])
@section('content')
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
                                        <label class="form-check-label">Física</label>
                                        <input type="radio" name="tipo" id="tipo_input" value="<?= config('constants.fisica'); ?>" checked="checked">
                                        <label class="form-check-label">Juridica</label>
                                        <input type="radio" name="tipo" id="tipo_input" value="<?= config('constants.juridica'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="cliente">Cliente</label>
                                    <input type="text" class="form-control" name="cliente" id="cliente_input" placeholder="" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="apelido">Apelido</label>
                                    <input type="text" class="form-control" name="apelido" id="apelido_input" placeholder="" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="estado_civil">Estado Civíl</label>
                                    <input type="text" class="form-control" name="estado_civil" id="estado_civil_input" placeholder="" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="endereco">Endereço</label>
                                    <input type="text" class="form-control" name="endereco" id="endereco_input" placeholder="" required>
                                </div>
                                <div class="col-md-1">
                                    <label for="numero">nº</label>
                                    <input type="text" class="form-control" name="numero" id="numero_input" placeholder="" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="complemento">Complemento</label>
                                    <input type="text" class="form-control" name="complemento" id="complemento_input" placeholder="" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="bairro">Bairro</label>
                                    <input type="text" class="form-control" name="bairro" id="bairro_input" placeholder="" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="cep">CEP</label>
                                    <input type="text" class="form-control" name="cep" id="telefone_input" placeholder="" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="cidade">Cidade</label>
                                    <input type="text" class="form-control" name="cidade" id="cidade_input" placeholder="" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" class="form-control" name="telefone" id="telefone-input" placeholder="" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email_input" placeholder="" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="sexo">Sexo</label>
                                    <select class="form-control" name="sexo" id="sexo_input" required>
                                        <option value="" selected disabled>Selecione</option>
                                        <option value="<?= config('constants.masculino'); ?>">Maculino</option>
                                        <option value="<?= config('constants.feminino'); ?>">Feminino</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="nacionalidade">Nacionalidade</label>
                                    <input type="text" class="form-control" name="nacionalidade" id="nacionalidade" placeholder="" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="nascimento">Nascimento</label>
                                    <input type="date" class="form-control" name="nascimento" id="nascimento_input" placeholder="" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="cpf">CPF</label>
                                    <input type="text" class="form-control" name="cpf" id="cpf_input" placeholder="" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="rg">RG</label>
                                    <input type="text" class="form-control" name="rg" id="rg_input" placeholder="" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="emissor">Emissor</label>
                                    <input type="text" class="form-control" name="emissor" id="emissor_input" placeholder="" required>
                                </div>
                                <div class="col-md-1">
                                    <label for="uf">UF</label>
                                    <input type="text" class="form-control" name="uf" id="uf_input" placeholder="" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <label for="observacao">Observação</label>
                                    <input type="text" class="form-control" name="observacao" id="observacao_input" placeholder="" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="limite_credito">Limite de Crédito</label>
                                    <input type="number" class="form-control" name="limite_credito" id="limite_credito_input" placeholder="" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="condicao_pagamento">Condição de Pagamento</label>
                                    <select class="form-control" name="condicao_pagamento" id="condicao_pagamento_input" required>
                                        <option value="" selected disabled>Selecione</option>
                                        <option value="1">Tipo 1</option>
                                        <option value="2">Tipo 2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="created_at">Created_at</label>
                                    <input type="date" class="form-control" name="created_at" id="created_at_input" placeholder="" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label for="updated_at">Updated_at</label>
                                    <input type="date" class="form-control" name="updated_at" id="updated_at_input" placeholder="" readonly>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto float-right">
                                <a href="{{route('cliente.index')}}" class="btn btn-secondary">{{ __('Back to list') }}</a>
                                <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
