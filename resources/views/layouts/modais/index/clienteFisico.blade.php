<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ __('Responsáveis') }}</h4>
                        <p class="card-category"> {{ __('Aqui você pode gerenciar responsáveis') }}</p>
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#clienteFisicoCreateModal" style="margin-top: 2.7rem;">Novo</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="tableClientesFisicos">
                                <thead class=" text-primary">
                                    <th>{{ __('CPF') }}</th>
                                    <th>{{ __('Responável') }}</th>
                                    <th class="text-right sorting_asc_disabled sorting_desc_disabled">{{ __('Ações') }}</th>
                                </thead>
                                <tbody>
                                    @foreach($clientesFisicos as $cliente)
                                    <tr>
                                        <td>{{ $cliente->cpf }}</td>
                                        <td>{{ $cliente->cliente . " " . $cliente->apelido }}</td>
                                        <td class="td-actions text-right">
                                            <button rel="tooltip" class="btn btn-success btn-link idClienteFisico" value="{{$cliente->id}}" data-original-title="" title="">
                                                <i class="material-icons">check</i> Selecionar
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
@include('includes.datatables.script-datatables', ['tableId' => '#tableClientesFisicos'])