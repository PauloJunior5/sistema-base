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
                <form method="post" action="{{ route('estado.update', $estado) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Edit Estado') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Id') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <input class="form-control" name="id" value="{{ old('id', $estado->id) }}" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Codigo') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('codigo') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" name="codigo" id="input-codigo" type="text" placeholder="{{ __('Codigo') }}" value="{{ old('codigo', $estado->codigo) }}" required="true" aria-required="true" />
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
                                        <input class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" id="input-nome" type="nome" placeholder="{{ __('Nome') }}" value="{{ old('nome', $estado->nome) }}" required />
                                        @if ($errors->has('nome'))
                                        <span id="nome-error" class="error text-danger" for="input-nome">{{ $errors->first('nome') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('País') }}</label>
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('pais') ? ' has-danger' : '' }}">
                                        <select class="form-control{{ $errors->has('pais') ? ' is-invalid' : '' }}" name="pais" id="input-pais-pais" type="text" placeholder="{{ __('País') }}" value="{{ old('pais') }}" required="true" />
                                        <option value="{{$pais->id}}"> {{$pais->pais}} </option>
                                        <?php foreach ($paises as $key => $pais) { ?>
                                        <option value="{{$pais->id}}">{{$pais->pais}}</option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="row col-6">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#paisModal">Add + </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Created_at</label>
                                <div class="col-md-7">
                                    <div class="form-group">
                                    <input type="date" class="form-control" value="{{ old('created_at', $estado->created_at->format('Y-m-d')) }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Updated_at</label>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="date" class="form-control" value="{{ old('updated_at', $estado->updated_at->format('Y-m-d')) }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{ route('estado.index') }}" class="btn btn-secondary">{{ __('Back to list') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
