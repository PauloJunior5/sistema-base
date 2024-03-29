@extends('layouts.app', ['activePage' => 'contas-receber-management', 'titlePage' => __('Contas a Receber Management')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ __('Contas a Receber') }}</h4>
                        <p class="card-category"> {{ __('Aqui você pode gerenciar contas a receber') }}</p>
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
                        <div class="table-responsive">
                            <table class="table table-striped table-no-bordered table-hover dataTable dtr-inline" id="tableContasReceber">
                                <thead class=" text-primary">
                                    <th>{{ __('Cod. Parcela') }}</th>
                                    <th>{{ __('Contrato') }}</th>
                                    <th>{{ __('Dias') }}</th>
                                    <th>{{ __('Valor') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Forma de Pgto.') }}</th>
                                    <th>{{ __('Dt Emissão') }}</th>
                                    <th>{{ __('Dt Vencimento') }}</th>
                                    <th>{{ __('Cliente') }}</th>
                                    <th class="text-right sorting_asc_disabled sorting_desc_disabled">{{ __('Ações') }}</th>
                                </thead>
                                <tbody>
                                    @foreach($contasReceber as $contaReceber)
                                    <tr>
                                        <td>{{ $contaReceber->getParcela() }}</td>
                                        <td>{{ $contaReceber->getContrato()->getContrato() }}</td>
                                        <td>{{ $contaReceber->getDias() }}</td>
                                        <td>{{ "R$" . $contaReceber->getValor() }}</td>
                                        @if($contaReceber->getStatus() == 0)
                                            <td>{{ "Pendente" }}</td>
                                        @else
                                            <td>{{ "Pago" }}</td>
                                        @endif
                                        <td>{{ $contaReceber->getFormaPagamento()->getFormaPagamento() }}</td>
                                        <td>{{ $contaReceber->getDataEmissao() }}</td>
                                        <td>{{ $contaReceber->getDataVencimento() }}</td>
                                        <td>{{ $contaReceber->getCliente()->getCliente() }}</td>
                                        <td class="td-actions text-right">
                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('contaReceber.edit', $contaReceber->getId()) }}">
                                                <i class="material-icons">edit</i>
                                                Receber
                                                <div class="ripple-container"></div>
                                            </a>
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
@include('includes.datatables.script-datatables', ['tableId' => '#tableContasReceber'])
@endsection
