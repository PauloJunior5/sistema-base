@extends('layouts.app', ['activePage' => 'paciente-management', 'titlePage' => __('Paciente Management')])
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
                <form method="post" action="{{ route('paciente.store') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Add Paciente') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Código de Referência</label>
                                    <div class="form-group">
                                        <input class="form-control" value="{{$paciente->id}}" readonly />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Paciente</label>
                                    <div class="form-group">
                                        <input class="form-control" name="paciente" type="text" value="{{$paciente->paciente}}" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Apelido</label>
                                    <div class="form-group">
                                        <input class="form-control" name="apelido" type="text" value="{{$paciente->apelido}}" equired />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label>Código</label>
                                    <input class="form-control" />
                                </div>
                                <div class="col-md-4">
                                    <label>Médico Responsável</label>
                                    <input class="form-control" value="{{$paciente->id_medico}}" readonly/>
                                    {{-- <input type="hidden" id="input-medico" name="id_medico"> --}}
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-5">
                                    <label>Endereço</label>
                                    <input type="text" class="form-control" name="endereco" value="{{$paciente->endereco}}">
                                </div>
                                <div class="col-md-1">
                                    <label>nº</label>
                                    <input type="text" class="form-control" name="numero" value="{{$paciente->numero}}">
                                </div>
                                <div class="col-md-2">
                                    <label>Complemento</label>
                                    <input type="text" class="form-control" name="complemento" value="{{$paciente->complemento}}">
                                </div>
                                <div class="col-md-2">
                                    <label>Bairro</label>
                                    <input type="text" class="form-control" name="bairro" value="{{$paciente->bairro}}">
                                </div>
                                <div class="col-md-2">
                                    <label>CEP</label>
                                    <input type="text" class="form-control" name="cep" value="{{$paciente->cep}}">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-1">
                                    <label>Código</label>
                                    <input type="text" class="form-control" id="codigo-cidade-input">
                                </div>
                                <div class="col-md-4">
                                    <label>Cidade</label>
                                    <input class="form-control" id="cidade-input" value="{{$paciente->id_cidade}}" readonly />
                                    <input type="hidden" id="id-cidade-input" name="id_cidade" value="">
                                </div>
                                <div class="col-md-1">
                                    <label>UF</label>
                                    <input class="form-control" name="uf_cidade" id="uf-cidade-input" value="" readonly />
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#cidadeModal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label>Sexo</label>
                                    <input type="text" class="form-control" name="sexo" value="{{$paciente->sexo}}">
                                </div>
                                <div class="col-md-2">
                                    <label for="nascimento">Nascimento</label>
                                    <input type="date" class="form-control" name="nascimento" value="{{$paciente->nascimento}}">
                                </div>
                                <div class="col-md-3">
                                    <label>Estado Civil</label>
                                    <input type="text" class="form-control" name="estado_civil" value="{{$paciente->estado_civil}}">
                                </div>
                                <div class="col-md-3">
                                    <label>Nacionalidade</label>
                                    <input type="text" class="form-control" name="nacionalidade" value="{{$paciente->nacionalidade}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label>Telefone</label>
                                    <input type="text" class="form-control" name="telefone" value="{{$paciente->telefone}}">
                                </div>
                                <div class="col-md-3">
                                    <label>Celular</label>
                                    <input type="text" class="form-control" name="celular" value="{{$paciente->celular}}">
                                </div>
                                <div class="col-md-4">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" value="{{$paciente->email}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label>CPF</label>
                                    <input type="text" class="form-control" name="cpf" value="{{$paciente->cpf}}">
                                </div>
                                <div class="col-md-3">
                                    <label>RG</label>
                                    <input type="text" class="form-control" name="rg" value="{{$paciente->rg}}">
                                </div>
                                <div class="col-md-2">
                                    <label>Emissor</label>
                                    <input type="text" class="form-control" name="emissor" value="{{$paciente->emissor}}">
                                </div>
                                <div class="col-md-1">
                                    <label>UF</label>
                                    <input type="text" class="form-control" name="uf" value="{{$paciente->uf}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="observacao">Observação</label>
                                    <input type="text" class="form-control" name="observacao" value="{{$paciente->observacao}}">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-2">
                                    <label>Created_at</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" value="{{$paciente->created_at->format('Y-m-d')}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label>Updated_at</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" value="{{$paciente->updated_at->format('Y-m-d')}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{ route('paciente.index') }}" class="btn btn-secondary">{{ __('Back to list') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Add Paciente') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
