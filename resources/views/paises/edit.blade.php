@extends('layouts.app', ['activePage' => 'pais-management', 'titlePage' => __('País Management')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('pais.update', $pais) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Edit País') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Id') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('id') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" id="input-id" type="text" placeholder="{{ __('Id') }}" value="{{ old('id', $pais->id) }}" required="true" aria-required="true" readonly=“true” />
                                        @if ($errors->has('id'))
                                        <span id="id-error" class="error text-danger" for="input-id">{{ $errors->first('id') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Código') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('codigo') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" name="codigo" id="input-codigo" type="text" placeholder="{{ __('Código') }}" value="{{ old('codigo', $pais->codigo) }}" required />
                                        @if ($errors->has('codigo'))
                                        <span id="codigo-error" class="error text-danger" for="input-codigo">{{ $errors->first('codigo') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Nome') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" id="input-nome" type="text" placeholder="{{ __('Código') }}" value="{{ old('nome', $pais->nome) }}" required />
                                        @if ($errors->has('nome'))
                                        <span id="nome-error" class="error text-danger" for="input-nome">{{ $errors->first('nome') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Created_at</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <input type="date" class="form-control" value="{{ old('created_at', $pais->created_at->format('Y-m-d')) }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Updated_at</label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control" value="{{ old('updated_at', $pais->updated_at->format('Y-m-d')) }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{ route('pais.index') }}" class="btn btn-secondary">{{ __('Back to list') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
