@extends('layouts.app', ['activePage' => 'condicao-pagamento-management', 'titlePage' => __('Condição de Pagamento Management')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ __('Condições de Pagamento') }}</h4>
                        <p class="card-category"> {{ __('Here you can manage Condições de Pagamento') }}</p>
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
                                <a href="{{ route('condicaoPagamento.create') }}" class="btn btn-sm btn-primary">{{ __('Add Condição de Pagamento') }}</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-no-bordered table-hover dataTable dtr-inline" id="tableCondicaoPagamento">
                                <thead class=" text-primary">
                                    <th>{{ __('Condição de Pagamento') }}</th>
                                    <th>{{ __('Multa') }}</th>
                                    <th>{{ __('Juro') }}</th>
                                    <th>{{ __('Desconto') }}</th>
                                    <th>{{ __('Creation date') }}</th>
                                    <th>{{ __('Change date') }}</th>
                                    <th class="text-right sorting_asc_disabled sorting_desc_disabled">{{ __('Actions') }}</th>
                                </thead>
                                <tbody>
                                    @foreach($condicoes_pagamento as $condicao_pagamento)
                                    <tr>
                                        <td>{{ $condicao_pagamento->condicao_pagamento }}</td>
                                        <td>{{ $condicao_pagamento->multa }}</td>
                                        <td>{{ $condicao_pagamento->juro }}</td>
                                        <td>{{ $condicao_pagamento->desconto }}</td>
                                        <td>{{ $condicao_pagamento->created_at->format('Y-m-d H:i:s') }}</td>
                                        <td>{{ $condicao_pagamento->updated_at->format('Y-m-d H:i:s') }}</td>
                                        <td class="td-actions text-right">
                                            <form action="{{ route('condicaoPagamento.destroy', $condicao_pagamento->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('condicaoPagamento.edit', $condicao_pagamento) }}" data-original-title="" title="">
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
<script>
    $(document).ready(function() {
        $('#tableCondicaoPagamento').DataTable();
    });
</script>
@endsection
