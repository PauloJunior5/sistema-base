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
                <form method="post" action="" autocomplete="off" class="form-horizontal">
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
                                    <input type="date" class="form-control" name="aniversario" id="aniversario-input" placeholder="Aniversario">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nome" id="nome-input" placeholder="Nome">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="apelido" id="apelido-input" placeholder="Apelido">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="cpf" id="cpf-input" placeholder="CPF">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="rg" id="rg-input" placeholder="RG">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="emissor" id="emissor-input" placeholder="Emissor">
                                </div>
                                <div class="col-md-1">
                                    <input type="text" class="form-control" name="uf" id="uf-input" placeholder="UF">
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" name="sexo" id="sexo-input">
                                        <option value="" selected disabled>Sexo</option>
                                        <option value="1">Maculino</option>
                                        <option value="2">Feminino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Add Pais') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection