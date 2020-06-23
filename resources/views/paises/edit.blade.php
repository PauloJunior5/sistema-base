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
                                <div class="col-sm-2">
                                    <label class="col-form-label">{{ __('Código de Referência') }}</label>
                                    <div class="form-group{{ $errors->has('id') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" id="input-id" type="text" placeholder="{{ __('Código de Referência') }}" value="{{ old('id', $pais->id) }}" required="true" aria-required="true" readonly=“true” />
                                        @if ($errors->has('id'))
                                        <span id="id-error" class="error text-danger" for="input-id">{{ $errors->first('id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">{{ __('Código do País') }}</label>
                                    <div class="form-group{{ $errors->has('codigo') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" name="codigo" id="input-codigo" type="text" placeholder="{{ __('Código do País') }}" value="{{ old('codigo', $pais->codigo) }}" required />
                                        @if ($errors->has('codigo'))
                                        <span id="codigo-error" class="error text-danger" for="input-codigo">{{ $errors->first('codigo') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">{{ __('País') }}</label>
                                    <div class="form-group{{ $errors->has('pais') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('pais') ? ' is-invalid' : '' }}" name="pais" id="input-pais" type="text" placeholder="{{ __('País') }}" value="{{ old('pais', $pais->pais) }}" required />
                                        @if ($errors->has('pais'))
                                        <span id="pais-error" class="error text-danger" for="input-pais">{{ $errors->first('pais') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Created_at</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" value="{{ old('created_at', $pais->created_at->format('Y-m-d')) }}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Updated_at</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" value="{{ old('updated_at', $pais->updated_at->format('Y-m-d')) }}" readonly>
                                    </div>
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
