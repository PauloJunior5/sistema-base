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
                <form method="post" action="{{ route('exame.update', $exame->id) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Add Exame') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Código de Referência</label>
                                    <input class="form-control" value="{{$exame->id}}" readonly />
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-form-label">Exame</label>
                                    <input class="form-control" name="exame" id="input-exame" type="text" value="{{$exame->exame}}" required />
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Valor (R$)</label>
                                    <input class="form-control" name="valor" id="input-valor" type="number" value="{{$exame->valor}}" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="col-form-label">Plano</label>
                                    <input class="form-control" name="plano" value="{{$exame->plano}}" />
                                    {{-- <input type="hidden" id="input-plano" name="plano"> --}}
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">Catagoria</label>
                                    <input class="form-control" name="categoria" value="{{$exame->categoria}}" />
                                    {{-- <input type="hidden" id="input-categoria" name="categoria"> --}}
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Created_at</label>
                                    <input type="date" class="form-control" value="{{ $exame->created_at->format('Y-m-d') }}" readonly>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Data de Alteração</label>
                                    <input type="date" class="form-control" value="{{ $exame->updated_at->format('Y-m-d') }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{ route('exame.index') }}" class="btn btn-secondary">{{ __('Back to list') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
