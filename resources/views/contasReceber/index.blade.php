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
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="{{ route('pais.create') }}" class="btn btn-primary">{{ __('Novo') }}</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-no-bordered table-hover dataTable dtr-inline" id="tableContasReceber">
                                <thead class=" text-primary">
                                    <th>{{ __('Parcela') }}</th>
                                    <th>{{ __('Contrato') }}</th>
                                    <th>{{ __('Multa') }}</th>
                                    <th>{{ __('Juros') }}</th>
                                    <th>{{ __('Desconto') }}</th>
                                    <th>{{ __('Dt Emissão') }}</th>
                                    <th>{{ __('Dt Vencimento') }}</th>
                                    <th>{{ __('Cliente') }}</th>
                                    <th>{{ __('Valor') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th class="text-right sorting_asc_disabled sorting_desc_disabled">{{ __('Ações') }}</th>
                                </thead>
                                <tbody>
                                    {{-- @foreach($paises as $pais)
                                    <tr>
                                        <td>{{ $pais->getSigla() }}</td>
                                        <td>{{ $pais->getPais() }}</td>
                                        <td>{{ $pais->getCreated_at() }}</td>
                                        <td>{{ $pais->getUpdated_at() }}</td>
                                        <td class="td-actions text-right">
                                            <form action="{{ route('pais.destroy', $pais->getId()) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('pais.edit', $pais->getId()) }}" data-original-title="" title="">
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
                                    @endforeach --}}
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
