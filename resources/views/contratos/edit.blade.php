@extends('layouts.app', ['activePage' => 'contrato-management', 'titlePage' => __('Contrato Management')])
@section('content')
@include('layouts.modais.chamada-modal.cliente')
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
                <form method="post" action="{{ route('contrato.update', $contrato->id) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Novo Contrato</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Código</label>
                                    <div class="form-group">
                                        <input class="form-control" readonly placeholder="#" value="{{$contrato->id}}"/>
                                        <p class="read-only">Campo apenas para consulta.</p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">Contrato</label>
                                    <div class="form-group">
                                        <input class="form-control" name="contrato" id="input-contrato" type="text" value="{{$contrato->contrato}}" required />
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <label class="col-form-label">Id do responsável</label>
                                    <div class="form-group">
                                        <input class="form-control" id="input-id-responsavel" type="text" name="id_responsavel" value="{{$contrato->id_responsavel}}" required/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">Responsável</label>
                                    <div class="form-group">
                                        <input class="form-control" id="input-responsavel" value="{{$cliente->cliente}}" readonly />
                                        <p class="read-only">Campo apenas para consulta.</p>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#clienteModal" style="margin-top: 2.7rem;"><i class="material-icons">search</i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Data de Criação</label>
                                    <div class="form-group">
                                        <input type="datetime" class="form-control" value="{{$contrato->created_at}}" readonly>
                                        <p class="read-only">Campo apenas para consulta.</p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Data de Alteração</label>
                                    <div class="form-group">
                                        <input type="datetime" class="form-control" value="{{$contrato->updated_at}}" readonly>
                                        <p class="read-only">Campo apenas para consulta.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{ route('estado.index') }}" class="btn btn-secondary">{{ __('Voltar') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('includes.scripts.paises')
@endsection