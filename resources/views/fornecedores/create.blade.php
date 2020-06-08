@extends('layouts.app', ['activePage' => 'fornecedor-management', 'titlePage' => __('Fornecedor Management')])
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
                <form method="post" action="{{route('fornecedor.store')}}" autocomplete="off" class="form-horizontal">
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
                            <div class="card-footer ml-auto mr-auto float-right">
                                <a href="{{route('fornecedor.index')}}" class="btn btn-danger">{{ __('Back to list') }}</a>
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