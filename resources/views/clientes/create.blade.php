@extends('layouts.app', ['activePage' => 'cliente-management', 'titlePage' => __('País Management')])
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
                                    <label for="id">Id</label>
                                    <input type="text" class="form-control" name="id" id="id_input" placeholder="" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="tipo">Pessoa Física ou Juridica?</label>
                                    <select class="form-control" name="tipo" id="tipo_input" required>
                                        <option value="" selected disabled>Selecione</option>
                                        <option value="<?= config('constants.fisica'); ?>">Física</option>
                                        <option value="<?= config('constants.juridica'); ?>">Juridica</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="tipo">Nome</label>
                                    <input type="text" class="form-control" name="nome" id="nome_input" placeholder="" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="tipo">Apelido</label>
                                    <input type="text" class="form-control" name="apelido" id="apelido_input" placeholder="" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="estado_civil">Estado Civíl</label>
                                    <input type="text" class="form-control" name="estado_civil" id="estado_civil_input" placeholder="" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="tipo">Endereço</label>
                                    <input type="text" class="form-control" name="endereco" id="endereco_input" placeholder="" required>
                                </div>
                                <div class="col-md-1">
                                    <label for="tipo">nº</label>
                                    <input type="text" class="form-control" name="numero" id="numero_input" placeholder="" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="tipo">Complemento</label>
                                    <input type="text" class="form-control" name="complemento" id="complemento_input" placeholder="" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="tipo">Bairro</label>
                                    <input type="text" class="form-control" name="bairro" id="bairro_input" placeholder="" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="tipo">CEP</label>
                                    <input type="text" class="form-control" name="cep" id="telefone_input" placeholder="" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="tipo">Cidade</label>
                                    <input type="text" class="form-control" name="cidade" id="cidade_input" placeholder="" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="tipo">Telefone</label>
                                    <input type="text" class="form-control" name="telefone" id="telefone-input" placeholder="" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="tipo">Email</label>
                                    <input type="text" class="form-control" name="email" id="email_input" placeholder="" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="tipo">Sexo</label>
                                    <select class="form-control" name="sexo" id="sexo_input" required>
                                        <option value="" selected disabled>Selecione</option>
                                        <option value="<?= config('constants.masculino'); ?>">Maculino</option>
                                        <option value="<?= config('constants.feminino'); ?>">Feminino</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="tipo">Nacionalidade</label>
                                    <input type="text" class="form-control" name="nacionalidade" id="nacionalidade" placeholder="" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="aniversario">Aniversario</label>
                                    <input type="date" class="form-control" name="aniversario" id="aniversario_input" placeholder="" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="tipo">CPF</label>
                                    <input type="text" class="form-control" name="cpf" id="cpf_input" placeholder="" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="tipo">RG</label>
                                    <input type="text" class="form-control" name="rg" id="rg_input" placeholder="" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="tipo">Emissor</label>
                                    <input type="text" class="form-control" name="emissor" id="emissor_input" placeholder="" required>
                                </div>
                                <div class="col-md-1">
                                    <label for="tipo">UF</label>
                                    <input type="text" class="form-control" name="uf" id="uf_input" placeholder="" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <label for="tipo">Observação</label>
                                    <input type="text" class="form-control" name="observacao" id="observacao_input" placeholder="" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="tipo">Limite de Crédito</label>
                                    <input type="number" class="form-control" name="limite_credito" id="limite_credito_input" placeholder="" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="tipo">Condição de Pagamento</label>
                                    <select class="form-control" name="condicao_pagamento" id="condicao_pagamento_input" required>
                                        <option value="" selected disabled>Selecione</option>
                                        <option value="1">Tipo 1</option>
                                        <option value="2">Tipo 2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="ureated_at">Created_at</label>
                                    <input type="date" class="form-control" name="created_at" id="created_at_input" placeholder="" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="updated_at">Updated_at</label>
                                    <input type="date" class="form-control" name="updated_at" id="updated_at_input" placeholder="" readonly>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto float-right">
                                <a href="{{route('cliente.index')}}" class="btn btn-danger">{{ __('Back to list') }}</a>
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