@extends('layouts.app', ['activePage' => 'pais-management', 'titlePage' => __('País Management')])
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
                <form method="post" action="{{ route('pais.store') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Add Pais') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Código de Referência') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <input class="form-control" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Código do País') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('codigo') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" name="codigo" id="input-name" type="text" placeholder="{{ __('Código do País') }}" value="{{ old('codigo') }}" required="true" aria-required="true" />
                                        @if ($errors->has('codigo'))
                                        <span id="name-error" class="error text-danger" for="input-codigo">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Nome') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" id="input-nome" type="text" placeholder="{{ __('Nome') }}" value="{{ old('nome') }}" required />
                                        @if ($errors->has('nome'))
                                        <span id="email-error" class="error text-danger" for="input-nome">{{ $errors->first('nome') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Created_at</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <input type="date" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Updated_at</label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{ route('pais.index') }}" class="btn btn-secondary">{{ __('Back to list') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Add Pais') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
