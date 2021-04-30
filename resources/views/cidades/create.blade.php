@extends('layouts.app', ['activePage' => 'cidade-management', 'titlePage' => __('Cidade Management')])
@section('content')
@include('layouts.modais.chamada-modal.estado')
@include('layouts.modais.chamada-modal.pais')
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
                <form method="post" action="{{ route('cidade.store') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Nova Cidade')}}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Código</label>
                                    <div class="form-group">
                                        <input class="form-control" readonly placeholder="#"/>
                                        <p class="read-only">Campo apenas para consulta.</p>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">DDD</label>
                                    <div class="form-group">
                                        <input class="form-control" value="{{ old('ddd') }}" name="ddd" type="text" required />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">Cidade</label>
                                    <div class="form-group">
                                        <input class="form-control" value="{{ old('cidade') }}" name="cidade" type="text" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">UF</label>
                                    <div class="form-group">
                                        <input class="form-control" id="uf-estado-input" type="text" value="" required />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">Estado</label>
                                    <div class="form-group">
                                        <input class="form-control" id="estado-input" value="" readonly />
                                        <input type="hidden" id="id-estado-input" name="id_estado" value="">
                                        <p class="read-only">Campo apenas para consulta.</p>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#estadoModal" style="margin-top: 2.7rem;"><i class="material-icons">search</i></button>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">País</label>
                                    <div class="form-group">
                                        <input class="form-control" id="pais-input" value="" readonly />
                                        <p class="read-only">Campo apenas para consulta.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Data de Criação</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" readonly>
                                        <p class="read-only">Campo apenas para consulta.</p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Data de Alreração</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" readonly>
                                        <p class="read-only">Campo apenas para consulta.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{ route('cidade.index') }}" class="btn btn-secondary">{{ __('Voltar') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('includes.scripts.estados')
@endsection