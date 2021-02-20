<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ __('Cidades') }}</h4>
                        <p class="card-category"> {{ __('Aqui você pode gerenciar cidades') }}</p>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="material-icons">close</i>
                                    </button>
                                    <span>{{ session('status') }}</span>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#medico-cidadeCreateModal" style="margin-top: 2.7rem;">Novo</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="tableCidades-medico">
                                <thead class=" text-primary">
                                    <th>{{ __('DDD') }}</th>
                                    <th>{{ __('Nome') }}</th>
                                    <th>{{ __('Data de Criação') }}</th>
                                    <th>{{ __('Data de Alteração') }}</th>
                                    <th class="text-right sorting_asc_disabled sorting_desc_disabled">{{ __('Ações') }}</th>
                                </thead>
                                <tbody>
                                    @foreach($cidades as $cidade)
                                    @php
                                    $estado = App\Models\Estado::where('id', $cidade->id_estado)->get();
                                    $pais = App\Models\Pais::where('id', $estado->first()->id_pais)->get();
                                    @endphp
                                    <tr>
                                        <td>{{ $cidade->ddd }}</td>
                                        <td>{{ $cidade->cidade }}</td>
                                        <td>{{ $cidade->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $cidade->updated_at->format('Y-m-d') }}</td>
                                        <td class="td-actions text-right">
                                            <button rel="tooltip" class="btn btn-success btn-link idCidade-medico" value="{{$cidade->id}}" data-original-title="" title="">
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
@include('includes.datatables.script-datatables', ['tableId' => '#tableCidades-medico'])