@extends('layouts.app', ['activePage' => 'cliente-management', 'titlePage' => __('Cliente Management')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('cliente.update') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('FICHA CADASTRAL') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-1">
                                    <label for="id">Id</label>
                                    <input type="text" class="form-control" name="id" id="id_input" placeholder="" value="{{$cliente->id}}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="tipo">Tipo</label>
                                    <div class="form-check">
                                        <?php if ($cliente->tipo == config('constants.fisica')) { ?>
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
                                        <?php } else { ?>
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="tipo" value="<?= config('constants.fisica'); ?>"> Física
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="tipo" value="<?= config('constants.juridica');?>" checked> Jurídica
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" name="nome" id="nome_input" placeholder="" value="{{$cliente->nome}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="apelido">Apelido</label>
                                    <input type="text" class="form-control" name="apelido" id="apelido_input" placeholder="" value="{{$cliente->apelido}}">
                                </div>
                                <div class="col-md-2">
                                    <label for="estado_civil">Estado Civíl</label>
                                    <input type="text" class="form-control" name="estado_civil" id="estado_civil_input" placeholder="" value="{{$cliente->estado_civil}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="endereco">Endereço</label>
                                    <input type="text" class="form-control" name="endereco" id="endereco_input" placeholder="" value="{{$cliente->endereco}}">
                                </div>
                                <div class="col-md-1">
                                    <label for="numero">nº</label>
                                    <input type="text" class="form-control" name="numero" id="numero_input" placeholder="" value="{{$cliente->numero}}">
                                </div>
                                <div class="col-md-2">
                                    <label for="complemento">Complemento</label>
                                    <input type="text" class="form-control" name="complemento" id="complemento_input" placeholder="" value="{{$cliente->complemento}}">
                                </div>
                                <div class="col-md-2">
                                    <label for="bairro">Bairro</label>
                                    <input type="text" class="form-control" name="bairro" id="bairro_input" placeholder="" value="{{$cliente->bairro}}">
                                </div>
                                <div class="col-md-2">
                                    <label for="cep">CEP</label>
                                    <input type="text" class="form-control" name="cep" id="telefone_input" placeholder="" value="{{$cliente->cep}}">
                                </div>
                                <div class="col-md-2">
                                    <label for="cidade">Cidade</label>
                                    <input type="text" class="form-control" name="cidade" id="cidade_input" placeholder="" value="{{$cliente->cidade}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" class="form-control" name="telefone" id="telefone-input" placeholder="" value="{{$cliente->telefone}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email_input" placeholder="" value="{{$cliente->email}}">
                                </div>
                                <div class="col-md-2">
                                    <label for="sexo">Sexo</label>
                                    <select class="form-control" name="sexo" id="sexo_input">
                                        <?php if ($cliente->sexo == config('constants.masculino')) { ?>
                                        <option value="<?= config('constants.masculino'); ?>" selected>Maculino</option>
                                        <option value="<?= config('constants.feminino'); ?>">Feminino</option>
                                        <?php } else { ?>
                                        <option value="<?= config('constants.masculino'); ?>">Maculino</option>
                                        <option value="<?= config('constants.feminino'); ?>" selected>Feminino</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="nacionalidade">Nacionalidade</label>
                                    <input type="text" class="form-control" name="nacionalidade" id="nacionalidade" placeholder="" value="{{$cliente->nacionalidade}}">
                                </div>
                                <div class="col-md-2">
                                    <label for="aniversario">Aniversario</label>
                                    <input type="date" class="form-control" name="aniversario" id="aniversario_input" placeholder="" value="{{$cliente->aniversario}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="cpf">CPF</label>
                                    <input type="text" class="form-control" name="cpf" id="cpf_input" placeholder="" value="{{$cliente->cpf}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="rg">RG</label>
                                    <input type="text" class="form-control" name="rg" id="rg_input" placeholder="" value="{{$cliente->rg}}">
                                </div>
                                <div class="col-md-2">
                                    <label for="emissor">Emissor</label>
                                    <input type="text" class="form-control" name="emissor" id="emissor_input" placeholder="" value="{{$cliente->emissor}}">
                                </div>
                                <div class="col-md-1">
                                    <label for="uf">UF</label>
                                    <input type="text" class="form-control" name="uf" id="uf_input" placeholder="" value="{{$cliente->uf}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <label for="observacao">Observação</label>
                                    <input type="text" class="form-control" name="observacao" id="observacao_input" placeholder="" value="{{$cliente->observacao}}">
                                </div>
                                <div class="col-md-2">
                                    <label for="limite_credito">Limite de Crédito</label>
                                    <input type="number" class="form-control" name="limite_credito" id="limite_credito_input" placeholder="" value="{{$cliente->limite_credito}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="condicao_pagamento">Condição de Pagamento</label>
                                    <select class="form-control" name="condicao_pagamento" id="condicao_pagamento_input" placeholder="" value="{{$cliente->condicao_pagamento}}">
                                        <?php if ($cliente->condicao_pagamento == 1) { ?>
                                        <option value="1" selected>Tipo 1</option>
                                        <option value="2">Tipo 2</option>
                                        <?php } else { ?>
                                        <option value="1">Tipo 1</option>
                                        <option value="2" selected>Tipo 2</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="created_at">Created_at</label>
                                    <input type="date" class="form-control" name="created_at" id="Created_at_input" placeholder="" value="{{$cliente->created_at->format('Y-m-d')}}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="updated_at">Updated_at</label>
                                    <input type="date" class="form-control" name="updated_at" id="Updated_at_input" placeholder="" value="{{$cliente->updated_at->format('Y-m-d')}}" readonly>
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
