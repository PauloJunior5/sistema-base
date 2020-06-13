@extends('layouts.app', ['activePage' => 'estado-management', 'titlePage' => __('Estado Management')])
@section('content')
<!-- Start Modal -->
<div class="modal fade" id="paisModal" tabindex="-1" role="dialog" aria-labelledby="paisModal" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                @include('layouts.paisModal')
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}
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
                <form method="post" action="{{ route('estado.store') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Add Estado') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="col-form-label">{{ __('Id') }}</label>
                                    <div class="form-group{{ $errors->has('id') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" readonly />
                                        @if ($errors->has('id'))
                                        <span id="name-error" class="error text-danger" for="input-id">{{ $errors->first('id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">{{ __('Codigo') }}</label>
                                    <div class="form-group{{ $errors->has('codigo') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" name="codigo" id="input-codigo" type="text" placeholder="{{ __('Codigo') }}" value="{{ old('codigo') }}" required="true" aria-required="true" />
                                        @if ($errors->has('codigo'))
                                        <span id="codigo-error" class="error text-danger" for="input-codigo">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">{{ __('Nome') }}</label>
                                    <div class="form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" id="input-nome" type="text" placeholder="{{ __('Nome') }}" value="{{ old('nome') }}" required />
                                        @if ($errors->has('nome'))
                                        <span id="nome-error" class="error text-danger" for="input-nome">{{ $errors->first('nome') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label class="col-form-label">{{ __('País') }}</label>
                                    <div class="form-group{{ $errors->has('pais') ? ' has-danger' : '' }}">
                                        <select class="form-control{{ $errors->has('pais') ? ' is-invalid' : '' }}" name="pais" id="input-pais-pais" type="text" placeholder="{{ __('País') }}" value="{{ old('pais') }}" required="true" />
                                        <option value="Select"> Select </option>
                                        <?php foreach ($paises as $key => $pais) { ?>
                                        <option value="{{$pais->id}}">{{$pais->nome}}</option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="row col-6">
                                        <div class="col-12 text-right">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#paisModal" style="margin-top: 3rem;">Add + </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="ureated_at">Created_at</label>
                                    <input type="date" class="form-control" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label for="updated_at">Updated_at</label>
                                    <input type="date" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto pull-right">
                                <a href="{{ route('estado.index') }}" class="btn btn-secondary">{{ __('Back to list') }}</a>
                                <button type="submit" class="btn btn-primary">{{ __('Add Estado') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
