<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ __('Cidades') }}</h4>
                        <p class="card-category"> {{ __('Here you can manage cidades') }}</p>
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
                                <a href="#" class="btn btn-sm btn-primary">{{ __('Add Cidade') }}</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="tableCidades">
                                <thead class=" text-primary">
                                    <th>{{ __('Código') }}</th>
                                    <th>{{ __('Nome') }}</th>
                                    <th>{{ __('Pais') }}</th>
                                    <th>{{ __('Estado') }}</th>
                                    <th>{{ __('Creation date') }}</th>
                                    <th>{{ __('Change date') }}</th>
                                    <th class="text-right">{{ __('Actions') }}</th>
                                </thead>
                                <tbody>
                                    @foreach($cidades as $cidade)
                                    <tr>
                                        <td>{{ $cidade->codigo }}</td>
                                        <td>{{ $cidade->cidade }}</td>
                                        <td>{{ $pais = App\Pais::where('id', $cidade->pais)->get()->first()->pais }}</td>
                                        <td>{{ $estado = App\Estado::where('id', $cidade->estado)->get()->first()->estado }}</td>
                                        <td>{{ $cidade->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $cidade->updated_at->format('Y-m-d') }}</td>
                                        <td class="td-actions text-right">
                                            <button rel="tooltip" class="btn btn-success btn-link id" value="{{$cidade->id}}" data-original-title="" title="">
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
<script>
    $(document).ready(function() {
        $('#tableCidades').DataTable();
    });
</script>