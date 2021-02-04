<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ __('Formas de Pagamento') }}</h4>
                        <p class="card-category"> {{ __('Aqui você pode gerenciar Formas de Pagamento') }}</p>
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
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#forma_pagamentoCreateModal" style="margin-top: 2.7rem;">Add Forma de Pagamento</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-no-bordered table-hover dataTable dtr-inline" id="tableFormaPagamento">
                                <thead class=" text-primary">
                                    <th>{{ __('Forma de Pagamento') }}</th>
                                    <th>{{ __('Data de Criação') }}</th>
                                    <th>{{ __('Data de Alteração') }}</th>
                                    <th class="text-right sorting_asc_disabled sorting_desc_disabled">{{ __('Ações') }}</th>
                                </thead>
                                <tbody>
                                    @foreach($formas_pagamento as $forma_pagamento)
                                    <tr>
                                        <td>{{ $forma_pagamento->forma_pagamento }}</td>
                                        <td>{{ $forma_pagamento->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $forma_pagamento->updated_at->format('Y-m-d') }}</td>
                                        <td class="td-actions text-right">
                                            <button rel="tooltip" class="btn btn-success btn-link idForma_pagamento" value="{{$forma_pagamento->id}}" data-original-title="" title="">
                                                <i class="material-icons">check</i>
                                                <div class="ripple-container"></div>
                                            </button>
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
@include('includes.datatables.script-datatables', ['tableId' => '#tableFormaPagamento'])