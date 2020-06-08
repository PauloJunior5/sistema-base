@extends('layouts.app', ['activePage' => 'fornecedor-management', 'titlePage' => __('Fornecedor Management')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('fornecedor.update') }}" autocomplete="off" class="form-horizontal">
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
                                    <input type="text" class="form-control" name="id" id="id_input" placeholder="" value="{{$fornecedor->id}}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="tipo">Pessoa Física ou Juridica?</label>
                                    <select class="form-control" name="tipo" id="tipo_input">
                                        <?php if ($fornecedor->tipo == config('constants.fisica')) { ?>
                                            <option value="{{config('constants.fisica')}}" selected>Física</option>
                                            <option value="{{config('constants.juridica')}}">Juridica</option>
                                        <?php } else { ?>
                                            <option value="{{config('constants.fisica')}}">Física</option>
                                            <option value="{{config('constants.juridica')}}" selected>Juridica</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" name="nome" id="nome_input" placeholder="" value="{{$fornecedor->nome}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="apelido">Apelido</label>
                                    <input type="text" class="form-control" name="apelido" id="apelido_input" placeholder="" value="{{$fornecedor->apelido}}">
                                </div>
                                <div class="col-md-2">
                                    <label for="estado_civil">Estado Civíl</label>
                                    <input type="text" class="form-control" name="estado_civil" id="estado_civil_input" placeholder="" value="{{$fornecedor->estado_civil}}">
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