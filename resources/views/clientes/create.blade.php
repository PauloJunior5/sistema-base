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
                                <div class="col-md-12 text-right">
                                    <a href="" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="tipo">Pessoa Física ou Juridica?</label>
                                    <select class="form-control" name="tipo" id="tipo-input">
                                        <option value="" selected disabled>Selecione</option>
                                        <option value="1">Física</option>
                                        <option value="2">Juridica</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="aniversario">Aniversario</label>
                                    <input type="date" class="form-control" name="aniversario" id="aniversario-input" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="tipo">Nome</label>
                                    <input type="text" class="form-control" name="nome" id="nome-input" placeholder="">
                                </div>
                                <div class="col-md-6">
                                    <label for="tipo">Apelido</label>
                                    <input type="text" class="form-control" name="apelido" id="apelido-input" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="tipo">CPF</label>
                                    <input type="text" class="form-control" name="cpf" id="cpf-input" placeholder="">
                                </div>
                                <div class="col-md-3">
                                    <label for="tipo">RG</label>
                                    <input type="text" class="form-control" name="rg" id="rg-input" placeholder="">
                                </div>
                                <div class="col-md-2">
                                    <label for="tipo">Emissor</label>
                                    <input type="text" class="form-control" name="emissor" id="emissor-input" placeholder="">
                                </div>
                                <div class="col-md-1">
                                    <label for="tipo">UF</label>
                                    <input type="text" class="form-control" name="uf" id="uf-input" placeholder="">
                                </div>
                                <div class="col-md-3">
                                    <label for="tipo">Sexo</label>
                                    <select class="form-control" name="sexo" id="sexo-input">
                                        <option value="" selected disabled>Selecione</option>
                                        <option value="1">Maculino</option>
                                        <option value="2">Feminino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="tipo">Telefone</label>
                                    <input type="text" class="form-control" name="telefone" id="telefone-input" placeholder="">
                                </div>
                                <div class="col-md-3">
                                    <label for="tipo">Celular</label>
                                    <input type="text" class="form-control" name="celular" id="celular-input" placeholder="">
                                </div>
                                <div class="col-md-6">
                                    <label for="tipo">Email</label>
                                    <input type="text" class="form-control" name="email" id="email-input" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="tipo">CEP</label>
                                    <input type="text" class="form-control" name="cep" id="telefone-input" placeholder="">
                                </div>
                                <div class="col-md-3">
                                    <label for="tipo">Endereço</label>
                                    <input type="text" class="form-control" name="endereco" id="endereco-input" placeholder="">
                                </div>
                                <div class="col-md-1">
                                    <label for="tipo">nº</label>
                                    <input type="text" class="form-control" name="numero" id="numero-input" placeholder="">
                                </div>
                                <div class="col-md-3">
                                    <label for="tipo">Complemento</label>
                                    <input type="text" class="form-control" name="complemento" id="complemento-input" placeholder="">
                                </div>
                                <div class="col-md-3">
                                    <label for="tipo">Bairro</label>
                                    <input type="text" class="form-control" name="bairro" id="bairro-input" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <label for="tipo">Observação</label>
                                    <input type="text" class="form-control" name="observacao" id="observacao-input" placeholder="">
                                </div>
                                <div class="col-md-2">
                                    <label for="tipo">Limite de Crédito</label>
                                    <input type="number" class="form-control" name="limite-credito" id="limite-credito-input" placeholder="">
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
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