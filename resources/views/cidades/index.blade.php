@extends('layouts.app', ['activePage' => 'cidade-management', 'titlePage' => __('Cidade Management')])
@section('content')
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
                                <a href="{{ route('cidade.create') }}" class="btn btn-primary">{{ __('Novo') }}</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="tableCidades">
                                <thead class=" text-primary">
                                    <th>{{ __('DDD') }}</th>
                                    <th>{{ __('Cidade') }}</th>
                                    <th>{{ __('Data de Criação') }}</th>
                                    <th>{{ __('Data de Alteração') }}</th>
                                    <th class="text-right sorting_asc_disabled sorting_desc_disabled">{{ __('Ações') }}</th>
                                </thead>
                                <tbody>
                                    @foreach($cidades as $cidade)
                                    @php
                                    $estado = App\Estado::where('id', $cidade->id_estado)->get();
                                    $pais = App\Pais::where('id', $estado->first()->id_pais)->get();
                                    @endphp
                                    <tr>
                                        <td>{{ $cidade->ddd }}</td>
                                        <td>{{ $cidade->cidade }}</td>
                                        <td>{{ $cidade->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $cidade->updated_at->format('Y-m-d') }}</td>
                                        <td class="td-actions text-right">
                                            <form action="{{ route('cidade.destroy', $cidade->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('cidade.edit', $cidade) }}" data-original-title="" title="">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this cidade?") }}') ? this.parentElement.submit() : ''">
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
        $('#tableCidades').DataTable();
    });

</script>
@endsection
