@extends('layouts.app', ['activePage' => 'cliente-management', 'titlePage' => __('Cliente Management')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ __('Clientes') }}</h4>
                        <p class="card-category"> {{ __('Aqui você pode gerenciar clientes') }}</p>
                    </div>
                    <div class="card-body">
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
                            <div class="col-12 text-right">
                                <a href="{{ route('cliente.create') }}" class="btn btn-primary">{{ __('Novo') }}</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-no-bordered table-hover dataTable dtr-inline" id="tableClientes">
                                <thead class=" text-primary">
                                    <th>{{ __('Tipo') }}</th>
                                    <th>{{ __('Cliente') }}</th>
                                    <th>{{ __('Data de Criação') }}</th>
                                    <th>{{ __('Data de Alteração') }}</th>
                                    <th class="text-right sorting_asc_disabled sorting_desc_disabled">{{ __('Ações') }}</th>
                                </thead>
                                <tbody>
                                    @foreach($clientes as $cliente)
                                    <tr>
                                        {{-- <td>{{ !empty($cliente->getCPF()) ? $cliente->getCPF() : $cliente->getCNPJ() }}</td> --}}
                                        @if($cliente->getTipo() == "pessoaFisica")
                                            <td>Pessoa Física</td>
                                        @else
                                            <td>Pessoa Jurídica</td>
                                        @endif
                                        <td>{{ $cliente->getCliente() . " " . $cliente->getApelido() }}</td>
                                        <td>{{$cliente->getCreated_at()}}</td>
                                        <td>{{$cliente->getUpdated_at()}}</td>
                                        <td class="td-actions text-right">
                                            <form action="{{ route('cliente.destroy', $cliente->getId()) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('cliente.edit', $cliente->getId()) }}" data-original-title="" title="">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Voce tem certeza que deseja excluir?") }}') ? this.parentElement.submit() : ''">
                                                    <i class="material-icons">close</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.datatables.script-datatables', ['tableId' => '#tableClientes'])
@endsection