@extends('layouts.app', ['activePage' => 'forma-pagamento-management', 'titlePage' => __('Forma de Pagamento Management')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('formaPagamento.update', $formaPagamento->getId()) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Editar Forma de Pagamento') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            @if (session('Success'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <span>{{ session('Success') }}</span>
                                    </div>
                                </div>
                            </div>
                            @elseif (session('Warning'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-warning">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <span>{{ session('Warning') }}</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-sm-3">
                                    <label class="col-form-label">Código de Referência</label>
                                    <div class="form-group">
                                        <input class="form-control" name="id" type="text" value="{{ $formaPagamento->getId() }}" readonly/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">Forma de Pagament</label>
                                    <div class="form-group">
                                        <input class="form-control" name="forma_pagamento" type="text" value="{{ $formaPagamento->getFormaPagamento() }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Created_at</label>
                                    <div class="form-group">
                                        <input type="datetime" name="created_at" class="form-control" value="{{ $formaPagamento->getCreated_at() }}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Updated_at</label>
                                    <div class="form-group">
                                        <input type="datetime" name="updated_at" class="form-control" value="{{ $formaPagamento->getUpdated_at() }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{ route('formaPagamento.index') }}" class="btn btn-secondary">{{ __('Voltar') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
