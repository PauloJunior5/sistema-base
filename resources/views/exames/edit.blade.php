@extends('layouts.app', ['activePage' => 'exame-management', 'titlePage' => __('Exame Management')])
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
                <form method="post" action="{{ route('exame.update', $exame->getId()) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Alterar Exame') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="row new-row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Código @include('includes.tooltips-campo-consulta')</label>
                                    <input class="form-control" name="id" value="{{$exame->getId()}}" readonly />
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-form-label">Exame</label>
                                    <input class="form-control" name="exame" id="input-exame" type="text" value="{{$exame->getExame()}}" required />
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Valor (R$)</label>
                                    <input class="form-control" name="valor" id="input-valor" type="number" value="{{$exame->getValor()}}" required />
                                </div>
                            </div>
                            <div class="row new-row">
                                <div class="col-md-4">
                                    <label class="col-form-label">Plano</label>
                                    <input class="form-control" name="plano" value="{{$exame->getPlano()}}" />
                                    {{-- <input type="hidden" id="input-plano" name="plano"> --}}
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">Categoria</label>
                                    <input class="form-control" name="categoria" value="{{$exame->getCategoria()}}" />
                                    {{-- <input type="hidden" id="input-categoria" name="categoria"> --}}
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            <div class="row new-row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Data de Criação @include('includes.tooltips-campo-consulta')</label>
                                    <input type="datetime" name="created_at" class="form-control" value="{{ $exame->getCreated_at() }}" readonly>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Data de Alteração @include('includes.tooltips-campo-consulta')</label>
                                    <input type="datetime" name="updated_at" class="form-control" value="{{ $exame->getUpdated_at() }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                            <a href="{{ route('exame.index') }}" class="btn btn-secondary">{{ __('Cancelar') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
      })
</script>
@endsection
